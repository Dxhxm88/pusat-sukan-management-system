<?php
include('../config/include.php');
require(asset('/config/redirect.php'));
include(asset('controller/user-controller.php'));

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
            <?php include(asset('/user/inc/navbar.php')) ?>
        </header>

        <main>
            <h1 class="display-4 fw-normal border-bottom">Feedback</h1>

            <div class="mb-3 mt-3">
                <a href="<?= route('user/feedback-add.php') ?>" class="btn btn-primary">Give Feedback</a>
            </div>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($feedbacks) { 
                        foreach ($feedbacks as $feedback) { ?>
                            <tr>
                                <th scope="row"><?= $feedback['id'] ?></th>
                                <td>
                                    <?= $feedback['message'] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php }else { ?>
                        <tr>
                            <td colspan="2" class="text-center">No records</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>