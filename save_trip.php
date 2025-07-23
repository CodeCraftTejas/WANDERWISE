<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $destination = $_POST['destination'];
    $start_date  = $_POST['start_date'];
    $end_date    = $_POST['end_date'];
    $interests   = $_POST['interests'];
    $flight_cost = $_POST['flight_cost'];
    $stay_cost   = $_POST['stay_cost'];
    $food_cost   = $_POST['food_cost'];
    $activities_cost = $_POST['activities_cost'];

    $sql = "INSERT INTO trips (user_id, destination, start_date, end_date, interests, flight_cost, stay_cost, food_cost, activities_cost)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssddd", $user_id, $destination, $start_date, $end_date, $interests, $flight_cost, $stay_cost, $food_cost, $activities_cost);
    $stmt->execute();

    header("Location: dashboard.php");
}
?>
