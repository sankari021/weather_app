<?php
session_start();
include('db.php');

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

$username = $_SESSION['username'];
$user = mysqli_fetch_assoc(mysqli_query($connection, "SELECT id FROM users WHERE username='$username'"));
$user_id = $user['id'];

$history = mysqli_query($connection, "SELECT * FROM search_history WHERE user_id=$user_id ORDER BY search_time DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?></h2>
    <h3>Search History</h3>
    <table>
    <tr><th>City</th><th>Temperature</th><th>Description</th><th>Date</th><th>Action</th></tr>
    <?php while ($row = mysqli_fetch_assoc($history)) { ?>
    <tr>
        <td><?= htmlspecialchars($row['city']) ?></td>
        <td><?= $row['temperature'] ?>°C</td>
        <td><?= htmlspecialchars($row['weather_description']) ?></td>
        <td><?= $row['search_time'] ?></td>
        <td>
            <a href="delete_history.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this entry?');">
                <button style="background:#dc3545;">Delete</button>
            </a>
        </td>
    </tr>
    <?php } ?>
</table>
    <a href="search.html"><button>Back</button></a>
</div>
</body>
</html>
