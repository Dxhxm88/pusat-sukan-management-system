<?php 
include('../config/include.php');
require(asset('controller/controller.php'));

if (isset($_GET['logout'])) {
    logout();
}

$datas = getBookedTotal();

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Sukan Utem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <?php include('inc/navbar.php') ?>

        <main>
            <div class="mb-4 border-bottom">
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 fw-normal">Welcome <?= $_SESSION['name'] ?>, Pusat Sukan Utem</h1>
                    <p class="fs-5 text-muted">Sukan peneraju negara</p>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <?php foreach ($datas as $data) { ?>
                    <div class="col mx-auto m-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data['name'] ?></h5>
                                <a href="#" class="btn btn-primary">Total Booking: <?= $data['count'] ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>