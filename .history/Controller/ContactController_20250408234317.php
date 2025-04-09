<?php
    include $_SERVER['DOCUMENT_ROOT'].'/TestCNPM/Connect/connectDatabase.php'; 

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['current_date_time'];

    include '../Model/ContactModel.php';
        $save = new ContactModel();
        $result = $save->SaveData($fullname,$email,$title,$content,$date);
    }
?>