<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conn = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);

// Check for connection errors
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

function mysqlj($query)
{
    global $conn;
    return mysqli_query($conn, $query);
}

function login($data)
{
    $email = $data['email'];
    $password = $data['password'];
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqlj($query);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $name = $row['name'];
        // User exists, log in
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $row['id'];
        alert("Login successfully!");
        redirect(route('user/'));
    } else {
        // User does not exist, display an error message
        alert("Invalid username or password");
    }
}

function logout()
{
    session_destroy();
    $path = route('');
    header("Location: $path");
}

function register($data)
{
    $name = $data['name'];
    $matrix = $data['matrix'];
    $phone = $data['phone'];
    $email = $data['email'];
    $password = $data['password'];

    $query = "INSERT INTO users (name,matrix,phone,email,password) VALUES ('$name', '$matrix', '$phone', '$email', '$password')";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("User registered!");
        redirect(route('login.php'));
    } else {
        alert("Error register user");
    }
}

function alert($message)
{
    echo "<script>alert('$message');</script>";
}


function redirect($path)
{
    echo "<script>setTimeout(function() {window.location.href = '$path';}, 0);</script>";
}

function totalBooking($id)
{
    $query = "SELECT * FROM bookings WHERE user_id=$id";
    $result = mysqlj($query);

    return $result->num_rows;
}

function getBookings()
{
    $results = array();
    $id = $_SESSION['id'];

    $query = "SELECT * FROM bookings b INNER JOIN facility f ON b.facility_id=f.id WHERE user_id='$id'";
    $result = mysqlj($query);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }

    return $results;
}

function getFacility()
{
    $data = array();
    $query = "SELECT * FROM facility";
    $result = mysqlj($query);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function getOneFacility($id)
{
    $data = array();
    $query = "SELECT * FROM facility WHERE id=$id";
    $result = mysqlj($query);
    $data['facility'] = mysqli_fetch_assoc($result);

    $data['calendar'] = generateDataForCalendar();

    $bookedData = getFacilityBooking($id);

    foreach ($bookedData as $booked) {
        $data['bookedDate'][] = $booked['date'];
    }

    return $data;
}

function generateDataForCalendar()
{
    $data = array();
    $data['today'] = date("Y-m-d", strtotime("+1 day"));

    return $data;
}

function getFacilityBooking($id)
{
    $data = array();
    $query = "SELECT * FROM bookings WHERE facility_id=$id";
    $result = mysqlj($query);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function addBooking($data)
{
    $isBooked = checkBookingDate($data['facility'], $data['date']);

    if (!$isBooked) {
        $user = $data['user'];
        $facility = $data['facility'];
        $date = $data['date'];
        $detail = $data['detail'];
    
        $query = "INSERT INTO bookings (user_id,facility_id, date, detail) VALUES ('$user', '$facility', '$date', '$detail')";
        $result = mysqlj($query);
    
        // Check if the UPDATE statement was successful
        if ($result) {
            alert("Booking successfully!");
            redirect(route('user/booking-add.php'));
        } else {
            alert("Error add booking");
        }
    }else{
        alert("Date already booked!");
        redirect(route('user/booking-view.php?facility_id=' . $data['facility']));
    }
}

function checkBookingDate($id, $date)
{
    $query = "SELECT * FROM bookings WHERE facility_id=$id AND date='$date'";
    $result = mysqlj($query);

    return $result->num_rows > 0 ? true: false;
}

function getFeedbacks()
{
    $results = array();
    $id = $_SESSION['id'];

    $query = "SELECT * FROM feedbacks WHERE user_id='$id'";
    $result = mysqlj($query);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }

    return $results;
}

function addFeedback($data)
{
    $id = $_SESSION['id'];
    $message = $data['feedback'];

    $query = "INSERT INTO feedbacks (message,user_id) VALUES ('$message', '$id')";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Feedback sent!");
        redirect(route('user/feedback.php'));
    } else {
        alert("Error send feedback");
    }
}