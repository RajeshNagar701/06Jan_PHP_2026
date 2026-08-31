<?php

/*

What is globals variable ?

A global variable is super global & predefined variable.
A global variable is a programming language construct, 
a variable type that is declared outside any function 
and is accessible to all functions throughout the program.
 
$GLOBALS
$_REQUEST 
$_POST 
$_GET 

$_SERVER 
$_FILES 
$_ENV 
$_COOKIE 
$_SESSION


1)$GLOBALS  :: we can make variable as local to global & 
access anywhere in program

*/


/*
function addition()    // define variable as super global use any were in program;
{
	$x=10; // local
	$y=45;		
	echo $z=$x+$y . "<br>";  // CONVERT LOCAL TO GLOBAL
}
addition();
echo $z;
*/

function addition()    // define variable as super global use any were in program;
{
	$x=10; // local
	$y=45;		
	echo $GLOBALS['z']=$x+$y . "<br>";  // CONVERT LOCAL TO GLOBAL
}
addition();
echo $z;

?>