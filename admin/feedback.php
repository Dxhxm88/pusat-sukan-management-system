<?php
include('../config/include.php');
include(asset('controller/controller.php'));
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Ali Bin Abu</td>
                        <td>ali@gmail.com</td>
                        <td>0123564987</td>
                        <td>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. tore reprehenderit aliquid vero ipsum sunt eum. Eligendi, quia corrupti. Doloribus?
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>