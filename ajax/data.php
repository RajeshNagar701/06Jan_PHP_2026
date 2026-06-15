<?php
$con=new mysqli("localhost","root","","bakery");
$sql="select * from customer";
$res=$con->query($sql);
while($fetch=$res->fetch_object())
{
	$arr[]=$fetch;		
}

foreach($arr as $c)
{
	echo $c->id . "<br>";
	echo $c->name . "<br>";
	echo $c->email . "<br>";
	echo $c->gender . "<br><br><br>";
}


?>
 