<?php
if(isset($_SESSION['user_email']))
{
	
}
else
{
	echo "<script>window.location='index';</script>";
}	

include_once('header.php')
?>

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>About User Profile</h2>
                        <span>You can manage & Edit Your Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="offset-lg-2 col-lg-4">
                    <div class="left-image">
                        <img src="assets/upload/customers/<?php echo $fetch->image?>" height="300px" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4>Hi....  &amp; <?php echo $fetch->name;?></h4>
                        <p>Full Name : <?php echo $fetch->name;?></p>
						<p>Email : <?php echo $fetch->email;?></p>
						<p>Gender : <?php echo $fetch->gender;?></p>
						<p>Mobile : <?php echo $fetch->name;?></p>
						
						<a class="btn btn-primary" href="edit_profile?edit=<?php echo $fetch->id;?>">Edit</a>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->

   
  <?php
  include_once('footer.php');
  ?> 