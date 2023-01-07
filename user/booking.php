<?php
include('../config/include.php');
require(asset('/config/redirect.php'));
include(asset('controller/user-controller.php'));

$bookings = getBookings();

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
            <?php include(asset('/user/inc/navbar.php')) ?>
        </header>

        <main>
            <h1 class="display-4 fw-normal border-bottom">Booking</h1>

            <div class="mb-3 mt-3">
                <a href="<?= route('user/booking-add.php') ?>" class="btn btn-primary">Booking Facility</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Facility Photo</th>
                        <th scope="col">Facility Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($bookings) { 
                        foreach ($bookings as $booking) {
                    ?>
                        <tr>
                            <th scope="row"><?= $booking['id'] ?></th>
                            <td>
                                <img src="<?= route($booking['image']) ?>" width="100">
                            </td>
                            <td><?= $booking['name'] ?></td>
                            <td><?= $booking['detail'] ?></td>
                            <td><?= $booking['date'] ?></td>
                        </tr>
                    <?php } }else { ?>
                        <tr>
                            <th colspan="5" class="text-center">No booking yet</th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>