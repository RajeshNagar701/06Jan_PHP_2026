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
    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">Manage Product</h3>
            </div>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Main Price</th>
                        <th>Discounted Price</th>
                        <th>Long Description</th>
                        <th>Short Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($prod_arr as $data) {
                    ?>
                        <tr>
                            <td><?php echo $data->id; ?></td>
                            <td><?php echo $data->name; ?></td>
                            <td><?php echo $data->main_price; ?></td>
                            <td><?php echo $data->discounted_price; ?></td>
                            <td><?php echo $data->long_desc; ?></td>
                            <td><?php echo $data->short_desc; ?></td>
                            <td><img src="../assets/images/men-02.jpg" width="50px" /></td>
                            <td>
                                <a href="" class="btn btn-primary">Delete</a>
                                <a href="" class="btn btn-primary">Edit</a>
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