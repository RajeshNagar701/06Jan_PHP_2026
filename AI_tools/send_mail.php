<?php
// ════════════════════════════════════════════════════════════════
//  CareerMap AI — Direct Gmail SMTP Mailer (Zero Dependencies)
// ════════════════════════════════════════════════════════════════

// ┌──────────────────────────────────────────────────────────────┐
// │  ENTER YOUR GMAIL CREDENTIALS HERE                           │
// └──────────────────────────────────────────────────────────────┘
define('GMAIL_FROM', 'rajeshnagar.tops@gmail.com');   // ← Your Gmail address
define('GMAIL_PASS', 'sdds adas adas sasa');   // ← Your 16-character Gmail App Password
define('SENDER_NAME', 'Rajesh nagar CareerMap AI');           // ← Display Sender Name
// ──────────────────────────────────────────────────────────────

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// ── Check Configuration Status ──────────────────────────────────
$isConfigured = (GMAIL_FROM !== 'yourgmail@gmail.com' && GMAIL_PASS !== 'xxxx xxxx xxxx xxxx');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode([
        'configured' => $isConfigured,
        'gmail_from' => $isConfigured ? GMAIL_FROM : 'Not set',
        'message' => $isConfigured ? 'Gmail SMTP configured successfully.' : 'Please set GMAIL_FROM and GMAIL_PASS in send_mail.php'
    ]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'msg' => 'Only POST requests are allowed.']);
    exit();
}

if (!$isConfigured) {
    echo json_encode([
        'success' => false,
        'msg' => 'Gmail SMTP not configured. Please open send_mail.php and set your GMAIL_FROM and GMAIL_PASS (App Password).'
    ]);
    exit();
}

// ── Parse POST Payload ──────────────────────────────────────────
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data || empty($data['to_email']) || empty($data['html_content'])) {
    echo json_encode(['success' => false, 'msg' => 'Missing required parameters (to_email, html_content).']);
    exit();
}

$toEmail = filter_var($data['to_email'], FILTER_SANITIZE_EMAIL);
$toName = htmlspecialchars($data['to_name'] ?? 'User', ENT_QUOTES, 'UTF-8');
$subject = $data['subject'] ?? "Your Career Roadmap — CareerMap AI";
$htmlContent = $data['html_content'];

if (!filter_var($toEmail, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'msg' => 'Invalid email address provided.']);
    exit();
}

// ── Send Email via Native Socket to Gmail SMTP ─────────────────
try {
    $response = sendGmailSmtp(GMAIL_FROM, GMAIL_PASS, SENDER_NAME, $toEmail, $toName, $subject, $htmlContent);
    if ($response['success']) {
        echo json_encode(['success' => true, 'msg' => "Email sent to {$toEmail}!"]);
    } else {
        echo json_encode(['success' => false, 'msg' => $response['error']]);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'msg' => 'SMTP Error: ' . $e->getMessage()]);
}

/**
 * Pure Native PHP Socket SMTP Client for Gmail
 */
function sendGmailSmtp($fromEmail, $appPassword, $fromName, $toEmail, $toName, $subject, $htmlBody)
{
    $host = 'ssl://smtp.gmail.com';
    $port = 465;
    $timeout = 15;

    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ]);

    $socket = @stream_socket_client("{$host}:{$port}", $errno, $errstr, $timeout, STREAM_CLIENT_CONNECT, $context);
    if (!$socket) {
        return ['success' => false, 'error' => "Failed to connect to Gmail SMTP: {$errstr} ({$errno})"];
    }

    $read = function () use ($socket) {
        $res = '';
        while ($str = fgets($socket, 515)) {
            $res .= $str;
            if (substr($str, 3, 1) == ' ')
                break;
        }
        return $res;
    };

    $write = function ($cmd) use ($socket) {
        fputs($socket, $cmd . "\r\n");
    };

    $read(); // Read 220 banner

    $write("EHLO " . gethostname());
    $res = $read();
    if (substr($res, 0, 3) != '250') {
        fclose($socket);
        return ['success' => false, 'error' => "EHLO failed: {$res}"];
    }

    $write("AUTH LOGIN");
    $res = $read();
    if (substr($res, 0, 3) != '334') {
        fclose($socket);
        return ['success' => false, 'error' => "AUTH LOGIN failed: {$res}"];
    }

    $write(base64_encode($fromEmail));
    $res = $read();
    if (substr($res, 0, 3) != '334') {
        fclose($socket);
        return ['success' => false, 'error' => "Username authentication failed: {$res}"];
    }

    // Remove spaces if user copied 16-character App Password with spaces
    $cleanPass = str_replace(' ', '', $appPassword);
    $write(base64_encode($cleanPass));
    $res = $read();
    if (substr($res, 0, 3) != '235') {
        fclose($socket);
        return ['success' => false, 'error' => "Gmail App Password authentication failed. Check your password."];
    }

    $write("MAIL FROM: <{$fromEmail}>");
    $res = $read();
    if (substr($res, 0, 3) != '250') {
        fclose($socket);
        return ['success' => false, 'error' => "MAIL FROM failed: {$res}"];
    }

    $write("RCPT TO: <{$toEmail}>");
    $res = $read();
    if (substr($res, 0, 3) != '250') {
        fclose($socket);
        return ['success' => false, 'error' => "Recipient failed: {$res}"];
    }

    $write("DATA");
    $res = $read();
    if (substr($res, 0, 3) != '354') {
        fclose($socket);
        return ['success' => false, 'error' => "DATA command failed: {$res}"];
    }

    // Build MIME email headers
    $mime = "From: =?UTF-8?B?" . base64_encode($fromName) . "?= <{$fromEmail}>\r\n";
    $mime .= "To: =?UTF-8?B?" . base64_encode($toName) . "?= <{$toEmail}>\r\n";
    $mime .= "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=\r\n";
    $mime .= "MIME-Version: 1.0\r\n";
    $mime .= "Content-Type: text/html; charset=UTF-8\r\n";
    $mime .= "Content-Transfer-Encoding: 8bit\r\n";
    $mime .= "X-Mailer: CareerMap AI Gmail Mailer\r\n\r\n";
    $mime .= $htmlBody . "\r\n.";

    $write($mime);
    $res = $read();
    if (substr($res, 0, 3) != '250') {
        fclose($socket);
        return ['success' => false, 'error' => "Failed sending body: {$res}"];
    }

    $write("QUIT");
    fclose($socket);

    return ['success' => true];
}
