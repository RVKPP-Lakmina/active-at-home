<?php
$api = require_once '../private/initialize.php';
$trainers = $api->get('Trainers');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $api->post('Trainers', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'location' => $_POST['location'],
            'certifications' => $_POST['certifications'],
            'years_experience' => $_POST['years_experience']
        ]);
    } elseif (isset($_POST['update'])) {
        $api->put("Trainers", $_POST['id'], [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'location' => $_POST['location'],
            'certifications' => $_POST['certifications'],
            'years_experience' => $_POST['years_experience']
        ]);
    } elseif (isset($_POST['delete'])) {
        $api->delete("Trainers", $_POST['id']);
    }
    header('Location: trainers_page.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainers</title>
    <link rel="stylesheet" href="./assets/styles.css">
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
    <h2>Trainers</h2>
    <form method="POST">
        <input type="hidden" name="id" id="trainer-id">
        <input type="text" name="name" id="trainer-name" placeholder="Name" required>
        <input type="email" name="email" id="trainer-email" placeholder="Email" required>
        <input type="text" name="location" id="trainer-location" placeholder="Location" required>
        <input type="text" name="certifications" id="trainer-certifications" placeholder="Certifications" required>
        <input type="number" name="years_experience" id="trainer-years" placeholder="Years Experience" required>
        <button type="submit" name="add">Add</button>
        <button type="submit" name="update">Update</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Location</th>
            <th>Certifications</th>
            <th>Years Experience</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($trainers as $trainer): ?>
            <tr>
                <td><?= htmlspecialchars($trainer['id']) ?></td>
                <td><?= htmlspecialchars($trainer['name']) ?></td>
                <td><?= htmlspecialchars($trainer['email']) ?></td>
                <td><?= htmlspecialchars($trainer['location']) ?></td>
                <td><?= htmlspecialchars($trainer['certifications']) ?></td>
                <td><?= htmlspecialchars($trainer['years_experience']) ?></td>
                <td>
                    <button onclick="editTrainer(<?= htmlspecialchars(json_encode($trainer)) ?>)">Edit</button>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($trainer['id']) ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script>
        function editTrainer(trainer) {
            document.getElementById('trainer-id').value = trainer.id;
            document.getElementById('trainer-name').value = trainer.name;
            document.getElementById('trainer-email').value = trainer.email;
            document.getElementById('trainer-location').value = trainer.location;
            document.getElementById('trainer-certifications').value = trainer.certifications;
            document.getElementById('trainer-years').value = trainer.years_experience;
        }
    </script>

</body>

</html>