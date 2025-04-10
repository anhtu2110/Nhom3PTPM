<?php
class Check_CodePassword {
    public function Check_Code() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['verification_code'])) {
                $email = $_POST['email'];
                $email_cookie_name = 'user_' . md5($email);
                $code = $_POST['verification_code'];
                if (isset($_COOKIE[$email_cookie_name])) {
                    $code_cookie = $_COOKIE[$email_cookie_name];
                    if ($code == $code_cookie) {
                        setcookie($email_cookie_name, '', time() - 3600, '/');
                        header('Content-type: application/json');
                        echo json_encode(['check' => true]);
                    } else {
                        header('Content-type: application/json');
                        echo json_encode(['check' => false]);
                    }
                } else {
                    header('Content-type: application/json');
                    echo json_encode(['check' => false, 'message' => 'Cookie không tồn tại']);
                }
            } else {
                header('Content-type: application/json');
                echo json_encode(['check' => false, 'message' => 'Dữ liệu không hợp lệ']);
            }
        } else {
            header('Content-type: application/json');
            echo json_encode(['check' => false, 'message' => 'Phương thức không được hỗ trợ']);
        }
    }
}
$check_code = new Check_CodePassword();
$check_code->Check_Code();
?>