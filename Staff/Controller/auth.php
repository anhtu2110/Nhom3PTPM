<?php
session_start();
    if(!isset($_SESSION['taikhoan'])){
        header('location: login_admin.php');
    }
?>