<?php
    require_once '../Model/Admin_CategoryModel.php';
    class Update_Category{
        private $model = null;
        public function __construct() {
            $this->model = new Admin_CategoryModel();
        }
        public function Update_Category($id, $title){
            $data = $this->model->Update_Category($id, $title);
            return $data;
        }
    }
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['CategoryID']) && isset($_POST['Title'])) {
            $CategoryID = $_POST['CategoryID'];
            $Title = $_POST['Title'];
            $controller = new Update_Category();
            $result = $controller->Update_Category($CategoryID, $Title);
            if ($result) {
                header('Content-type: application/json');
                echo json_encode(['check' => true, 'message' => 'Cập nhật thành công!']);
            } else {
                header('Content-type: application/json');
                echo json_encode(['check' => false, 'message' => 'Có lỗi xảy ra trong quá trình cập nhật!']);
            }
        } else {
            header('Content-type: application/json');
            echo json_encode(['check' => false, 'message' => 'Thiếu dữ liệu gửi đi!']);
        }
    }
?>