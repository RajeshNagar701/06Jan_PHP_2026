<?php
	/*
	step -1  CREATE helper.php & add functionality in page :  app/helper.php
		
		if(!function_exists('custome_date')){
			function custome_date($date,$format)
			{
				$date_formated=date($format,strtotime($date));
				return $date_formated;
			}
		}
	
	step -2 registered in composer.json 
		"autoload": {
			"files": [
				   "app/helpers.php"
			   ]
			}
	step -3 Run cmd: composer dump-autoload
	
	step -4 Now youcan access all functionality from helper page anywhere in project
	
		{{custome_date($d->dob, 'd-M-Y')}}
		
	*/
	
	// you can check arr data in that function

	if(!function_exists('getdata')){
		function getdata($data)
		{
			echo "<pre>";
				print_r($data);
			echo "</pre>";
		}
	}
	
	// you can print any format date in page
	if(!function_exists('custome_date')){
		function custome_date($date,$format)
		{
			$date_formated=date($format,strtotime($date));
			return $date_formated;
		}
	}
	
	// you can add direct path for any assests
	function productImagePath($image_name)
	{
	   return public_path('images/products/'.$image_name);
	}



?>