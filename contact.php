<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Sukan UTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>


    <div class="container py-3">
        <?php include('inc/navbar.php') ?>

        <main>
            <div class="container">
                <h1>Contact</h1>
                <hr>
                <br>

                <div class="row">
                    <div class="col">
                        <div class="contact-in">
                            <h1>Contact Info</h1>
                            <h2><i class="fa fa-phone" aria-hidden="true"></i>Phone</h2>
                            <p>014-3380258</p>
                            <h2><i class="fa fa-envelope" aria-hidden="true"></i>Email</h2>
                            <p>najwahunk@gmail.com</p>
                            <h2><i class="fa fa-map-marker" aria-hidden="true"></i>Address</h2>
                            <p>UTeM</p>
                            <ul>
                                <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                <li><a href="#"><i class="bi bi-google"></i></a></li>
                                <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="contact-in">
                            <h1>Send a Message</h1>
                            <form id="form" name="form" method="post" class="border p-2">
                                <div class="mb-2">
                                    <label class="form-label">Full Name</label>
                                    <input class="form-control" type="text" placeholder="Full Name" name="fullname" class="contact-in-input" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Full Name</label>
                                    <input class="form-control" type="text" placeholder="Email" name="email" class="contact-in-input" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Full Name</label>
                                    <input class="form-control" type="text" placeholder="Subject" name="subject" class="contact-in-input" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Full Name</label>
                                    <textarea class="form-control" placeholder="Message" name="message" class="contact-in-textarea" required></textarea>
                                </div>
                                <input type="submit" value="SUBMIT" class="btn btn-primary" a href="login.php">
            
                            </form>
                        </div>
                        <div class="contact-in">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15946.225455431411!2d102.3206242!3d2.3170198!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf9052c1799ddf0a1!2sSports%20Complex%20-%20University%20Technical%20Malaysia%20Melaka!5e0!3m2!1sen!2smy!4v1671308252451!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include('inc/footer.php') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>