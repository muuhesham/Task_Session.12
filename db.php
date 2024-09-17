<?php
$host = 'localhost';
$db = 'todo_app';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn, $user, $pass);
