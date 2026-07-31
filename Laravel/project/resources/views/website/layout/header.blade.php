
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Plot Listing HTML5 Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo url('website/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet')?>">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo url('website/assets/css/fontawesome.css')?>">
    <link rel="stylesheet" href="<?php echo url('website/assets/css/templatemo-plot-listing.css')?>">
    <link rel="stylesheet" href="<?php echo url('website/assets/css/animated.css')?>">
    <link rel="stylesheet" href="<?php echo url('website/assets/css/owl.css')?>">
<!--

TemplateMo 564 Plot Listing

https://templatemo.com/tm-564-plot-listing

-->
  </head>

<body>

<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ; // current page url
  $url = end($url_array);  
  if($currect_page == $url){
	  echo 'active'; //class name in css 
  } 
}	
?>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index" class="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="/index" class="<?php active('index')?>">Home</a></li>
              <li><a href="/category" class="<?php active('category')?>">Category</a></li>
              <li><a href="/listing" class="<?php active('listing')?>">Listing</a></li>
              <li><a href="/contact" class="<?php active('contact')?>">Contact Us</a></li> 
			  @if(session('id'))
				<li><a href="/user_profile" class="<?php active('contact')?>">My Account </a></li> 
				<li><div class="main-white-button"><a href="user_logout"><i class="fa fa-user"></i> Logout </a></div></li> 
			  @else
				<li><div class="main-white-button"><a href="signup"><i class="fa fa-plus"></i> Signup </a></div></li> 
			  @endif		
			</ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->