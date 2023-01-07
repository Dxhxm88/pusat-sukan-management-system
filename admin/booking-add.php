<?php
include('../config/include.php');
include(asset('controller/controller.php'));

$facilities = getFacilities();
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
            <h1 class="display-4 fw-normal border-bottom">Book Facility</h1>

            <div class="mb-3 mt-3">
                <a href="<?= route('admin/booking.php') ?>" class="btn btn-secondary">Back</a>
            </div>
            <div class="border p-2">
            <div class="row justify-content-center text-center">
            <?php foreach ($facilities as $facility) { ?>
                    <div class="col mx-auto m-4">
                        <div class="card" style="width: 18rem;">
                            <img src="<?= route($facility['image']) ?>" width="100" height="200px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $facility['name'] ?></h5>
                                <p class="card-text">Capacity: <?= $facility['capacity'] ?>, Type: <?= $facility['type'] ?></p>
                                <a href="<?= route('admin/booking-view.php?facility_id=' . $facility['id'] ) ?>" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
        </main>
    </div>
</body>

</html>