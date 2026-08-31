<?php

/*
 

	$a=20;
	$b=10;
	echo $sum=$a+$b;
	
	

	What is function ?
	function is block of code 
	
	{		
		$a=20;
		$b=10;
		echo $sum=$a+$b;
	}

 2 Type of function_exists
 1) BUILD IN function  predifined => strlen()
 2) USER defined  function        => sum()
 
*/




// user defined function
/*
function sum(){
	$a=20;
	$b=10;
	echo $sum=$a+$b;
}
sum();  // call function
sum();
*/

// function with parameter / argument

/*
function sum($a,$b)
{
	echo $sum=$a+$b."<br>";
}
sum(5,10);
sum(10,10);
sum(7,10);

*/

// function with parameter with default value

/*
function sum($a=0,$b=0)
{
	echo $sum=$a+$b."<br>";
}
sum(50,10);  //60
sum(30);     //30
sum();       //0
*/



// return

/*
function sum()
{
	return 5+7;
}
sum();
*/


//=================== Build function

/*
$a=25;
$name="Raj nagar";

echo var_dump($a)."</br>";  // find data type
echo var_dump($name)."</br>";


echo strlen($name);

*/

?>