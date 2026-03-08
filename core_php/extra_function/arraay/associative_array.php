<?php
$associate=array("id"=>"1","name"=>"rajesh","email"=>"raj@gmail.com");  // associate
print_r($associate);


echo $associate['email'];

foreach($associate as $d)
{
	echo "<h1>". $d ."</h1>";
}
?>