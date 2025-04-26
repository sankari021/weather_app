<?php
$connection = mysqli_connect("localhost", "root", "", "weather_app");
if (!$connection) die("Database connection failed: " . mysqli_connect_error());
?>
