<?php
session_start();
include "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Plan Trip - WanderWise</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
    <h2>Plan Your Trip</h2>
    <form action="save_trip.php" method="POST">
        <input type="text" name="destination" required placeholder="Destination"><br>
        <input type="date" name="start_date" required><br>
        <input type="date" name="end_date" required><br>
        <textarea name="interests" placeholder="Your travel interests..."></textarea><br>
        <input type="number" name="flight_cost" placeholder="Flight Cost"><br>
        <input type="number" name="stay_cost" placeholder="Stay Cost"><br>
        <input type="number" name="food_cost" placeholder="Food Cost"><br>
        <input type="number" name="activities_cost" placeholder="Activities Cost"><br>
        <button type="submit">Save Trip</button>
    </form>
</div>
</body>
</html>
