<?php
if (isset($_GET['logout'])) {
    echo 'dd';
}
?>
<header class="bg-dark">
    <div class="d-flex flex-column flex-md-row align-items-center p-2 mb-4">
        <a href="<?= route('user/') ?>" class="d-flex align-items-center text-light text-decoration-none">
            <span class="fs-4">User: Pusat Sukan Utem</span>
        </a>

        <nav class="d-inline-flex ms-md-auto pe-2">
            <a class="me-3 py-2 text-light text-decoration-none" href="index.php">Home</a>
            <a class="me-3 py-2 text-light text-decoration-none" href="booking.php">Booking</a>
            <a class="me-3 py-2 text-light text-decoration-none" href="feedback.php">Feedback</a>
            <a class="me-3 py-2 text-light text-decoration-none" href="<?= route('user/index.php?logout=1') ?>">Logout</a>
        </nav>
    </div>
</header>