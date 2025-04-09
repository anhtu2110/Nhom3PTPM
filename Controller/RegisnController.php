<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Title = $_POST['fullname'];
    $UserName = $_POST['username'];
    $Password = $_POST['password'];
    $Password2 = $_POST['password2'];
    $Email = $_POST['email'];
    $Phone_Numbers = $_POST['phone'];
    $Address = $_POST['address'];
    $RegistrationDate = $_POST['current_date_time'];

    if ($Password == $Password2) {
        require_once '../Model/LoginModel.php';
         $model = new LoginModel();
         $checkUser = $model->CheckUser($UserName, $Email);
        if ($checkUser == true) {
            echo json_encode(array("success" => false, "message" => "Tên đăng nhập hoặc email đã tồn tại. Vui lòng nhập tài khoản khác."));
            exit();
        }
         $result = $model->setUserCustomer($Title, $UserName, $Password, $Email, $Phone_Numbers, $Address, $RegistrationDate);

        if (!$result) {
            echo json_encode(array("success" => true,'message'=> 'Bạn đã đăng ký thành công tài khoản của mình.'));
            exit();
        } else {
            echo json_encode(array("success" => false, "message" => "Có lỗi xảy ra khi đăng ký."));
            exit();
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Mật khẩu không khớp."));
        exit();
    }
}
?>

