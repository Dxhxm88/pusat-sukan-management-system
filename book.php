<?php 
include 'Calendar.php';
$calendar = new Calendar('2023-01-03');
$calendar->add_event("Booked", '2023-01-05');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Sukan UTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="css/calendar.css">
</head>

<body>


    <div class="container py-3">
        <?php include('inc/navbar.php') ?>

        <main>
            <div class="container">
                <h1>Book Facility</h1>
                <hr>

                <div class="row mb-2">
                    <div class="col col-auto">
                        <img src="img/depanpsm.jpg" width="300" alt="">
                    </div>
                    <div class="col">
                        <h2>Badminton Court</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis itaque ratione dignissimos corrupti labore ducimus animi fugiat, sapiente illo eos neque excepturi architecto consequuntur non consectetur. Ea ex eveniet quo!</p>
                    </div>
                </div>

                <form>
                    <div class="form-group mb-2">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date">
                    </div>
                    <button type="submit" class="btn btn-primary">Book</button>
                </form>
            </div>

            <?= $calendar; ?>
        </main>

        <?php include('inc/footer.php') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>