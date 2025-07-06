<?php
//db connection
$host = "localhost";
$user = "root";
$password = ""; // password if there is
$database = "trendy_db";

$conn = new mysqli($host, $user, $password, $database);

//check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

//get POST data and sanitize
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$message = htmlspecialchars(trim($_POST['message']));

//validate
if (empty($name) || empty($email) || empty($message)) {
    echo "Input all fields!";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format!";
    exit;
}

//insert into db
$sql = "INSERT INTO t_contacts (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Successfully sent!";
} else {
    echo "Sending failed! try again";
}

$stmt->close();
$conn->close();
