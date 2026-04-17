<?php
include_once('header.php');
?>


<!-- Main Content -->
        <main class="main-content">
            <!-- Page Header -->
            <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h1 class="greeting">Cart</h1>
                </div>
               
            </div>



            <!-- Top Pages Table -->
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Manage Cart</h3>
                    </div>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
								<th >Id</th>
								<th>Categories Name</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
                        </thead>
                        <tbody>
                            <tr>
								<td>1</td>
								<td>Men</td>
								<td><img src="../assets/images/men-02.jpg" width="50px"/></td>
								<td>
									<a href="" class="btn btn-primary">Delete</a>
									<a href="" class="btn btn-primary">Edit</a>
								</td>
							</tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

 <?php
 include_once('footer.php');
 ?>       