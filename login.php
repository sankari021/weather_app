<?php
session_start();
include('db.php');

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $username;
    header("Location: search.html");
} else {
    echo "Login failed!";
}
?>
