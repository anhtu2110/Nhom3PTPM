<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Staff/Model/ProfileModel.php';

    class Update_Profile_Controller
    {
        private $model;

        public function __construct()
        {
            $this->model = new Profile_Model();
        }

        public function Update_Profile($UserID, $Title, $UserName, $Password, $Email, $Phone_Number, $Address)
        {
            return $this->model->Update_Profile($UserID, $Title, $UserName, $Password, $Email, $Phone_Number, $Address);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['IDStaff'])) {
            $UserID = $_POST['IDStaff'];
            $Title = $_POST['title'];
            $UserName = $_POST['username'];
            $Password = $_POST['password'];
            $Email = $_POST['email'];
            $Phone_Number = $_POST['phone_number'];
            $Address = $_POST['address'];

            $controller = new Update_Profile_Controller();
            $result = $controller->Update_Profile($UserID, $Title, $UserName, $Password, $Email, $Phone_Number, $Address);

            if ($result) {
                header('Content-type: application/json');
                echo json_encode(['check' => true, 'message' => 'Cập nhật thông tin cá nhân thành công!']);
            } else {
                header('Content-type: application/json');
                echo json_encode(['check' => false, 'message' => 'Có lỗi xảy ra trong quá trình cập nhật!']);
            }
        } else {
            header('Content-type: application/json');
            echo json_encode(['check' => false, 'message' => 'Không có thông tin cá nhân nào được cập nhật!']);
        }
    }
?>