
<form>
	<input type="submit" name="submit" value="submit">
</form>

<?php
if(isset($_REQUEST['submit']))
{
	echo "AFTER hello <BR>";
	exit();
	echo "BEFORE hello";
}
else
{
	echo "Wrong condition";	
}
?>