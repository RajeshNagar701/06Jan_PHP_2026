<?php
    include_once('model.php'); //step 1 load model page

    class control extends model{ //step 2 extends model class


        function __construct()
        {
            model::__construct(); // step 3 call model __construct

            $url=$_SERVER['PATH_INFO'];
            switch($url){

                case '/index':
                    include_once('index.php');
                break;
                case '/about':
                    include_once('about.php');
                break; 
                case '/products':
                    include_once('products.php');
                break; 
                case '/single-product':
                    include_once('single-product.php');
                break; 
                case '/contact':
                    include_once('contact.php');
                break; 
                case '/signup':
                    include_once('signup.php');
                break;
                case '/login':
                    include_once('login.php');
                break;    
            }

        }


    }
    $obj=new control;
?>