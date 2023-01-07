<?php
include('../config/include.php');
include(asset('controller/controller.php'));

$bookings = getBookings();

if (isset($_GET['delete'])) {
    deleteBooking($_GET['delete']);
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
            <h1 class="display-4 fw-normal border-bottom">Booking</h1>

            <div class="mb-3 mt-3">
                <a href="<?= route('admin/booking-add.php') ?>" class="btn btn-primary">Facility</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Facility Name</th>
                        <th scope="col">Booker's Name</th>
                        <th scope="col">Booker's Phone</th>
                        <th scope="col">Details</th>
                        <th scope="col">Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking) { ?>
                        <tr>
                            <th scope="row"><?= $booking['id'] ?></th>
                            <td><?= $booking['facility_name'] ?></td>
                            <td><?= $booking['user_name'] ?></td>
                            <td><?= $booking['phone'] ?></td>
                            <td><?= $booking['detail'] ?></td>
                            <td><?= $booking['date'] ?></td>
                            <td>
                                <a href="<?= route('admin/booking.php?delete=' . $booking['id']) ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>