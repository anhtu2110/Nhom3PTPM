<?php
session_start();
unset($_SESSION['staffID']);
unset($_SESSION['taikhoan']);
unset($_SESSION['file']);
header("Location: login_admin.php");
exit;
?>