<?php
    require_once 'connectDatabase.php';
    $conn = new Database();
    $result = $conn->getConnection();
    if($result){
        echo 'ok';
    }else{
        echo 'not ok';
    }
?>