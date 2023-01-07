<?php
include('../config/include.php');
include(asset('controller/controller.php'));

$facility = getFacility($_GET['facility_id']);

if (isset($_POST['submit'])) {
    $_POST['image'] = $_FILES['image'];
    editFacility($_POST, $_GET['facility_id']);
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
            <h1 class="display-4 fw-normal border-bottom">Edit Facility</h1>

            <div class="mb-3 mt-3">
                <a href="<?= route('admin/facility.php') ?>" class="btn btn-secondary">Back</a>
            </div>
            <div class="border p-2">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?= $facility['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-control" required>
                            <option value="court" <?= $facility['type'] == "court" ? 'selected' : ''; ?>>Court</option>
                            <option value="hall" <?= $facility['type'] == "hall" ? 'selected' : ''; ?> >Hall</option>
                            <option value="room" <?= $facility['type'] == "room" ? 'selected' : ''; ?> >Room</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Capacity</label>
                        <input type="number" name="capacity" class="form-control" value="<?= $facility['capacity'] ?>" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-auto">
                            <img src="<?= route($facility['image']) ?>" width="100">
                        </div>
                        <div class="col">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            <p class="text-muted">If not updating image, leave it blanks</p>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>