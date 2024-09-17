<?php
session_start();

if (isset($_COOKIE['rememberme'])) {
    $_SESSION['user_id'] = $_COOKIE['rememberme'];
}

if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>To-Do App</title>
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Welcome to To-Do App</h1>
        <a href="login.php" class="btn btn-primary mt-3">Login</a>
        <a href="register.php" class="btn btn-secondary mt-3">Register</a>
    </div>
</body>
</html>
