<?php

/*
// array is collection values


$a="raj";
$b="akash";
$c="mahesh";

$names=array("Raj","akash","mahesh");   // array("0"=>"Raj","1"=>"akash","2"=>"Mahesh");







There are 3 types of arr 

$nemeric=array("a","b","c");  index auto generate  0
$associate=array("id"=>"1","name"=>"rajesh","email"=>"raj@gmail.com");  // associate
$multidemetional=array("a","b"=>array("p","q"),"c");  // multidemetional

*/
$name="a";
$name1="b";
$name2="c";


// numeric
$arr=array("a","b","c","d","e","f","g");//Array ( [0] => a [1] => b [2] => c [3] => d [4] => e [5] => f [6] => g )
print_r($arr);

echo $arr[3];

foreach($arr as $d)
{
	echo "<h1>". $d ."</h1>";
}

?>