<?php
include('../config/include.php');
include(asset('controller/controller.php'));
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_ENV['APP_NAME'] ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header>
            <?php include(asset('/admin/inc/navbar.php')) ?>
        </header>

        <main>
            <h1 class="display-4 fw-normal border-bottom">Facility</h1>

            <div class="mb-3 mt-3">
                <a href="<?= route('admin/facility-add.php') ?>" class="btn btn-primary">Add Facility</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Image</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Badminton Court</td>
                        <td>Court</td>
                        <td>8</td>
                        <td>
                            <img src="<?= route('img/depanpsm.jpg') ?>" width="100">
                        </td>
                        <td>
                            <a href="<?= route('admin/facility-edit.php') ?>" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>