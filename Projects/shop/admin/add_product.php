<?php
include_once('header.php');
?>


<!-- Main Content -->
        <main class="main-content">
            <!-- Page Header -->
            <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h1 class="greeting">Product</h1>
                </div>
               
            </div>



            <!-- Top Pages Table -->
            <div class="card" style="padding:100px">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Add Product</h3>
                    </div>
                </div>
               
				 <form action="" method="post"  enctype="multipart/form-data">
					  <div class="form-group">
						<label class="form-label">Product Name</label>
						<input type="text" name="name" class="form-input">
					  </div>
					  <div class="form-group">
						<label class="form-label">Main Price</label>
						<input type="number" name="main_price" class="form-input">
					  </div>
					  <div class="form-group">
						<label class="form-label">Discounted Price</label>
						<input type="number" name="discounted_price" class="form-input">
					  </div>
					  <div class="form-group">
						<label class="form-label">Long Description</label>
						<textarea  name="long_desc" class="form-input"></textarea>
					  </div>
					  <div class="form-group">
						<label class="form-label">Short Description</label>
						<textarea  name="short_desc" class="form-input"></textarea>
					  </div>
					  <div class="form-group">
						<label class="form-label">Product Image</label>
						<input type="file" name="image" class="form-input">
					  </div>
					  <div class="form-group">
						<input type="submit" name="submit"  class="btn btn-primary" />
					  </div>
				 </form> 
               
            </div>
        </main>

 <?php
 include_once('footer.php');
 ?>       