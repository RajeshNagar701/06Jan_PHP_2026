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
                    if(isset($_REQUEST['submit']))
                    {
                        $name=$_REQUEST['name'];
                        $email=$_REQUEST['email'];
                        $mobile=$_REQUEST['mobile'];
                        $comment=$_REQUEST['comment'];

                        //$img=$_FILES['imgae']['name'];

                        $arr=array("name"=>$name,"email"=>$email,"mobile"=>$mobile,"comment"=>$comment);
                        $res=$this->insert('contact',$arr);    
                        echo "<script>alert('Contact Success');</script>";
                    }
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