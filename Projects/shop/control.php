<?php
    include_once('model.php'); //step 1 load model page

    class control extends model{ //step 2 extends model class


        function __construct()
        {	
		
			session_start();  // start session
			
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
					$fetch=$this->select('products');
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
                        //echo "<script>alert('Contact Success');</script>";
                    }
                    include_once('contact.php');
                break; 
                case '/signup':
					if(isset($_REQUEST['submit']))
                    {
                        $name=$_REQUEST['name'];
                        $email=$_REQUEST['email'];
                        $password=md5($_REQUEST['password']);  // hash pass encript
                        $gender=$_REQUEST['gender'];
                        $hobby_arr=$_REQUEST['hobby'];// arr hobby
						$hobby=implode(",",$hobby_arr); // arr to string
                        $mobile=$_REQUEST['mobile'];

                        $image=$_FILES['image']['name'];
						
						// image upload
						$path='assets/upload/customers/'.$image;  // pathy set
						$image_file=$_FILES['image']['tmp_name']; // get duplicate file
						move_uploaded_file($image_file,$path); // upload file in that path
						

                        $arr=array("name"=>$name,"email"=>$email,"password"=>$password,"gender"=>$gender,"hobby"=>$hobby,"image"=>$image,"mobile"=>$mobile);
                        $res=$this->insert('customer',$arr);    
                        echo "<script>alert('Signin Success');</script>";
                    }
                    include_once('signup.php');
                break;
                case '/login':

					if(isset($_REQUEST['submit']))
                    {
                        $email=$_REQUEST['email'];
                        $password=md5($_REQUEST['password']);  // hash pass encript
                       
                        $arr=array("email"=>$email,"password"=>$password);
                       
					    $res=$this->select_where('customer',$arr);    
                        $chk=$res->num_rows; // check result by rowwise
						if($chk==1) // 1 means true
						{
							// create session
							$fetch=$res->fetch_object(); // fetch data whose email & pass match
							if($fetch->status=="Unblock")
							{
								$_SESSION['user_id']=$fetch->id;
								$_SESSION['user_email']=$fetch->email;
								$_SESSION['user_name']=$fetch->name;
								echo "<script>alert('Login Success');window.location='index';</script>";
							}
							else
							{
								echo "<script>alert('Login Failed Due to Blocked Account');</script>";
							}
						}
						else
						{
							echo "<script>alert('Login Failed Due to wrong Creadential');</script>";
						}
						
                    }	
                    include_once('login.php');
                break;

				case '/user_logout':
					unset($_SESSION['user_email']);
					unset($_SESSION['user_name']);
					echo "<script>alert('Logout Success');window.location='index';</script>";
				break;
				
				
				case '/user_profile':
					$arr=array("id"=>$_SESSION['user_id']);
					$run=$this->select_where('customer',$arr); // delete image from upload folder
					$fetch=$run->fetch_object();
                    include_once('user_profile.php');
                break; 
				
				case '/edit_profile':
					if(isset($_REQUEST['edit']))
					{
						$id=$_REQUEST['edit'];	
						$where=array("id"=>$id);
						$run=$this->select_where('customer',$where); // delete image from upload folder
						$fetch=$run->fetch_object();
						
						$old_image=$fetch->image;
						
						if(isset($_REQUEST['submit']))
						{
							$name=$_REQUEST['name'];
							$email=$_REQUEST['email'];
							$gender=$_REQUEST['gender'];
							$hobby_arr=$_REQUEST['hobby'];// arr hobby
							$hobby=implode(",",$hobby_arr); // arr to string
							$mobile=$_REQUEST['mobile'];

							
							if($_FILES['image']['size']>0)
							{
								unlink('assets/upload/customers/'.$old_image);
								// image upload
								$image=$_FILES['image']['name'];
								$path='assets/upload/customers/'.$image;  // pathy set
								$image_file=$_FILES['image']['tmp_name']; // get duplicate file
								move_uploaded_file($image_file,$path); // upload file in that path
								
								$arr=array("name"=>$name,"email"=>$email,"gender"=>$gender,"hobby"=>$hobby,"image"=>$image,"mobile"=>$mobile);
								$res=$this->update_where('customer',$arr,$where);  
								
								echo "<script>alert('Update Success');window.location='user_profile';</script>";
							}
							else
							{
								$arr=array("name"=>$name,"email"=>$email,"gender"=>$gender,"hobby"=>$hobby,"mobile"=>$mobile);
								$res=$this->update_where('customer',$arr,$where);  
								echo "<script>alert('Update Success');window.location='user_profile';</script>";

							}	
						}
                    }
					include_once('edit_profile.php');
                break; 
            }

        }


    }
    $obj=new control;
?>