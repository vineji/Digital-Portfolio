<?php
session_start();
$servername = "********";
$username = "********";
$password = "*********";
$dbname = "**********";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

$title = $_POST['title'];
$blog = $_POST['blog'];
$date = date('Y-m-d'); // Use the correct date format
date_default_timezone_set('Europe/London');
$time = date('H:i:s');

$stmt = $conn->prepare("INSERT INTO BlogPosts (title, content, date, time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $title, $blog, $date, $time);

if ($stmt->execute()) {
    header('Location: viewBlog.php');
} else {
    echo "Error:" . $stmt->error;
}

$stmt->close();
$conn->close();
?>
