<html>
<head>
<title> </title>
</head>
<body>

<!-- 
Method  get => $_GET['']

-->
<form action="" method="get">
    
	<p>Name: <input type="text" name="name" required /></p>
	<p>Age: <input type="text" name="age" required /></p>
	<p><input type="submit" name="save" value="Click"/></p>
	
</form>


<?php
	
	if(isset($_GET['save']))
	{
		echo $name=$_GET['name'];
		echo $age=$_GET['age'];
	}
?>

</body>
</html>
