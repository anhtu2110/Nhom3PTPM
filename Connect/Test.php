<?php
    require_once 'connectDatabase.php';

    $conn1 = new Database();
    $conn2 = $conn1->getConnection();

    if($conn2){
        echo 'ket noi jefijok';
    } else{
        echo 'not ok';
    }
?>