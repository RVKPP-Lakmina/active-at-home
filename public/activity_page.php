<?php
$api = require_once '../private/initialize.php';
$activities = $api->get('Activities');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
    <link rel="stylesheet" href="./assets/styles.css">

    <style>
        th,
        td {
            border: 1px solid black;
            padding: 25px;
            text-align: left;
        }
    </style>
</head>

<body>
    <header>
        <h1>Active at Home</h1>
        <nav>
            <ul>
                <li><a href="view.php">Home</a></li>
                <li><a href="activity_page.php">Activities</a></li>
                <li><a href="trainers_page.php">Trainers</a></li>
            </ul>
        </nav>
    </header>
    <h2>Activities</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brief Description</th>
            <th>Benefits</th>
            <th>Price</th>
        </tr>
        <?php foreach ($activities as $activity): ?>
            <tr>
                <td><?= htmlspecialchars($activity['id']) ?></td>
                <td><?= htmlspecialchars($activity['name']) ?></td>
                <td><?= htmlspecialchars($activity['brief_description']) ?></td>
                <td><?= htmlspecialchars($activity['benefits']) ?></td>
                <td><?= htmlspecialchars($activity['price']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>