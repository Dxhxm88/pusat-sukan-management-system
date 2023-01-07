<?php
include('../config/include.php');
include(asset('controller/controller.php'));

$user = getUser($_GET['user_id']);

if (isset($_POST['submit'])) {
    updateUser($_POST, $_GET['user_id']);
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
            <h1 class="display-4 fw-normal border-bottom">Edit User</h1>

            <div class="mb-3 mt-3">
                <a href="<?= route('admin/users.php') ?>" class="btn btn-secondary">Back</a>
            </div>
            <div class="border p-2">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" value="<?= $user['email'] ?>"  class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Maxtrix Id</label>
                        <input type="text" name="matrix" value="<?= $user['matrix'] ?>"  class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" value="<?= $user['phone'] ?>"  class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>