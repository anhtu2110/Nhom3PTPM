<?php
session_start();
unset($_SESSION['userID']);
unset($_SESSION['userName']);
header("Location: index.php");
exit;
?>