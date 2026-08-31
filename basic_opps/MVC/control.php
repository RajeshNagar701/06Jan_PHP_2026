<?php

include_once('model.php');

class control extends model{
	
	function __construct(){
		
		$url=$_SERVER['PATH_INFO'];  //http://localhost/students/06Jan_PHP_2026/basic_opps/MVC/control.php
		
		switch($url)
		{
			
			case '/manage_product':
				//$product=$this->select('product');
				include_once('view_product.php');
			break;
			
			case '/manage_categories':
				//$product=$this->select('product');
				include_once('manage_categories.php');
			break;
			
			case '/manage_categories':
				//$product=$this->select('product');
				include_once('manage_categories.php');
			break;
			
			case '/manage_categories':
				//$product=$this->select('product');
				include_once('manage_categories.php');
			break;
		}
	}
}

$obj=new control;
?>