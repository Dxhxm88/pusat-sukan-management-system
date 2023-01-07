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