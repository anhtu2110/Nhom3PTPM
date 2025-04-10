<?php
session_start();
    if(!isset($_SESSION['is_admin'])){
        header('location: login_admin.php');
    }
?>