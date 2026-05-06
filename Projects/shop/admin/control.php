<?php
    include_once('../model.php'); //step 1 load model page

    class control extends model{ //step 2 extends model class


        function __construct()
        {
            model::__construct(); // step 3 call model __construct

            $url=$_SERVER['PATH_INFO'];
            switch($url){

                case '/admin-login':
                    include_once('index.php');
                break;
                case '/dashboard':
                    include_once('dashboard.php');
                break; 
                case '/add_categories':
                    include_once('add_categories.php');
                break; 
                case '/manage_categories':
                    $cate_arr=$this->select('categories');
                    include_once('manage_categories.php');
                break; 
                case '/add_product':
                    include_once('add_product.php');
                break; 
                case '/manage_product':
                    $prod_arr=$this->select('products');
                    include_once('manage_product.php');
                break;
                case '/manage_contact':
                    $contact_arr=$this->select('contact');
                    include_once('manage_contact.php');
                break;
                case '/manage_customer':
                    $customer_arr=$this->select('customer');
                    include_once('manage_customer.php');
                break; 
                case '/manage_employee':
                    $employee_arr=$this->select('employee');
                    include_once('manage_employee.php');
                break; 
                case '/manage_feedback':
                    $feedback_arr=$this->select('feedback');
                    include_once('manage_feedback.php');
                break; 
                case '/manage_cart':
                    $cart_arr=$this->select('cart');
                    include_once('manage_cart.php');
                break;   
                case '/manage_order':
                    $order_arr=$this->select('order');
                    include_once('manage_order.php');
                break;     
            }

        }


    }
    $obj=new control;
?>