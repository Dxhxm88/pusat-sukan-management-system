<?php
include('../config/include.php');
include(asset('controller/controller.php'));

$facilities = getFacilities();

if (isset($_GET['delete'])) {
    deleteFacility($_GET['delete']);
}
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
                    <?php foreach ($facilities as $facility) { ?>
                        <tr>
                            <th scope="row"><?= $facility['id'] ?></th>
                            <td><?= $facility['name'] ?></td>
                            <td><?= $facility['type'] ?></td>
                            <td><?= $facility['capacity'] ?></td>
                            <td>
                                <img src="<?= route($facility['image']) ?>" width="100">
                            </td>
                            <td>
                                <a href="<?= route('admin/facility-edit.php?facility_id=' . $facility['id']) ?>" class="btn btn-primary">Edit</a>
                                <a href="<?= route('admin/facility.php?delete=' . $facility['id']) ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>