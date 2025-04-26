<?php
session_start();
include('db.php');

$data = json_decode(file_get_contents("php://input"), true);
$username = $_SESSION['username'];

$user = mysqli_fetch_assoc(mysqli_query($connection, "SELECT id FROM users WHERE username='$username'"));
$user_id = $user['id'];

$city = $data['city'];
$temp = $data['temperature'];
$desc = $data['weather_description'];

mysqli_query($connection, "INSERT INTO search_history (user_id, city, temperature, weather_description)
VALUES ($user_id, '$city', $temp, '$desc')");
?>
