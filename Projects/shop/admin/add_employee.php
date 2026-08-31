<?php
include_once('header.php');
?>


<!-- Main Content -->
        <main class="main-content">
            <!-- Page Header -->
            <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h1 class="greeting">Employee</h1>
                </div>
               
            </div>



            <!-- Top Pages Table -->
            <div class="card" style="padding:100px">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Add Employee</h3>
                    </div>
                </div>
               
				 <form action="" method="post" >
					  <div class="form-group">
						<label class="form-label">Name</label>
						<input type="text" name="name" class="form-input">
					  </div>
					  <div class="form-group">
						<label class="form-label">Email</label>
						<input type="email" name="email" class="form-input">
					  </div>
					  <div class="form-group">
						<label class="form-label">Password</label>
						<input type="password" name="password" class="form-input">
					  </div>
					  <div class="form-group">
						<label class="form-label">Mobile</label>
						<input type="number" name="mobile" class="form-input">
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