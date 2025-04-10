<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/ProfileModel.php';
    class Update_Information{
        private $model = null;
        public function __construct()
        {
            $this->model = new Profile_Model();
        }
        public function Update_Information($UserID,$Title,$UserName,$Password,$Email,$Phone_Number,$Address){
            $result = $this->model->Update_Information($UserID,$Title,$UserName,$Password,$Email,$Phone_Number,$Address);
            return $result;
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $userID = $_POST['UserID'];
        $title = $_POST['title'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $controller = new Update_Information();
        $result = $controller->Update_Information($userID,$title,$username,$password,$email,$phone_number,$address);
        if($result){
            header('Content-type: application/json');
            echo json_encode(['check'=>true,'message'=>'Cập nhật thông tin cá nhân thành công!']);
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Có lỗi xảy ra trong quá trình cập nhật thông tin cá nhân!']);
        }
    }
?>