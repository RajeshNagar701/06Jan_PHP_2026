
<form>
	<input type="submit" name="submit" value="submit">
</form>

<?php

if(isset($_REQUEST['submit']))
{
	// task 
	
	header('location:wellcome_location.php'); 
}

?>
