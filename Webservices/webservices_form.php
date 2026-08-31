<?php
/*
Restfull Web Services
RESTful Web Services are basically REST Architecture based Web Services. 
In REST Architecture everything is a resource. 

RESTful web services are lightweight, highly scalable and maintainable and are very commonly used to 
create APIs for web-based applications. 

Difine Json_encode & jason_decode func with example ?

If you need to retrieve specific information from the server and make it appear on your website,
 you will probably be using JSON. The name of JSON stands for JavaScript Object Notation.
 It is based on JavaScript, so having some basic knowledge of it would be greatly welcome here. JSON also uses JavaScript syntax.
	
	$data=array("name"=>"Rajesh","age"=>"31")
	
	json={ “name”: “Rajesh” , ”age”:”31”}

JSON is anonymous data that can be translated in PHP variables.
Arrays can be converted to JSON format.
JSON is commonly used for reading data out of a web server and displaying it on a website.
There are integrated functions to manipulate JSON. Most important of them are PHP json_encode() and PHP json_decode().

*/


// it usein allways in android and iphone for
// retrive data from server & database in $arr[] and than output convert in array array("uid"=>"8") to json_encode [{"uid":"8","unm":"vihaana"}]
// than call this page on call_webserveses.php and convert in encode to decode 


	/*
	$arr=array("name"=>"Rajesh","age"=>"31");
	
	print_r($arr);
	
	echo "<br><br>";
	
	echo $json=json_encode($arr);
	
	echo "<br><br>";
	
	$decod_arr=json_decode($json);
	
	print_r($decod_arr);
	
	*/



	$conn=new Mysqli('localhost','root','','bakery');

	$sel="select * from products";
	$res=$conn->query($sel);
	
	while($fetch=$res->fetch_object())
		{
			$arr[]=$fetch;                                      
		}
	//print_r($arr);	
	echo $json_data=json_encode($arr);  // con

	

	?>                                     