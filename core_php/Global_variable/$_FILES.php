<html>
<head>
<title></title>
</head>
<body>

<!-- img upload / resume upload / file upload-->
<!-- 

Normal input =  $_GET[]/$_POST[]/$_REQUEST[]

FILE input : $_FILES['file1']['name'];


first add ti form tag enctype="multipart/form-data"


 -->

<form action="" method="post" enctype="multipart/form-data">      <?  // make form with action on $_GET function?>
	<p>Name: <input type="text" name="username"/></p>
	<p>File: <input type="file" name="file1"/></p>

	<p><input type="submit" name="submit" value="Click"/></p>
</form>
<?php
if(isset($_POST['submit']))
{
	
	echo $_POST['username']. "<br>";
	 
	if($_FILES['file1']['size']>0)  // file check file get or not
	{
		echo $img=$_FILES['file1']['name']; // file name get
		
		$path='image/upload/users/'.$img;  // pathy set
		$file=$_FILES['file1']['tmp_name']; // get duplicate file
		move_uploaded_file($file,$path); // upload file in that path
	}
	
}



?>






</body>
</html>
