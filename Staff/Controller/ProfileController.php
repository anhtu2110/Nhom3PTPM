<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Staff/Model/ProfileModel.php';

class Profile_Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Profile_Model();
    }

    public function Show_ProfileStaffs($UserID)
    {
        return $this->model->Show_ProfileStaff($UserID);
    }

    public function Update_Avatars($UserID, $Img)
    {
        return $this->model->Update_Avatar($UserID, $Img);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file'])) {
        $UserID = $_POST['IDStaff'];
        $root = $_SERVER['DOCUMENT_ROOT'];
        $dir = '/Staff/img/';
        $diradmin = '/Admin/img/';
        $fileName = basename($_FILES['file']['name']);
        $file = $dir . $fileName;
        $adminFile = $diradmin . $fileName;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $root . $file)) {

            if (copy($root . $file, $root . $adminFile)) {
                $controller = new Profile_Controller();
                $result = $controller->Update_Avatars($UserID, 'img/' . $fileName);

                if ($result) {
                    header('Content-type: application/json');
                    echo json_encode(['check' => true, 'message' => 'Cập nhật avatar thành công!']);
                } else {
                    header('Content-type: application/json');
                    echo json_encode(['check' => false, 'message' => 'Có lỗi xảy ra trong quá trình cập nhật!']);
                }
            } else {
                header('Content-type: application/json');
                echo json_encode(['check' => false, 'message' => 'Có lỗi xảy ra khi sao chép file vào thư mục Admin!']);
            }
        } else {
            header('Content-type: application/json');
            echo json_encode(['check' => false, 'message' => 'Có lỗi xảy ra khi tải lên file!']);
        }
    } else {
        header('Content-type: application/json');
        echo json_encode(['check' => false, 'message' => 'Không có file nào được tải lên!']);
    }
}
