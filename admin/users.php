<?php
include('../config/include.php');
include(asset('controller/controller.php'));

$users = getUsers();

if (isset($_GET['delete'])) {
    deleteUser($_GET['delete']);
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
            <h1 class="display-4 fw-normal border-bottom">Users</h1>

            <div class="mb-3 mt-3">
                <a href="<?= route('admin/users-add.php') ?>" class="btn btn-primary">Add User</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Matrix Id</th>
                        <th scope="col">Phone</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <th scope="row"><?= $user['id'] ?></th>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['matrix'] ?></td>
                            <td><?= $user['phone'] ?></td>
                            <td>
                                <a href="<?= route('admin/users-edit.php?user_id=' . $user['id']) ?>" class="btn btn-primary">Edit</a>
                                <a href="<?= route('admin/users.php?delete=' . $user['id']) ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>