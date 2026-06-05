<?php
    include_once('../model.php'); //step 1 load model page

    class control extends model{ //step 2 extends model class


        function __construct()
        {
			
			session_start();
			
            model::__construct(); // step 3 call model __construct

            $url=$_SERVER['PATH_INFO'];
            switch($url){

                case '/admin-login':
					if(isset($_REQUEST['submit']))
                    {
                        $email=$_REQUEST['email'];
                        $password=md5($_REQUEST['password']);  // hash pass encript
                       
                        $arr=array("email"=>$email,"password"=>$password);
                       
					    $res=$this->select_where('admin',$arr);    
                        $chk=$res->num_rows; // check row wise dat get or not
						if($chk==1) // 1 means true
						{
							// create session
							$fetch=$res->fetch_object();
							$_SESSION['admin_email']=$fetch->email;
							$_SESSION['admin_name']=$fetch->name;
							echo "<script>alert('Login Success');window.location='dashboard';</script>";
						}
						else
						{
							echo "<script>alert('Login Failed Due to wrong Creadential');</script>";
						}
						
                    }	
                    include_once('index.php');
                break;
				
				case '/admin_logout':
					unset($_SESSION['admin_email']);
					unset($_SESSION['admin_name']);
					echo "<script>alert('Logout Success');window.location='admin-login';</script>";
				break;
				
                case '/dashboard':
                    include_once('dashboard.php');
                break; 
                case '/add_categories':
					if(isset($_REQUEST['submit']))
                    {
                        $cate_name=$_REQUEST['cate_name'];
                        $image=$_FILES['image']['name'];
						
						// image upload
						$path='../assets/upload/categories/'.$image;  // pathy set
						$image_file=$_FILES['image']['tmp_name']; // get duplicate file
						move_uploaded_file($image_file,$path); // upload file in that path
						
						
                        $arr=array("cate_name"=>$cate_name,"image"=>$image);
                        $res=$this->insert('categories',$arr);    
                        echo "<script>alert('Categories Add Success');</script>";
                    }
                    include_once('add_categories.php');
                break; 
                case '/manage_categories':
                    $cate_arr=$this->select('categories');
                    include_once('manage_categories.php');
                break; 
				
				case '/edit_categories':
					if(isset($_REQUEST['edit']))
					{
						$id=$_REQUEST['edit'];
						$arr=array("id"=>$id);
						$run=$this->select_where('categories',$arr); // delete image from upload folder
						$fetch=$run->fetch_object();
					}
                    include_once('edit_categories.php');
                break; 
				
				
                case '/add_product':
					$categories=$this->select('categories');
					if(isset($_REQUEST['submit']))
                    {
                        $cate_id=$_REQUEST['cate_id'];
						$name=$_REQUEST['name'];
						$main_price=$_REQUEST['main_price'];
						$discounted_price=$_REQUEST['discounted_price'];
						$long_desc=$_REQUEST['long_desc'];
						$short_desc=$_REQUEST['short_desc'];
						
                        $image=$_FILES['image']['name'];
						
						// image upload
						$path='../assets/upload/product/'.$image;  // pathy set
						$image_file=$_FILES['image']['tmp_name']; // get duplicate file
						move_uploaded_file($image_file,$path); // upload file in that path
						
                        $arr=array("cate_id"=>$cate_id,"name"=>$name,"main_price"=>$main_price
						,"discounted_price"=>$discounted_price,"long_desc"=>$long_desc,"short_desc"=>$short_desc,"image"=>$image);
						
                        $res=$this->insert('products',$arr);    
                        echo "<script>alert('products Add Success');</script>";
                    }
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
				
				case '/delete':
                    
					if(isset($_REQUEST['del_contact']))
					{
						$id=$_REQUEST['del_contact'];
						$arr=array("id"=>$id);
						$res=$this->delete_where('contact',$arr);
						echo "<script>alert('Contact Delete Success');window.location='manage_contact';</script>";
					}
					if(isset($_REQUEST['del_product']))
					{
						$id=$_REQUEST['del_product'];
						$arr=array("id"=>$id);
						
						$run=$this->select_where('products',$arr); // delete image from upload folder
						$fetch=$run->fetch_object();
						$image=$fetch->image;
						unlink('../assets/upload/product/'.$image);
						
						$res=$this->delete_where('products',$arr);
						echo "<script>alert('Product Delete Success');window.location='manage_product';</script>";
					}
					if(isset($_REQUEST['del_categories']))
					{
						$id=$_REQUEST['del_categories'];
						$arr=array("id"=>$id);
						
						$run=$this->select_where('categories',$arr);
						$fetch=$run->fetch_object();
						$image=$fetch->image;
						unlink('../assets/upload/categories/'.$image);
						
						$res=$this->delete_where('categories',$arr);
						echo "<script>alert('Categories Delete Success');window.location='manage_categories';</script>";
					}
					if(isset($_REQUEST['del_customer']))
					{
						$id=$_REQUEST['del_customer'];
						$arr=array("id"=>$id);
						
						$run=$this->select_where('customer',$arr); // delete image from upload folder
						$fetch=$run->fetch_object();
						$image=$fetch->image;
						unlink('../assets/upload/customers/'.$image);
						
						$res=$this->delete_where('customer',$arr);
						echo "<script>alert('Customer Delete Success');window.location='manage_customer';</script>";
					}
					
					if(isset($_REQUEST['del_employee']))
					{
						$id=$_REQUEST['del_employee'];
						$arr=array("id"=>$id);
						$res=$this->delete_where('employee',$arr);
						echo "<script>alert('Employee Delete Success');window.location='manage_employee';</script>";
					}
					
                break;    

				case '/status':
				
				
					if(isset($_REQUEST['status_customer']))
					{
						$id=$_REQUEST['status_customer'];
						$where=array("id"=>$id);
						$res=$this->select_where('customer',$where);
						
						$fetch=$res->fetch_object();
						//echo $fetch->status;
						if($fetch->status=="Block")
						{
							$arr=array("status"=>"Unblock");
							$res=$this->update_where('customer',$arr,$where);
							if($res)
							{
								echo "<script>alert('Unblock Status Success');window.location='manage_customer';</script>";
							}
						}
						else
						{
							$arr=array("status"=>"Block");
							$res=$this->update_where('customer',$arr,$where);
							if($res)
							{
								echo "<script>alert('Block Status Success');window.location='manage_customer';</script>";
							}
						}	
					}
					
					
					if(isset($_REQUEST['status_product']))
					{
						$id=$_REQUEST['status_product'];
						$where=array("id"=>$id);
						$res=$this->select_where('products',$where);
						
						$fetch=$res->fetch_object();
						//echo $fetch->status;
						if($fetch->status=="InStock")
						{
							$arr=array("status"=>"OutStock");
							$res=$this->update_where('products',$arr,$where);
							if($res)
							{
								echo "<script>alert('OutStock Status Success');window.location='manage_product';</script>";
							}
						}
						else
						{
							$arr=array("status"=>"InStock");
							$res=$this->update_where('products',$arr,$where);
							if($res)
							{
								echo "<script>alert('InStock Status Success');window.location='manage_product';</script>";
							}
						}	
					}
				break;

						
				
            }

        }


    }
    $obj=new control;
?>