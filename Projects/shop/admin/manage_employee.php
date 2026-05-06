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
    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">Manage Employee</h3>
            </div>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($employee_arr as $data) {
                    ?>
                        <tr>
                            <td><?php echo $data->id; ?></td>
                            <td><?php echo $data->name; ?></td>
                            <td><?php echo $data->email; ?></td>
                            <td><?php echo $data->mobile; ?></td>
                            <td>
                                <a href="" class="btn btn-primary"><?php echo $data->status; ?></a>
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