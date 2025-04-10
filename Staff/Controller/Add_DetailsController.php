<?php 
    require_once '../Model/Admin_DetailsModel.php';
    class Add_Details_Controller{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_DetailModel();
        }
        public function Add_Detail($Title,$description,$img,$oldprice,$price,$supplier,$quantity,$sold,$categoryID){
            return $this->model->Add_DetailModel($Title,$description,$img,$oldprice,$price,$supplier,$quantity,$sold,$categoryID);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $Title = $_POST['Title'];
        $description =  $_POST['Describes'];
        $oldprice = $_POST['OldPrice'];
        $price =  $_POST['Price'];
        $supplier =  $_POST['Supplier'];
        $quantity =  $_POST['Quantity'];
        $sold =  $_POST['Sold'];;
        $categoryID =  $_POST['CategoryID'];

        if(isset($_FILES['file'])){
            $documentRoot = $_SERVER['DOCUMENT_ROOT'];
            $dirtarget = '/img/';
            $img = $dirtarget.basename($_FILES['file']['name']);

            if(move_uploaded_file($_FILES['file']['tmp_name'],$documentRoot.$img)){
            $controller = new Add_Details_Controller();
            $result = $controller->Add_Detail($Title,$description,basename($_FILES['file']['name']),$oldprice,$price,$supplier,$quantity,$sold,$categoryID);
            if($result){
                header('Content-type: application/json');
                echo json_encode(['check'=>true,'message'=>'Thêm thành công sản phẩm vào cơ sở dữ liệu!']);
            }else{
                header('Content-type: application/json');
                echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình thêm!']);
            }
            }else{
                header('Content-type: application/json');
                echo json_encode(['check'=>false,'message'=>'Không có yêu cầu ảnh!']);
            }
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Không có yêu cầu POST!']);
        }
    }
    ?>