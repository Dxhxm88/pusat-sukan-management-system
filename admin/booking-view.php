<?php
include('../config/include.php');
include(asset('controller/controller.php'));
include(asset('Calendar.php'));
$calendar = new Calendar('2023-01-03');
$calendar->add_event("Booked", '2023-01-05');
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $_ENV['APP_NAME'] ?> </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <link rel="stylesheet" href="<?= route('css/calendar.css') ?>">
</head>

<body>
    <div class="container py-3">
        <?php include('inc/navbar.php') ?>

        <main>
            <div class="container">
                <h1>Book Facility</h1>
                <hr>

                <div class="mb-3 mt-3">
                    <a href="<?= route('admin/booking-add.php') ?>" class="btn btn-secondary">Back</a>
                </div>

                <div class="row mb-2">
                    <div class="col col-auto">
                        <img src="<?= route('img/depanpsm.jpg') ?>" width="300" alt="">
                    </div>
                    <div class="col">
                        <h2>Badminton Court</h2>
                        <p>Capacity: 8</p>
                        <p>Type: Court</p>
                    </div>
                </div>

                <form>
                    <div class="form-group mb-2">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date">
                    </div>
                    <button type="submit" class="btn btn-primary">Book</button>
                </form>
            </div>

            <?= $calendar; ?>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>