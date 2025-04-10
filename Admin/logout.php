<?php
session_start();
unset($_SESSION['is_admin']);
unset($_SESSION['UserName']);
unset($_SESSION['Image']);
header("Location: login_admin.php");
exit;
?>