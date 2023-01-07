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
    $query = "SELECT * FROM admins WHERE email='$email' AND password='$password'";

    $result = mysqlj($query);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $name = $row['name'];
        // User exists, log in
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $row['id'];
        alert("Login successfully!");
        redirect(route('admin/'));
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

function alert($message)
{
    echo "<script>alert('$message');</script>";
}


function redirect($path)
{
    echo "<script>setTimeout(function() {window.location.href = '$path';}, 0);</script>";
}

function getBookedTotal()
{
    $data = array();
    $query = "SELECT facility.name, COUNT(bookings.facility_id) as count
    FROM bookings
    INNER JOIN facility
    ON bookings.facility_id = facility.id
    GROUP BY bookings.facility_id
    ";
    $result = mysqlj($query);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function getFacilities()
{
    $data = array();
    $query = "SELECT * FROM facility";
    $result = mysqlj($query);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function deleteFacility($id)
{
    global $conn;
    $query = "DELETE FROM facility WHERE id=$id";
    $result = mysqlj($query);

    // Check if the DELETE statement was successful
    if ($result) {
        alert("Facility was deleted successfully.");
        redirect(route('admin/facility.php'));
    } else {
        $ms = "Error deleting facility: " . mysqli_error($conn);
        alert($ms);
    }
}

function getFacility($id)
{
    $query = "SELECT * FROM facility WHERE id=$id";
    $result = mysqlj($query);

    return mysqli_fetch_assoc($result);
}

function editFacility($data, $id)
{
    $name = $data['name'];
    $type = $data['type'];
    $capacity = $data['capacity'];
    $hasImage = false;

    $image = $data['image'];

    if ($image['name'] != null) {
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];
        $image_type = $image['type'];
        if (checkImage($image_type)) {
            $path = uploadAndGetPath($image_tmp_name, $image_name);
            $hasImage = true;
        } else {
            alert("Please upload image type only");
            return;
        }
    }

    if ($hasImage) {
        $query = "UPDATE facility SET name='$name', type='$type', capacity='$capacity', image='$path' WHERE id = $id";
    }else{
        $query = "UPDATE facility SET name='$name', type='$type', capacity='$capacity' WHERE id = $id";
    }
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Facility updated successfully.");
        redirect(route('admin/facility.php'));
    } else {
        alert("Error updating facility");
    }


}

function checkImage($image_type)
{
    // check if the file is an image
    if (strpos($image_type, 'image') === 0) {
        return true;
    }

    return false;
}

function uploadAndGetPath($image_tmp_name, $image_name)
{
    // file is an image, process the upload
    $image_path = "img/" . $image_name;
    move_uploaded_file($image_tmp_name, asset($image_path));

    return $image_path;
}

function addFacility($data)
{
    $name = $data['name'];
    $type = $data['type'];
    $capacity = $data['capacity'];

    $image = $data['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_type = $image['type'];
    if (checkImage($image_type)) {
        $path = uploadAndGetPath($image_tmp_name, $image_name);
    } else {
        alert("Please upload image type only");
        return;
    }

    $query = "INSERT INTO facility (name,type, capacity, image) VALUES ('$name', '$type', '$capacity', '$path')";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Facility added successfully.");
        redirect(route('admin/facility.php'));
    } else {
        alert("Error add facility");
    }
}

function getUsers()
{
    $data = array();
    $query = "SELECT * FROM users";
    $result = mysqlj($query);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function getUser($id)
{
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqlj($query);

    return mysqli_fetch_assoc($result);
}

function updateUser($data, $id)
{
    $name = $data['name'];
    $email = $data['email'];
    $matrix = $data['matrix'];
    $phone = $data['phone'];

    $query = "UPDATE users SET name='$name', email='$email', matrix='$matrix', phone='$phone' WHERE id = $id";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("User updated successfully.");
        redirect(route('admin/users.php'));
    } else {
        alert("Error updating user");
    }
}

function addUser($data)
{
    $name = $data['name'];
    $email = $data['email'];
    $matrix = $data['matrix'];
    $phone = $data['phone'];

    $query = "INSERT INTO users (name,email,matrix, phone) VALUES ('$name', '$email', '$matrix', '$phone')";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("User added successfully.");
        redirect(route('admin/users.php'));
    } else {
        alert("Error add user");
    }
}

function deleteUser($id)
{
    global $conn;
    $query = "DELETE FROM users WHERE id=$id";
    $result = mysqlj($query);

    // Check if the DELETE statement was successful
    if ($result) {
        alert("User was deleted successfully.");
        redirect(route('admin/users.php'));
    } else {
        $ms = "Error deleting user: " . mysqli_error($conn);
        alert($ms);
    }
}

function getFeedbacks()
{
    $results = array();

    $query = "SELECT feedbacks.id as feedback_id, feedbacks.message, users.*
    FROM feedbacks
    INNER JOIN users
    ON feedbacks.user_id = users.id";
    $result = mysqlj($query);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }

    return $results;
}

function getBookings()
{
    $results = array();

    $query = "SELECT b.*, f.name as facility_name, u.name as user_name, u.phone
    FROM bookings b
    INNER JOIN facility f
    ON b.facility_id = f.id
    INNER JOIN users u
    ON b.user_id = u.id";
    $result = mysqlj($query);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }

    return $results;
}

function deleteBooking($id)
{
    global $conn;
    $query = "DELETE FROM bookings WHERE id=$id";
    $result = mysqlj($query);

    // Check if the DELETE statement was successful
    if ($result) {
        alert("Booking was deleted successfully.");
        redirect(route('admin/booking.php'));
    } else {
        $ms = "Error deleting booking: " . mysqli_error($conn);
        alert($ms);
    }
}

function getOneFacility($id)
{
    $data = array();
    $query = "SELECT * FROM facility WHERE id=$id";
    $result = mysqlj($query);
    $data['facility'] = mysqli_fetch_assoc($result);

    $data['calendar'] = generateDataForCalendar();

    $bookedData = getFacilityBookings($id);

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

function getFacilityBookings($id)
{
    $data = array();
    $query = "SELECT * FROM bookings WHERE facility_id=$id";
    $result = mysqlj($query);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}
