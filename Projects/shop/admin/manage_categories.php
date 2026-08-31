<?php
include_once('header.php');
?>


<!-- Main Content -->
<main class="main-content">
    <!-- Page Header -->
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 1rem;">
        <div>
            <h1 class="greeting">Categories</h1>
        </div>

    </div>



    <!-- Top Pages Table -->
    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">Manage Categories</h3>
            </div>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Categories Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($cate_arr as $data) {
                    ?>
                        <tr>
                            <td><?php echo $data->id;?></td>
                            <td><?php echo $data->cate_name;?></td>
                            <td><img src="../assets/upload/categories/<?php echo $data->image;?>" width="50px" height="80px" /></td>
                            <td>
                                <a href="delete?del_categories=<?php echo $data->id;?>" class="btn btn-primary">Delete</a>
                                <a href="edit_categories?edit=<?php echo $data->id;?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
include_once('footer.php');
?>