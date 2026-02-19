<?php
/* 
operators

Arithmetic operators    + - * / %   10/2=5   10%2=0 (Reminder)

Assignment operators    =     += -= *= /=  %=   $a=10;$b=20;  $a+=$b/$a=$a+$b = 20

Comparison operators    ==  > < >= <= !=   ===

Increment/Decrement operators    ++    --  a=10 a++ echo 
Logical operators   &&     ||     !      
String operators    .    .=
Conditional assignment operators   (cond)?'if':'else';

Array operators 

*/
// Arithmetic + - * / %


/*
$a=11;
$b=20;
$sum=$b+$a;
echo $sum;
*/


//Assignment Operators / Shorthand operators  = += -= *= /=  %=   $a+=$b  $a=$a+$b;


/*
$y=20;
$x=10;  


$x += $y;     // $x=$x+$y

echo $x;  // 30

*/




// comparision operators   == > < >= <= ===

/*
$a=100;
$b="100";

if($a>$b) // check value equl to 
{
	echo "true";
}
else
{
	echo "false";
}
*/

/*
$a=100;
$b="100";

if($a===$b) // check data type  & value
{
	echo "true";
}
else
{
	echo "False";
}
*/



//increement & decrimrent  ++ --   $a=10  $a++  $a+1


$a=5;
$a++;
$a++;
echo $a."<br>";

$b=10;
$b--;
echo $b."<br>";







//logical operators   &&(and)    ||(or)    !(not)

$a=5;
$b=10;
$c=2;

if($a<$b && $a<$c)   // !($a>$b)
{
	echo "both condition true";
}
else
{
	echo "Not Condition true";
}





//String Operators   .   .=


$a="Raj";
echo "Hello" . $a . "<br>";


$name="Raj";
$name.=" Nagar";
$name.=" N"
echo $name;


// conditional operators / turnory 

/*
$age=18;
if($age>18)
{
	echo "Man";
}
else
{
	echo "Child";
}
*/



// turnory operator conditional( ? : )   (cond)? yes : No


$age=17;
echo ($age>=18)? "Men" : "Child";  // codition ? "yes":"no";   ?:


?>