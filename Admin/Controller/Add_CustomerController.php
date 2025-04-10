<?php
    require_once '../Model/Admin_CustomerModel.php';
    class Add_CustomerController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_CustomerModel();
        }
        public function Add_Customer_Controller($fullname,$username,$password,$email,$address,$img,$phone,$date,$status){
            return $this->model->Add_Customer($fullname,$username,$password,$email,$address,$img,$phone,$date,$status);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $date = $_POST['extratime'];
        $status = $_POST['status'];
        if(isset($_FILES['file'])){

            $documentRoot = $_SERVER['DOCUMENT_ROOT']."/TestCNPM";
            $documenttg = '/img/';
            $dirimg = $documenttg.basename($_FILES['file']['name']);

            if(move_uploaded_file($_FILES['file']['tmp_name'],$documentRoot.$dirimg)){
                $controller = new Add_CustomerController();
                $result = $controller->Add_Customer_Controller($fullname,$username,$password,$email,$address,basename($_FILES['file']['name']),$phone,$date,$status);
                if($result){
                    header('Content-type: application/json');
                    echo json_encode(['check'=>true,'message'=>'Thêm thành công nhân viên vào cơ sở dữ liệu!']);
                }else{
                    header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình thêm!']);
                }
            }
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Không có yêu cầu ảnh!']);
        }
    }else{
        header('Content-type: application/json');
        echo json_encode(['check'=>false,'message'=>'Không có yêu cầu POST!']);
    }
?>