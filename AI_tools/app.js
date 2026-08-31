/* ============================================================
   CareerMap AI — app.js
   Google Gemini AI Integration + Roadmap Renderer
   ============================================================ */

'use strict';

// ─── DOM References ──────────────────────────────────────────────
const userForm = document.getElementById('userForm');
const generateBtn = document.getElementById('generateBtn');
const formSection = document.getElementById('formSection');
const loadingSection = document.getElementById('loadingSection');
const resultSection = document.getElementById('resultSection');
const resultContainer = document.getElementById('resultContainer');
const loadingBar = document.getElementById('loadingBar');
const loadingMsg = document.getElementById('loadingMsg');
const toggleApiKey = document.getElementById('toggleApiKey');
const toggleIcon = document.getElementById('toggleIcon');
const apiKeyInput = document.getElementById('apiKey');

// ─── Toggle API Key Visibility ───────────────────────────────────
toggleApiKey.addEventListener('click', () => {
  const isPass = apiKeyInput.type === 'password';
  apiKeyInput.type = isPass ? 'text' : 'password';
  toggleIcon.className = isPass ? 'bi bi-eye-slash-fill' : 'bi bi-eye-fill';
});

// ─── Gmail SMTP Settings Status Check ────────────────────────────
async function checkGmailStatus() {
  const badge = document.getElementById('emailBadge');
  if (!badge) return;
  try {
    const res = await fetch('send_mail.php');
    const data = await res.json();
    if (data.configured) {
      badge.textContent = '✅ Configured';
      badge.style.background = 'rgba(16,185,129,.2)';
      badge.style.color = '#34d399';
      badge.style.border = '1px solid #34d399';
    } else {
      badge.textContent = '⚠️ Not Configured';
      badge.style.background = 'rgba(239,68,68,.2)';
      badge.style.color = '#f87171';
      badge.style.border = '1px solid #f87171';
    }
  } catch (e) {
    badge.textContent = 'Unknown';
  }
}

document.getElementById('emailPanelToggle')?.addEventListener('click', () => {
  const body = document.getElementById('emailPanelBody');
  const chevron = document.getElementById('emailChevron');
  const open = !body.classList.contains('d-none');
  body.classList.toggle('d-none', open);
  chevron.style.transform = open ? 'rotate(0deg)' : 'rotate(180deg)';
});

// Load Gmail status on page load
checkGmailStatus();

// ─── Navbar scroll effect ────────────────────────────────────────
window.addEventListener('scroll', () => {
  const nav = document.getElementById('mainNav');
  if (window.scrollY > 50) {
    nav.style.boxShadow = '0 4px 30px rgba(0,0,0,.5)';
  } else {
    nav.style.boxShadow = 'none';
  }
});

// ─── Form Submit ──────────────────────────────────────────────────
userForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  e.stopPropagation();

  userForm.classList.add('was-validated');

  const name = document.getElementById('userName').value.trim();
  const email = document.getElementById('userEmail').value.trim();
  const role = document.getElementById('jobRole').value.trim();
  const apiKey = apiKeyInput.value.trim();

  if (!name || !email || !role || !apiKey) return;

  // Email basic validation
  const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRe.test(email)) return;

  await generateRoadmap(name, email, role, apiKey);
});

// ─── Loading Steps Animator ──────────────────────────────────────
function animateLoadingSteps() {
  const steps = ['step1', 'step2', 'step3', 'step4'];
  const msgs = [
    'Researching career landscape for this role...',
    'Mapping required technologies and skills...',
    'Pulling salary and market demand data...',
    'Building your personalized roadmap...'
  ];
  const targets = [20, 45, 70, 90];

  let i = 0;
  const iv = setInterval(() => {
    if (i > 0) {
      document.getElementById(steps[i - 1]).className = 'loading-step done';
    }
    if (i < steps.length) {
      document.getElementById(steps[i]).className = 'loading-step active';
      loadingMsg.textContent = msgs[i];
      loadingBar.style.width = targets[i] + '%';
      i++;
    } else {
      clearInterval(iv);
    }
  }, 1800);
  return iv;
}

