<?php
session_start();
include "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM trips WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
$trip = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - WanderWise</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="dashboard">
    <h2>Welcome to WanderWise</h2>
    <a href="plan_trip.php" class="btn">Plan a New Trip</a>
    <a href="logout.php" class="btn logout">Logout</a>

    <?php if ($trip): ?>
        <h3>Latest Trip: <?= htmlspecialchars($trip['destination']) ?></h3>
        <p>From <?= $trip['start_date'] ?> to <?= $trip['end_date'] ?></p>
        <p>Interests: <?= htmlspecialchars($trip['interests']) ?></p>

        <canvas id="budgetChart" width="400" height="200"></canvas>
        <script>
        const ctx = document.getElementById('budgetChart').getContext('2d');
        const budgetChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Flight', 'Stay', 'Food', 'Activities'],
                datasets: [{
                    label: 'Travel Budget',
                    data: [
                        <?= $trip['flight_cost'] ?>,
                        <?= $trip['stay_cost'] ?>,
                        <?= $trip['food_cost'] ?>,
                        <?= $trip['activities_cost'] ?>
                    ],
                    backgroundColor: ['#ff9f43', '#00cec9', '#fab1a0', '#81ecec'],
                }]
            }
        });
        </script>
    <?php else: ?>
        <p>No trips found. <a href="plan_trip.php">Start planning!</a></p>
    <?php endif; ?>
</div>
</body>
</html>
