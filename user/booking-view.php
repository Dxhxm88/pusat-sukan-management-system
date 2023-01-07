<?php
include('../config/include.php');
require(asset('/config/redirect.php'));
include(asset('controller/user-controller.php'));
include(asset('Calendar.php'));

if (isset($_GET['facility_id'])) {
    $facility = getOneFacility($_GET['facility_id']);
    $calendar = new Calendar($facility['calendar']['today']);

    if (isset($facility['bookedDate'])) {
        foreach ($facility['bookedDate'] as $bookedDate) {
            $calendar->add_event("Booked", $bookedDate);
        }
    }
}

if (isset($_POST['submit'])) {
    addBooking($_POST);
}
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
                    <a href="<?= route('user/booking-add.php') ?>" class="btn btn-secondary">Back</a>
                </div>

                <div class="row mb-2">
                    <div class="col col-auto">
                        <img src="<?= route($facility['facility']['image']) ?>" width="300" alt="">
                    </div>
                    <div class="col">
                        <h2><?= $facility['facility']['name'] ?></h2>
                        <p>Capacity: <?= $facility['facility']['capacity'] ?></p>
                        <p>Type: <?= $facility['facility']['type'] ?></p>
                    </div>
                </div>

                <form method="POST">
                    <div class="form-group mb-2">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" required>
                        <input type="hidden" name="facility" value="<?= $_GET['facility_id'] ?>">
                        <input type="hidden" name="user" value="<?= $_SESSION['id'] ?>">
                    </div>
                    <div class="form-group mb-2">
                        <label for="date">Detail</label>
                        <textarea type="date" name="detail" class="form-control" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Book</button>
                </form>
            </div>

            <?= $calendar; ?>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>