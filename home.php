<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['rememberme'])) {
        $_SESSION['user_id'] = $_COOKIE['rememberme'];
    } else {
        header('Location: login.php');
        exit;
    }
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ?");
$stmt->execute([$user_id]);
$notes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Your To-Do List</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Your To-Do List</h1>
        <a href="add_note.php" class="btn btn-success mb-3">Add Note</a>

        <ul class="list-group">
            <?php foreach ($notes as $note): ?>
                <li class="list-group-item">
                    <h3><?= $note['title'] ?></h3>
                    <p><?= $note['description'] ?></p>
                    <a href="edit_note.php?id=<?= $note['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="delete_note.php?id=<?= $note['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
