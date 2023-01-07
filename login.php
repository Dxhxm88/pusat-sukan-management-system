<?php 
include('config/include.php');
include(asset('controller/user-controller.php'));

if (isset($_POST['submit'])) {
    login($_POST);
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Sukan UTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>


    <div class="container py-3">
        <?php include('inc/navbar.php') ?>

        <main>
            <h1>Login</h1>
            <div class="container w-50 border border-rounded p-3">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    <div class="mt-3">
                        <div>Don't have an account yet? <a href="register.php">Register now?</a></div>
                    </div>
                    <div class="mt-3">
                        <div>Login Admin <a href="admin/login.php">here</a></div>
                    </div>
                </form>
            </div>
        </main>

        <?php include('inc/footer.php') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>