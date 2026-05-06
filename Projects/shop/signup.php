<?php
include_once('header.php')
?>

<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading about-page-heading" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-content">
          <h2>Signup Us</h2>
          <span>Signup Here &amp; Explore shop & Brands </span>
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
          <h2>Signup Here</h2>
          <span>Explore shop & Brands</span>
        </div>
        <form id="contact" action="" method="post">
          <div class="row">
            <div class="col-lg-12 mb-3">
              <fieldset>
                <input name="name" type="text" id="email" placeholder="Your Name" required="">
              </fieldset>
            </div>
            <div class="col-lg-12 mb-3">
              <fieldset>
                <input name="email" type="text" id="email" placeholder="Your email" required="">
              </fieldset>
            </div>
            <div class="col-lg-12 mb-3">
              <fieldset>
                <input name="password" type="password" id="name" placeholder="Your password" required="">
              </fieldset>
            </div>
            <div class="col-lg-12 mb-3">
              <fieldset>
                <input name="number" type="text" id="email" placeholder="Your Mobile" required="">
              </fieldset>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <button type="submit" name="submit" class="btn btn-dark">Signup Here</button>
                <a href="login" class="float-end">If you already Registered then Login Here</a>
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