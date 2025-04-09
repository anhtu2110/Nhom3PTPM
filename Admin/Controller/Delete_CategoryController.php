<?php
    require_once '../Model/Admin_CategoryModel.php';
    class Delete_CategoryController {
        private $model = null;
        public function __construct() {
            $this->model = new Admin_CategoryModel();
        }
        public function Delete_Category($CategoryID) {
            $data = $this->model->Delete_Category($CategoryID);
            return $data;
        }
    }
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['CategoryID'])) {
            $CategoryID = $_POST['CategoryID'];
            $controller = new Delete_CategoryController();
            $result = $controller->Delete_Category($CategoryID);
            if ($result) {
                header('Content-type: application/json');
                echo json_encode(['check' => true, 'message' => 'Xóa thành công!']);
            } else {
                header('Content-type: application/json');
                echo json_encode(['check' => false, 'message' => 'Có lỗi xảy ra trong quá trình xóa!']);
            }
        } else {
            header('Content-type: application/json');
            echo json_encode(['check' => false, 'message' => 'Thiếu dữ liệu gửi đi!']);
        }
    }
?>