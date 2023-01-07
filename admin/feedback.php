<?php
include('../config/include.php');
include(asset('controller/controller.php'));

$feedbacks = getFeedbacks();
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
            <h1 class="display-4 fw-normal border-bottom">Feedback</h1>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($feedbacks as $feedback) { ?>
                        <tr>
                            <th scope="row"><?= $feedback['feedback_id'] ?></th>
                            <td><?= $feedback['name'] ?></td>
                            <td><?= $feedback['email'] ?></td>
                            <td><?= $feedback['phone'] ?></td>
                            <td>
                            <?= $feedback['message'] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>