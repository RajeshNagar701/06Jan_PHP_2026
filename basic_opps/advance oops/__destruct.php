<?php

/*

Magic Function : builtin function 
PHP magic methods are special, predefined methods 
that PHP calls automatically when specific operations or events occur on an object

Every magic method is predefined by the core engine and always 
begins with a double underscore (__)


In PHP, destructor method is named as __destruct. 
During shutdown sequence too, objects will be destroyed. 
Destructor method doesn't take any arguments, 
neither does it return any data type

*/
class a
{
    public function __destruct()// object() destroy & call in last
    {
        echo "I'm dead now <br>";
    }
    public function __construct()  // call first
    {
        echo "I'm alive! <br>";    
	}
	public function display()  
    {
        echo "I'm display now <br>";
    }
}

$a = new a();
$a->display();

?>