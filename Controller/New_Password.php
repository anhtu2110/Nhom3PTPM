<?php
session_start();
require_once '../Model/ResetPasswordModel.php';

class New_Password {
    private $model = null;

    public function __construct() {
        $this->model = new ResetPasswordModel();
    }

    public function ResetPassword($email, $password) {
        return $this->model->ResetPassword($email, $password);
    }
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $controller = new New_Password();
    $result = $controller->ResetPassword($email, $password);

    if ($result) {
        unset($_SESSION['Password_Email']);
        header('Content-Type: application/json');
        echo json_encode(['status' => true]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'error' => 'Password reset failed']);
    }
} else {
    echo json_encode(['status' => false, 'error' => 'Email and password required']);
}
?>
