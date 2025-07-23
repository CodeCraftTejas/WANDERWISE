<?php
$host = "localhost";
$user = "root";
$pass = "td@23804";
$db = "wanderwise";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
