<?php
include('db.php');
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
mysqli_query($connection, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
echo "Account created. <a href='index.html'>Login</a>";
?>