// ─── Main Generate Function ───────────────────────────────────────
async function generateRoadmap(name, email, role, apiKey) {
  // UI: show loading
  formSection.classList.add('d-none');
  loadingSection.classList.remove('d-none');
  resultSection.classList.add('d-none');
  window.scrollTo({ top: 0, behavior: 'smooth' });

  loadingBar.style.width = '5%';
  const stepInterval = animateLoadingSteps();

  // Build Gemini prompt
  const prompt = buildPrompt(name, role);

  try {
    const rawJSON = await callGeminiAPI(apiKey, prompt);
    clearInterval(stepInterval);
    loadingBar.style.width = '100%';

    await delay(600);

    const data = parseGeminiResponse(rawJSON);

    // Render result
    loadingSection.classList.add('d-none');
    resultSection.classList.remove('d-none');
    renderRoadmap(data, name, email, role);
    resultSection.scrollIntoView({ behavior: 'smooth' });

    // Auto-send email
    sendRoadmapEmail(data, name, email, role);

  } catch (err) {
    clearInterval(stepInterval);
    loadingSection.classList.add('d-none');
    resultSection.classList.remove('d-none');
    renderError(err.message, name, role);
    resultSection.scrollIntoView({ behavior: 'smooth' });
    console.error('Gemini Error:', err);
  }
}

// ─── Build Prompt ─────────────────────────────────────────────────
function buildPrompt(name, role) {
  return `You are a senior career advisor and tech industry expert. Generate a detailed, accurate, and realistic career roadmap for the role: "${role}".

Return ONLY a valid JSON object (no markdown, no extra text) with exactly this structure:

{
  "overview": "2-3 sentence professional overview of this career path",
  "totalTime": "e.g. 6-18 months",
  "avgSalaryINR": "e.g. ₹8L - ₹35L/yr",
  "avgSalaryUSD": "e.g. $60K - $180K/yr",
  "demandScore": 85,
  "growthRate": "22% YoY",
  "jobOpenings": "2.5M+ globally",
  "quickStats": {
    "timeToHire": "3-6 months",
    "remoteWork": "85%",
    "topLocation": "Bangalore / USA",
    "certValue": "High"
  },
  "phases": [
    {
      "phase": "Phase 1",
      "title": "Foundation",
      "duration": "0-3 months",
      "description": "What to learn and do in this phase"
    },
    {
      "phase": "Phase 2",
      "title": "Core Skills",
      "duration": "3-8 months",
      "description": "Core technical and practical skills"
    },
    {
      "phase": "Phase 3",
      "title": "Advanced & Specialization",
      "duration": "8-14 months",
      "description": "Advanced topics and specializations"
    },
    {
      "phase": "Phase 4",
      "title": "Job Ready & Portfolio",
      "duration": "14-18 months",
      "description": "Projects, portfolio, and job applications"
    }
  ],
  "technologies": [
    { "name": "HTML/CSS", "level": "must", "category": "Frontend" },
    { "name": "JavaScript", "level": "must", "category": "Frontend" }
  ],
  "salaryByLevel": [
    { "level": "Junior (0-2 yrs)", "india": "₹4L-₹10L", "usa": "$55K-$80K", "pct": 35 },
    { "level": "Mid (2-5 yrs)",    "india": "₹10L-₹25L", "usa": "$80K-$130K", "pct": 65 },
    { "level": "Senior (5+ yrs)",  "india": "₹25L-₹60L", "usa": "$130K-$200K", "pct": 100 },
    { "level": "Lead/Architect",   "india": "₹50L-₹1.2Cr", "usa": "$180K-$300K+", "pct": 100 }
  ],
  "marketDemand": [
    { "label": "Job Market Demand",  "value": 88, "color": "#6366f1" },
    { "label": "Salary Growth",      "value": 75, "color": "#10b981" },
    { "label": "Remote Opportunity", "value": 85, "color": "#06b6d4" },
    { "label": "Future-Proof Score", "value": 80, "color": "#f59e0b" },
    { "label": "Startup Demand",     "value": 70, "color": "#a78bfa" }
  ],
  "growth": [
    { "metric": "+28%", "label": "Industry Growth Rate", "type": "up" },
    { "metric": "4.2M+", "label": "Global Job Openings", "type": "high" },
    { "metric": "₹15L", "label": "Avg Median Salary India", "type": "med" },
    { "metric": "Top 5", "label": "Most In-Demand Role 2025", "type": "up" }
  ],
  "topCompanies": ["Google", "Amazon", "Microsoft", "Flipkart", "TCS", "Infosys"],
  "certifications": ["AWS Certified", "Google Cloud Professional", "Meta Developer"],
  "tips": [
    "Build 3-5 strong portfolio projects",
    "Contribute to open source on GitHub",
    "Network on LinkedIn with professionals",
    "Follow industry blogs and YouTube channels"
  ]
}

Make all data specific, realistic, and accurate for the "${role}" role. Include 10-15 technologies with correct levels (must/core/plus). The data should reflect the Indian and global job market in 2025-2026.`;
}

