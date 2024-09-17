<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ?");
$stmt->execute([$id]);
$note = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("UPDATE notes SET title = ?, description = ? WHERE id = ?");
    $stmt->execute([$title, $description, $id]);

    header("Location: home.php");
}
?>
<form method="post">
    <input type="text" name="title" value="<?= $note['title'] ?>" required>
    <textarea name="description"><?= $note['description'] ?></textarea>
    <button type="submit">Update Note</button>
</form>
