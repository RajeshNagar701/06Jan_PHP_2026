<?php
include_once('header.php');
?>


<!-- Main Content -->
        <main class="main-content">
            <!-- Page Header -->
            <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h1 class="greeting">Edit Categories</h1>
                </div>
               
            </div>



            <!-- Top Pages Table -->
            <div class="card" style="padding:100px">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Edit Categories</h3>
                    </div>
                </div>
               
				 <form action="" method="post" enctype="multipart/form-data" >
					  <div class="form-group">
						<label class="form-label">Categories Name</label>
						<input type="text" name="cate_name" value="<?php echo $fetch->cate_name;?>" class="form-input">
					  </div>
					  <div class="form-group">
						<label class="form-label">Categories Image</label>
						<input type="file" name="image" class="form-input">
						<img src="../assets/upload/categories/<?php echo $fetch->image;?>" width="50px" height="80px" />
					  </div>
					  <div class="form-group">
						<input type="submit" name="submit" value="Save"  class="btn btn-primary" />
					  </div>
				 </form> 
               
            </div>
        </main>

 <?php
 include_once('footer.php');
 ?>       