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
          <h2>Edit Profile</h2>
          <span>Edit Here &amp; Explore shop & Brands </span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Contact Area Starts ***** -->
<div class="contact-us">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="section-heading">
          <h2>Edit Here</h2>
          <span>Explore shop & Brands</span>
        </div>
        <form id="contact" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12 mb-3">
              <fieldset>
                <input name="name" type="text" placeholder="Your Name" value="<?php echo $fetch->name?>" required="">
              </fieldset>
            </div>
            <div class="col-lg-12 mb-3">
              <fieldset>
                <input name="email" type="text" placeholder="Your email" value="<?php echo $fetch->email?>" required="">
              </fieldset>
            </div>
         
			<div class="col-lg-12 mb-3">
              <fieldset>
				Gender :
                Male<input name="gender" type="radio" value="Male" <?php if($fetch->gender=="Male") { echo "checked";}?>>
				Female<input name="gender" type="radio" value="Female"  <?php if($fetch->gender=="Female") { echo "checked";}?>>
              </fieldset>
            </div>
			
			<div class="col-lg-12 mb-3">
              <fieldset>
				<?php
				$hobby=$fetch->hobby; // Sports,Dancing,Singing
				$hobby_arr=explode(",",$hobby);
				?>
				Hobby :
                Sports<input name="hobby[]" type="checkbox" value="Sports" <?php if(in_array("Sports",$hobby_arr)){ echo "checked";}?>>
				Dancing<input name="hobby[]" type="checkbox" value="Dancing" <?php if(in_array("Dancing",$hobby_arr)){ echo "checked";}?>>
				Singing<input name="hobby[]" type="checkbox" value="Singing" <?php if(in_array("Singing",$hobby_arr)){ echo "checked";}?>>
              </fieldset>
            </div>
			<div class="col-lg-12 mb-3">
              <fieldset>
                <input name="image" type="file" placeholder="Your Image" >
				<img src="assets/upload/customers/<?php echo $fetch->image?>" height="50px" alt="">
              </fieldset>
            </div>
            <div class="col-lg-12 mb-3">
              <fieldset>
                <input name="mobile" type="number" placeholder="Your Mobile" value="<?php echo $fetch->mobile?>" required="">
              </fieldset>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <button type="submit" name="submit" class="btn btn-dark">Save</button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ***** Contact Area Ends ***** -->

<?php
include_once('footer.php');
?>