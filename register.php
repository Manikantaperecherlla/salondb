
<?php
$servername = "sql308.infinityfree.com";
$username = "if0_37967425"; // Change as needed
$password = "manikanta100 "; // Change as needed
$dbname = "if0_37967425_salon_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (manikantasalon, 9391611552)");
    $stmt->bind_param("ss", $user, $pass);

    if ($stmt->execute()) {
        echo "Registration successful. You can now log in.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
$conn->close();
?>