// ─── Call Gemini API ──────────────────────────────────────────────
async function callGeminiAPI(apiKey, prompt) {
  const url = `https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash-lite:generateContent?key=${apiKey}`;

  const body = {
    contents: [{
      parts: [{ text: prompt }]
    }],
    generationConfig: {
      temperature: 0.7,
      topK: 40,
      topP: 0.95,
      maxOutputTokens: 4096,
    }
  };

  const response = await fetch(url, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(body)
  });

  if (!response.ok) {
    const errData = await response.json().catch(() => ({}));
    const msg = errData?.error?.message || `HTTP ${response.status}: ${response.statusText}`;
    throw new Error(msg);
  }

  const data = await response.json();

  const text = data?.candidates?.[0]?.content?.parts?.[0]?.text;
  if (!text) throw new Error('Gemini returned an empty response. Please try again.');

  return text;
}

// ─── Parse Gemini Response ────────────────────────────────────────
function parseGeminiResponse(raw) {
  // Remove markdown fences if any
  let cleaned = raw.trim();
  cleaned = cleaned.replace(/^```json\s*/i, '').replace(/^```\s*/i, '');
  cleaned = cleaned.replace(/\s*```$/i, '');

  // Extract JSON object
  const start = cleaned.indexOf('{');
  const end = cleaned.lastIndexOf('}');
  if (start === -1 || end === -1) throw new Error('Could not parse AI response. Please try again.');

  cleaned = cleaned.substring(start, end + 1);
  return JSON.parse(cleaned);
}

// ─── Render Roadmap ───────────────────────────────────────────────
function renderRoadmap(data, name, email, role) {
  const html = `
    <!-- Header -->
    <div class="result-header animate-in mb-4">
      <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
        <div>
          <div class="result-role-badge mb-3">
            <i class="bi bi-stars"></i> AI Career Roadmap
          </div>
          <h2 class="result-title mb-2">
            <span class="gradient-text">${escHtml(role)}</span> Roadmap
          </h2>
          <p class="text-muted mb-1">
            <i class="bi bi-person-fill me-2 text-primary"></i>
            Personalized for <strong class="text-light">${escHtml(name)}</strong>
            &nbsp;&nbsp;<i class="bi bi-envelope-fill me-2 text-secondary"></i>${escHtml(email)}
          </p>
          <p class="mt-2" style="color:var(--text-muted); font-size:.95rem; max-width:700px;">
            ${escHtml(data.overview || '')}
          </p>
        </div>
        <div class="d-flex flex-column gap-2 align-items-end">
          <button class="regen-btn" onclick="resetForm()">
            <i class="bi bi-arrow-repeat me-2"></i>New Roadmap
          </button>
          <button class="email-resend-btn" id="resendEmailBtn"
            onclick="sendRoadmapEmail(window._lastRoadmapData, window._lastUserName, window._lastUserEmail, window._lastUserRole)">
            <i class="bi bi-envelope-fill me-2"></i>Send to Email
          </button>
        </div>
      </div>
    </div>

    <!-- Quick Stats -->
    <div class="quick-stats animate-in mb-4">
      <div class="qs-card">
        <div class="qs-icon blue mx-auto"><i class="bi bi-clock-fill"></i></div>
        <div class="qs-value">${escHtml(data.totalTime || 'N/A')}</div>
        <div class="qs-label">Total Learning Time</div>
      </div>
      <div class="qs-card">
        <div class="qs-icon green mx-auto"><i class="bi bi-currency-rupee"></i></div>
        <div class="qs-value" style="font-size:1rem;">${escHtml(data.avgSalaryINR || 'N/A')}</div>
        <div class="qs-label">Avg Salary (India)</div>
      </div>
      <div class="qs-card">
        <div class="qs-icon yellow mx-auto"><i class="bi bi-currency-dollar"></i></div>
        <div class="qs-value" style="font-size:1rem;">${escHtml(data.avgSalaryUSD || 'N/A')}</div>
        <div class="qs-label">Avg Salary (Global)</div>
      </div>
      <div class="qs-card">
        <div class="qs-icon cyan mx-auto"><i class="bi bi-graph-up-arrow"></i></div>
        <div class="qs-value">${escHtml(data.growthRate || 'N/A')}</div>
        <div class="qs-label">Industry Growth</div>
      </div>
      <div class="qs-card">
        <div class="qs-icon purple mx-auto"><i class="bi bi-people-fill"></i></div>
        <div class="qs-value" style="font-size:1rem;">${escHtml(data.jobOpenings || 'N/A')}</div>
        <div class="qs-label">Job Openings</div>
      </div>
    </div>

    <div class="row g-4">

      <!-- Left Column -->
      <div class="col-lg-7">

        <!-- Roadmap Timeline -->
        <div class="roadmap-section-card animate-in">
          <div class="section-heading">
            <div class="section-heading-icon" style="background:rgba(99,102,241,.2); color:var(--primary-light);">
              <i class="bi bi-map-fill"></i>
            </div>
            <span>Learning Roadmap & Timeline</span>
          </div>
          <div class="timeline">
            ${(data.phases || []).map((p, idx) => `
              <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-phase">${escHtml(p.phase || 'Phase ' + (idx + 1))}</div>
                <div class="timeline-title">${escHtml(p.title || '')}</div>
                <div class="timeline-desc">${escHtml(p.description || '')}</div>
                <span class="timeline-duration">
                  <i class="bi bi-clock me-1"></i>${escHtml(p.duration || '')}
                </span>
              </div>
            `).join('')}
          </div>
        </div>

        <!-- Technologies -->
        <div class="roadmap-section-card animate-in mt-4">
          <div class="section-heading">
            <div class="section-heading-icon" style="background:rgba(6,182,212,.2); color:var(--secondary);">
              <i class="bi bi-code-slash"></i>
            </div>
            <span>Technologies & Skills</span>
          </div>
          ${renderTechByCategory(data.technologies || [])}
        </div>

        <!-- Tips -->
        <div class="roadmap-section-card animate-in mt-4">
          <div class="section-heading">
            <div class="section-heading-icon" style="background:rgba(245,158,11,.2); color:var(--accent);">
              <i class="bi bi-lightbulb-fill"></i>
            </div>
            <span>Pro Tips for Success</span>
          </div>
          <ul style="list-style:none; padding:0; margin:0;">
            ${(data.tips || []).map((tip, i) => `
              <li class="d-flex gap-3 mb-3">
                <div style="min-width:28px; height:28px; background:rgba(245,158,11,.15); border:1px solid rgba(245,158,11,.3); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:.8rem; font-weight:700; color:var(--accent);">
                  ${i + 1}
                </div>
                <span style="font-size:.92rem; color:var(--text-muted); padding-top:3px;">${escHtml(tip)}</span>
              </li>
            `).join('')}
          </ul>
        </div>

      </div>

      <!-- Right Column -->
      <div class="col-lg-5">

        <!-- Market Demand -->
        <div class="roadmap-section-card animate-in">
          <div class="section-heading">
            <div class="section-heading-icon" style="background:rgba(16,185,129,.2); color:var(--success);">
              <i class="bi bi-bar-chart-fill"></i>
            </div>
            <span>Market Demand Analysis</span>
          </div>
          ${(data.marketDemand || []).map(d => `
            <div class="demand-item">
              <div class="demand-label">
                <span style="font-size:.88rem; font-weight:500;">${escHtml(d.label || '')}</span>
                <span style="font-weight:700; color:${escHtml(d.color || '#6366f1')};">${d.value || 0}%</span>
              </div>
              <div class="demand-bar-bg">
                <div class="demand-bar-fill" style="width:${d.value || 0}%; background:${escHtml(d.color || '#6366f1')};"></div>
              </div>
            </div>
          `).join('')}
        </div>

        <!-- Salary by Level -->
        <div class="roadmap-section-card animate-in mt-4">
          <div class="section-heading">
            <div class="section-heading-icon" style="background:rgba(16,185,129,.2); color:var(--success);">
              <i class="bi bi-cash-stack"></i>
            </div>
            <span>Salary by Experience</span>
          </div>
          <table class="salary-table">
            <thead>
              <tr>
                <th>Level</th>
                <th>India</th>
                <th>Global</th>
              </tr>
            </thead>
            <tbody>
              ${(data.salaryByLevel || []).map(s => `
                <tr>
                  <td style="font-size:.85rem;">${escHtml(s.level || '')}</td>
                  <td style="font-size:.83rem; color:var(--success);">${escHtml(s.india || '')}</td>
                  <td style="font-size:.83rem; color:var(--secondary);">${escHtml(s.usa || '')}</td>
                </tr>
              `).join('')}
            </tbody>
          </table>
        </div>

        <!-- Growth -->
        <div class="roadmap-section-card animate-in mt-4">
          <div class="section-heading">
            <div class="section-heading-icon" style="background:rgba(124,58,237,.2); color:#a78bfa;">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <span>Growth Indicators</span>
          </div>
          <div class="growth-grid">
            ${(data.growth || []).map(g => `
              <div class="growth-card">
                <div class="growth-metric ${escHtml(g.type || 'med')}">${escHtml(g.metric || '')}</div>
                <div class="growth-label">${escHtml(g.label || '')}</div>
              </div>
            `).join('')}
          </div>
        </div>

        <!-- Top Companies -->
        ${data.topCompanies?.length ? `
        <div class="roadmap-section-card animate-in mt-4">
          <div class="section-heading">
            <div class="section-heading-icon" style="background:rgba(6,182,212,.2); color:var(--secondary);">
              <i class="bi bi-building-fill"></i>
            </div>
            <span>Top Hiring Companies</span>
          </div>
          <div class="d-flex flex-wrap gap-2">
            ${(data.topCompanies || []).map(c => `
              <span class="tech-tag">
                <i class="bi bi-building me-1"></i>${escHtml(c)}
              </span>
            `).join('')}
          </div>
        </div>` : ''}

        <!-- Certifications -->
        ${data.certifications?.length ? `
        <div class="roadmap-section-card animate-in mt-4">
          <div class="section-heading">
            <div class="section-heading-icon" style="background:rgba(245,158,11,.2); color:var(--accent);">
              <i class="bi bi-patch-check-fill"></i>
            </div>
            <span>Recommended Certifications</span>
          </div>
          <div class="d-flex flex-wrap gap-2">
            ${(data.certifications || []).map(c => `
              <span class="tech-tag">
                <i class="bi bi-award-fill me-1" style="color:var(--accent);"></i>${escHtml(c)}
              </span>
            `).join('')}
          </div>
        </div>` : ''}

        <!-- Quick Facts -->
        <div class="roadmap-section-card animate-in mt-4">
          <div class="section-heading">
            <div class="section-heading-icon" style="background:rgba(99,102,241,.2); color:var(--primary-light);">
              <i class="bi bi-info-circle-fill"></i>
            </div>
            <span>Quick Facts</span>
          </div>
          ${renderQuickFacts(data.quickStats || {})}
        </div>

      </div>
    </div>

    <!-- Gemini Credit -->
    <div class="text-center mt-5 pb-2">
      <span class="gemini-pill d-inline-flex">
        <i class="bi bi-stars me-2"></i>
        Generated by Google Gemini AI &nbsp;•&nbsp; CareerMap AI 2026
      </span>
    </div>
  `;

  resultContainer.innerHTML = html;

  // Animate bars after render
  setTimeout(() => {
    document.querySelectorAll('.demand-bar-fill').forEach(el => {
      const w = el.style.width;
      el.style.width = '0';
      setTimeout(() => { el.style.width = w; }, 100);
    });
  }, 200);
}

// ─── Tech by Category ─────────────────────────────────────────────
function renderTechByCategory(techs) {
  const cats = {};
  techs.forEach(t => {
    const cat = t.category || 'General';
    if (!cats[cat]) cats[cat] = [];
    cats[cat].push(t);
  });

  return Object.entries(cats).map(([cat, items]) => `
    <div class="mb-4">
      <div class="mb-2" style="font-size:.8rem; text-transform:uppercase; letter-spacing:1px; color:var(--text-dim); font-weight:700;">
        ${escHtml(cat)}
      </div>
      <div class="tech-grid">
        ${items.map(t => `
          <span class="tech-tag">
            <i class="bi bi-dot fs-5" style="color:${levelColor(t.level)};"></i>
            ${escHtml(t.name || '')}
            <span class="level ${escHtml(t.level || 'core')}">${levelLabel(t.level)}</span>
          </span>
        `).join('')}
      </div>
    </div>
  `).join('');
}

function levelColor(level) {
  if (level === 'must') return '#f87171';
  if (level === 'core') return '#fbbf24';
  return '#34d399';
}

function levelLabel(level) {
  if (level === 'must') return 'Must';
  if (level === 'core') return 'Core';
  return 'Plus';
}

// ─── Quick Facts ──────────────────────────────────────────────────
function renderQuickFacts(qs) {
  const items = [
    { icon: 'bi-briefcase', label: 'Time to First Job', val: qs.timeToHire || 'N/A' },
    { icon: 'bi-house-door', label: 'Remote Work %', val: qs.remoteWork || 'N/A' },
    { icon: 'bi-geo-alt', label: 'Top Location', val: qs.topLocation || 'N/A' },
    { icon: 'bi-patch-check', label: 'Certification Value', val: qs.certValue || 'N/A' },
  ];
  return `<div class="row g-2">
    ${items.map(it => `
      <div class="col-6">
        <div style="background:rgba(255,255,255,.04); border:1px solid rgba(255,255,255,.08); border-radius:10px; padding:14px 12px;">
          <i class="bi ${it.icon} mb-1" style="color:var(--primary-light); font-size:1.1rem;"></i>
          <div style="font-size:.75rem; color:var(--text-dim); margin-bottom:2px;">${escHtml(it.label)}</div>
          <div style="font-weight:700; font-size:.92rem;">${escHtml(it.val)}</div>
        </div>
      </div>
    `).join('')}
  </div>`;
}

// ─── Render Error ─────────────────────────────────────────────────
function renderError(msg, name, role) {
  resultContainer.innerHTML = `
    <div class="error-card">
      <i class="bi bi-exclamation-triangle-fill d-block"></i>
      <h4 class="mt-2 mb-2">Something went wrong</h4>
      <p class="text-muted mb-4" style="max-width:500px;margin:0 auto 20px;">${escHtml(msg)}</p>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <button class="btn-generate" style="width:auto;padding:12px 28px;" onclick="resetForm()">
          <i class="bi bi-arrow-repeat me-2"></i>Try Again
        </button>
        <a href="https://aistudio.google.com/app/apikey" target="_blank" class="regen-btn">
          <i class="bi bi-key-fill me-2"></i>Check API Key
        </a>
      </div>
    </div>
  `;
}

// ─── Reset Form ───────────────────────────────────────────────────
function resetForm() {
  resultSection.classList.add('d-none');
  loadingSection.classList.add('d-none');
  formSection.classList.remove('d-none');
  userForm.classList.remove('was-validated');
  loadingBar.style.width = '0%';

  // Reset loading steps
  ['step1', 'step2', 'step3', 'step4'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.className = 'loading-step';
  });
  document.getElementById('step1').className = 'loading-step active';

  window.scrollTo({ top: 0, behavior: 'smooth' });
}

// ─── Utility ──────────────────────────────────────────────────────
function escHtml(str) {
  if (!str) return '';
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#039;');
}

function delay(ms) { return new Promise(r => setTimeout(r, ms)); }

// ─── Toast Notification ──────────────────────────────────────────
function showToast(message, type = 'info') {
  let container = document.getElementById('toastContainer');
  if (!container) {
    container = document.createElement('div');
    container.id = 'toastContainer';
    container.style.cssText = 'position:fixed;bottom:28px;right:28px;z-index:9999;display:flex;flex-direction:column;gap:10px;';
    document.body.appendChild(container);
  }
  const colors = { success:'#10b981', warn:'#f59e0b', error:'#ef4444', info:'#6366f1' };
  const icons  = { success:'bi-check-circle-fill', warn:'bi-exclamation-triangle-fill', error:'bi-x-circle-fill', info:'bi-info-circle-fill' };
  const toast  = document.createElement('div');
  toast.style.cssText = `background:#1f2937;border:1px solid ${colors[type]};border-radius:12px;padding:14px 18px;color:#f1f5f9;font-size:.9rem;font-weight:500;display:flex;align-items:center;gap:10px;box-shadow:0 8px 30px rgba(0,0,0,.4);min-width:280px;max-width:380px;animation:slideInRight .3s ease;`;
  toast.innerHTML = `<i class="bi ${icons[type]}" style="color:${colors[type]};font-size:1.1rem;"></i><span>${message}</span>`;
  container.appendChild(toast);
  setTimeout(() => { toast.style.opacity='0'; toast.style.transition='opacity .4s'; setTimeout(()=>toast.remove(),400); }, 4000);
}

// Inject toast animation
const toastStyle = document.createElement('style');
toastStyle.textContent = `@keyframes slideInRight{from{opacity:0;transform:translateX(30px)}to{opacity:1;transform:translateX(0)}}`;
document.head.appendChild(toastStyle);

// ─── Send Roadmap Email via Gmail SMTP PHP Backend ────────────────
async function sendRoadmapEmail(data, name, email, role) {
  // Cache for resend button
  window._lastRoadmapData  = data;
  window._lastUserName     = name;
  window._lastUserEmail    = email;
  window._lastUserRole     = role;

  // Update resend button
  const btn = document.getElementById('resendEmailBtn');

  if (btn) {
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending...';
  }

  try {
    const htmlContent = buildEmailHTML(data, name, email, role);
    const response = await fetch('send_mail.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        to_email: email,
        to_name: name,
        role: role,
        subject: `Your ${role} Career Roadmap — CareerMap AI`,
        html_content: htmlContent
      })
    });

    const result = await response.json();

    if (result.success) {
      showToast(`📧 Roadmap sent to ${email}!`, 'success');
      if (btn) { btn.disabled = false; btn.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Email Sent!'; }
      setTimeout(() => { if(btn) btn.innerHTML = '<i class="bi bi-envelope-fill me-2"></i>Send to Email'; }, 4000);
    } else {
      showToast(`⚠️ ${result.msg}`, 'warn');
      if (btn) { btn.disabled = false; btn.innerHTML = '<i class="bi bi-envelope-fill me-2"></i>Send to Email'; }
    }
  } catch (err) {
    console.error('SMTP Mail Error:', err);
    showToast('❌ Failed to send email. Ensure XAMPP PHP is running.', 'error');
    if (btn) { btn.disabled = false; btn.innerHTML = '<i class="bi bi-envelope-fill me-2"></i>Send to Email'; }
  }
}

