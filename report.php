<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

$servername = "sql308.infinityfree.com";
$username = "if0_37967425"; // Change as needed
$password = "manikanta100 "; // Change as needed
$dbname = "if0_37967425_salon_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$stmt = $conn->prepare("SELECT SUM(amount) as total FROM transactions WHERE date BETWEEN ? AND ?");
$stmt->bind_param("ss", $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo "Total earnings from $start_date to $end_date: " . $row['total'];
$conn->close();