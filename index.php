<?php include('config/include.php');
include(asset('controller/user-controller.php'));

$facilities = getFacility();

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Sukan Utem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>


    <div class="container py-3">
        <?php include('inc/navbar.php') ?>

        <main>
            <div class="mb-4 border-bottom">
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 fw-normal">Pusat Sukan Utem</h1>
                    <p class="fs-5 text-muted">Sukan peneraju negara</p>
                    <a href="<?= route('register.php') ?>" class="btn btn-primary">Register Now</a>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <?php foreach ($facilities as $facility) { ?>
                    <div class="col mx-auto m-4">
                        <div class="card" style="width: 18rem;">
                            <img src="<?= route($facility['image']) ?>" height="200px" width="100" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $facility['name'] ?></h5>
                                <p class="card-text">Capacity: <?= $facility['capacity'] ?>, Type: <?= $facility['type'] ?></p>
                                <a href="<?= route('user/booking-view.php?facility_id=' . $facility['id'] ) ?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>

        <?php include('inc/footer.php') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>