// ─── Build Professional HTML Email ────────────────────────────────
function buildEmailHTML(data, name, email, role) {
  const phases = (data.phases || []).map(p => `
    <tr>
      <td style="padding:14px 20px;border-bottom:1px solid #1e293b;">
        <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:#6366f1;margin-bottom:4px;">${p.phase || ''}</div>
        <div style="font-size:15px;font-weight:700;color:#f1f5f9;margin-bottom:4px;">${p.title || ''}</div>
        <div style="font-size:13px;color:#94a3b8;line-height:1.6;">${p.description || ''}</div>
        <div style="display:inline-block;background:#1e2d4a;border:1px solid #3b4f7a;border-radius:20px;padding:3px 12px;font-size:11px;color:#818cf8;margin-top:6px;">⏱ ${p.duration || ''}</div>
      </td>
    </tr>`).join('');

  const techs = (data.technologies || []).slice(0, 12).map(t =>
    `<span style="display:inline-block;background:#1e293b;border:1px solid #334155;border-radius:6px;padding:5px 12px;font-size:12px;color:#e2e8f0;margin:3px;">${t.name || ''}</span>`
  ).join('');

  const salaryRows = (data.salaryByLevel || []).map(s => `
    <tr>
      <td style="padding:12px 16px;font-size:13px;font-weight:600;color:#e2e8f0;border-bottom:1px solid #1e293b;">${s.level || ''}</td>
      <td style="padding:12px 16px;font-size:13px;color:#34d399;border-bottom:1px solid #1e293b;">${s.india || ''}</td>
      <td style="padding:12px 16px;font-size:13px;color:#06b6d4;border-bottom:1px solid #1e293b;">${s.usa || ''}</td>
    </tr>`).join('');

  const tips = (data.tips || []).map((t, i) => `
    <tr>
      <td style="padding:10px 16px;border-bottom:1px solid #1e293b;">
        <span style="display:inline-block;background:#2d1f00;border:1px solid #f59e0b;border-radius:6px;padding:2px 8px;font-size:11px;font-weight:700;color:#f59e0b;margin-right:10px;">${i+1}</span>
        <span style="font-size:13px;color:#94a3b8;">${t}</span>
      </td>
    </tr>`).join('');

  return `<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"/><meta name="viewport" content="width=device-width,initial-scale=1"/><title>Your ${role} Roadmap</title></head>
<body style="margin:0;padding:0;background:#0b0f1a;font-family:'Segoe UI',Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#0b0f1a;padding:40px 20px;">
<tr><td align="center">
<table width="640" cellpadding="0" cellspacing="0" style="max-width:640px;width:100%;">

  <!-- HEADER -->
  <tr><td style="background:linear-gradient(135deg,#1a1040 0%,#0d1a3a 50%,#0a1628 100%);border-radius:16px 16px 0 0;padding:40px 40px 32px;text-align:center;border:1px solid #1e3a5f;">
    <div style="display:inline-block;background:linear-gradient(135deg,#6366f1,#06b6d4);border-radius:12px;padding:10px 16px;margin-bottom:16px;">
      <span style="font-size:24px;">🗺️</span>
    </div>
    <h1 style="margin:0;font-size:28px;font-weight:800;color:#f1f5f9;letter-spacing:-0.5px;">CareerMap <span style="background:linear-gradient(135deg,#818cf8,#06b6d4);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">AI</span></h1>
    <p style="margin:8px 0 0;font-size:14px;color:#64748b;">Powered by Google Gemini AI</p>
  </td></tr>

  <!-- GREETING -->
  <tr><td style="background:#111827;padding:32px 40px;border-left:1px solid #1e3a5f;border-right:1px solid #1e3a5f;">
    <h2 style="margin:0 0 8px;font-size:22px;font-weight:700;color:#f1f5f9;">Hello, ${name}! 👋</h2>
    <p style="margin:0;font-size:15px;color:#94a3b8;line-height:1.7;">Your personalized <strong style="color:#818cf8;">${role}</strong> career roadmap is ready. Below is everything you need to plan, skill up, and land your dream role.</p>
    ${data.overview ? `<div style="margin-top:16px;background:#1e293b;border-left:3px solid #6366f1;border-radius:0 8px 8px 0;padding:14px 18px;"><p style="margin:0;font-size:14px;color:#cbd5e1;line-height:1.6;">${data.overview}</p></div>` : ''}
  </td></tr>

  <!-- QUICK STATS -->
  <tr><td style="background:#0f172a;padding:0 40px 0;border-left:1px solid #1e3a5f;border-right:1px solid #1e3a5f;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding:24px 0;">
      <tr>
        <td align="center" style="padding:16px 8px;background:#1e293b;border-radius:12px;margin:4px;">
          <div style="font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;">Total Time</div>
          <div style="font-size:18px;font-weight:800;color:#818cf8;">${data.totalTime||'N/A'}</div>
        </td>
        <td width="8"></td>
        <td align="center" style="padding:16px 8px;background:#1e293b;border-radius:12px;">
          <div style="font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;">India Salary</div>
          <div style="font-size:16px;font-weight:800;color:#34d399;">${data.avgSalaryINR||'N/A'}</div>
        </td>
        <td width="8"></td>
        <td align="center" style="padding:16px 8px;background:#1e293b;border-radius:12px;">
          <div style="font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;">Growth Rate</div>
          <div style="font-size:18px;font-weight:800;color:#f59e0b;">${data.growthRate||'N/A'}</div>
        </td>
        <td width="8"></td>
        <td align="center" style="padding:16px 8px;background:#1e293b;border-radius:12px;">
          <div style="font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;">Job Openings</div>
          <div style="font-size:16px;font-weight:800;color:#06b6d4;">${data.jobOpenings||'N/A'}</div>
        </td>
      </tr>
    </table>
  </td></tr>

  <!-- ROADMAP PHASES -->
  <tr><td style="background:#111827;padding:32px 40px;border-left:1px solid #1e3a5f;border-right:1px solid #1e3a5f;">
    <h3 style="margin:0 0 20px;font-size:18px;font-weight:700;color:#f1f5f9;">🗺️ Learning Roadmap</h3>
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#0f172a;border-radius:12px;overflow:hidden;border:1px solid #1e293b;">
      ${phases}
    </table>
  </td></tr>

  <!-- TECHNOLOGIES -->
  <tr><td style="background:#0f172a;padding:32px 40px;border-left:1px solid #1e3a5f;border-right:1px solid #1e3a5f;">
    <h3 style="margin:0 0 16px;font-size:18px;font-weight:700;color:#f1f5f9;">⚡ Key Technologies</h3>
    <div style="line-height:2;">${techs}</div>
  </td></tr>

  <!-- SALARY TABLE -->
  <tr><td style="background:#111827;padding:32px 40px;border-left:1px solid #1e3a5f;border-right:1px solid #1e3a5f;">
    <h3 style="margin:0 0 16px;font-size:18px;font-weight:700;color:#f1f5f9;">💰 Salary by Experience</h3>
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#0f172a;border-radius:12px;overflow:hidden;border:1px solid #1e293b;">
      <tr style="background:#1e293b;">
        <th style="padding:12px 16px;text-align:left;font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.8px;">Level</th>
        <th style="padding:12px 16px;text-align:left;font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.8px;">India</th>
        <th style="padding:12px 16px;text-align:left;font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.8px;">Global</th>
      </tr>
      ${salaryRows}
    </table>
  </td></tr>

  <!-- PRO TIPS -->
  <tr><td style="background:#0f172a;padding:32px 40px;border-left:1px solid #1e3a5f;border-right:1px solid #1e3a5f;">
    <h3 style="margin:0 0 16px;font-size:18px;font-weight:700;color:#f1f5f9;">💡 Pro Tips for Success</h3>
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#111827;border-radius:12px;overflow:hidden;border:1px solid #1e293b;">
      ${tips}
    </table>
  </td></tr>

  <!-- FOOTER -->
  <tr><td style="background:#0b0f1a;border:1px solid #1e3a5f;border-top:none;border-radius:0 0 16px 16px;padding:32px 40px;text-align:center;">
    <p style="margin:0 0 8px;font-size:14px;color:#475569;">This roadmap was generated by <strong style="color:#818cf8;">CareerMap AI</strong> using Google Gemini AI</p>
    <p style="margin:0;font-size:12px;color:#334155;">© 2026 CareerMap AI &nbsp;•&nbsp; All rights reserved</p>
  </td></tr>

</table>
</td></tr>
</table>
</body></html>`;
}
