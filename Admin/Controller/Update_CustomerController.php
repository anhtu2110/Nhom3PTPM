<?php
    require_once '../Model/Admin_CustomerModel.php';
    class Update_CustomerController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_CustomerModel();
        }

        public function Update_Controller($CustomerID,$fullname,$username,$password,$email,$address,$img,$phone,$date,$status){
            return $this->model->Update_Customer($CustomerID,$fullname,$username,$password,$email,$address,$img,$phone,$date,$status);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $customerid = $_POST['customerid'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $date = $_POST['extratime'];
        $status = $_POST['status'];
        if(isset($_FILES['file'])){

            $documentRoot = $_SERVER['DOCUMENT_ROOT']."/MyHouseDecor";
            $documenttg = '/img/';
            $dirimg = $documenttg.basename($_FILES['file']['name']);

            if(move_uploaded_file($_FILES['file']['tmp_name'],$documentRoot.$dirimg)){
                $controller = new Update_CustomerController();
                $result = $controller->Update_Controller($customerid,$fullname,$username,$password,$email,$address,basename($_FILES['file']['name']),$phone,$date,$status);
                if($result){
                    header('Content-type: application/json');
                    echo json_encode(['check'=>true,'message'=>'Sửa công nhân viên!']);
                }else{
                    header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình sửa!']);
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