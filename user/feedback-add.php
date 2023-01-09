<?php
include('../config/include.php');
require(asset('/config/redirect.php'));
include(asset('controller/user-controller.php'));

if (isset($_POST['submit'])) {
    addFeedback($_POST);
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
            <?php include(asset('/user/inc/navbar.php')) ?>
        </header>

        <main>
            <h1 class="display-4 fw-normal border-bottom">Add Feedback</h1>

            <div class="mb-3 mt-3">
                <a href="<?= route('user/feedback.php') ?>" class="btn btn-secondary">Back</a>
            </div>
            <div class="border p-2">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Feedback</label>
                        <textarea name="feedback" class="form-control"  rows="3"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>