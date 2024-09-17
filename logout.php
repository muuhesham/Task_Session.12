<?php
session_start();
session_destroy();

// Clear the "Remember Me" cookie
setcookie('rememberme', '', time() - 3600, "/");

header("Location: index.php");
exit;
?>
