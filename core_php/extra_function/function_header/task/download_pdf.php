

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <form>
  <button type="submit" name="pdf_download" class="btn btn-primary">PDF Dowanload</button>
  
  
  <button type="submit" name="song_download" class="btn btn-primary">Song Dowanload</button>
  
  </form>
</div>

</body>
</html>

<?php
if(isset($_REQUEST['pdf_download']))
{
	header('Content-type:application/octect-stream'); // we will be outputing a pdf and octect-stream for any file download
	header('Content-Disposition:attachment;filename="myhr_que.pdf"'); // we will called downlod pdf
	readfile('hr_interview_question.pdf'); // download lower side in loading it must readfile full path/rename of original file
}


if(isset($_REQUEST['song_download']))
{
	header('Content-type:application/octect-stream'); // we will be outputing a pdf and octect-stream for any file download
	header('Content-Disposition:attachment;filename="my_song.mp3"'); // we will called downlod pdf
	readfile('file_example_MP3_700KB.mp3'); // download lower side in loading it must readfile full path/rename of original file
}

?>