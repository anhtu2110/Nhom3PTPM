<?php
require_once '../Model/Admin_CategoryModel.php';

class Admin_CategoryController {
    private $model = null;

    public function __construct() {
        $this->model = new Admin_CategoryModel();
    }

    public function Add_Category($title) {
        $data = $this->model->Add_Category($title);
        return $data;
    }
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title'])) {
        $title = $_POST['title'];

        $controller = new Admin_CategoryController();
        $result = $controller->Add_Category($title);

        if ($result) {
            header('Content-type: application/json');
            echo json_encode(['check' => true, 'message' => 'Thêm thành công vào cơ sở dữ liệu!']);
        } else {
            header('Content-type: application/json');
            echo json_encode(['check' => false, 'message' => 'Có lỗi xảy ra trong quá trình thêm!']);
        }
    } else {
        header('Content-type: application/json');
        echo json_encode(['check' => false, 'message' => 'Thiếu dữ liệu gửi đi!']);
    }
}
?>
