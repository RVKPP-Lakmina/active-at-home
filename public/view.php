<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>View</h1>

    <a href="index.php">Home</a>

    <h2>Activities</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brief Description</th>
            <th>Benefits</th>
            <th>Price</th>
        </tr>

        <?php
        $api = require_once '../private/initialize.php';

        $activities = $api->get('Activities');

        foreach ($activities as $activity) {
            echo "<tr>";
            echo "<td>{$activity['id']}</td>";
            echo "<td>{$activity['name']}</td>";
            echo "<td>{$activity['brief_description']}</td>";
            echo "<td>{$activity['benefits']}</td>";
            echo "<td>{$activity['price']}</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <h2>Trainers</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Location</th>
            <th>Certifications</th>
            <th>Years Experience</th>
        </tr>

        <?php
        $trainers = $api->get('Trainers');

        foreach ($trainers as $trainer) {
            echo "<tr>";
            echo "<td>{$trainer['id']}</td>";
            echo "<td>{$trainer['name']}</td>";
            echo "<td>{$trainer['email']}</td>";
            echo "<td>{$trainer['location']}</td>";
            echo "<td>{$trainer['certifications']}</td>";
            echo "<td>{$trainer['years_experience']}</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <h2>Bookings</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Activity ID</th>
            <th>Trainer ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Duration</th>
            <th>Price</th>
        </tr>

        <?php
        $bookings = $api->get('Bookings');

        foreach ($bookings as $booking) {
            echo    "<tr>" .
                "<td>{$booking['id']}</td>" .
                "<td>{$booking['activity_id']}</td>" .
                "<td>{$booking['trainer_id']}</td>" .
                "<td>{$booking['date']}</td>" .
                "<td>{$booking['time']}</td>" .
                "<td>{$booking['duration']}</td>" .
                "<td>{$booking['price']}</td>" .
                "</tr>";
        }
        ?>

</body>

</html>