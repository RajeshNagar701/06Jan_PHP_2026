<?php
date_default_timezone_set('asia/calcutta');

// time() print unix time-stamp 1, jan 1970
echo time()."<br>";


$day1=time()+(1*24*60*60);
$hours2=time()+(2*60*60);

echo date('d/m/y',$day1) . "<br>";
echo date('H:i:s',$hours2). "<br>";

?>