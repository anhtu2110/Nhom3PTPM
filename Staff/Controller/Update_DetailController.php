<?php
    require_once '../Model/Admin_DetailsModel.php';
    require_once '../Model/Admin_ProductModel.php';
    class Admin_DetailController{
        private $model = null;
        private $product = null;
        public function __construct()
        {
            $this->model = new Admin_DetailModel();
            $this->product = new Admin_ProductModel();
        }
        public function Update_Detail($DetailID,$Title,$description,$img,$oldprice,$price,$supplier,$quantity,$sold,$categoryID){
            $result = $this->model->Update_Detail($DetailID,$Title,$description,$img,$oldprice,$price,$supplier,$quantity,$sold,$categoryID);
            return $result;
        }
        public function Update_ProductByDetail($Title,$Image,$OldPrice,$Price,$IDDetail){
            return $this->product->Update_ProductByDetail($Title,$Image,$OldPrice,$Price,$IDDetail);
        }
    }
        
        if(isset($_SERVER['REQUEST_METHOD'])&& $_SERVER['REQUEST_METHOD'] == 'POST'){
            $DetailID = $_POST['DetailID'];
        $Title = $_POST['title'];
        $description = $_POST['description'];
        $oldprice = $_POST['oldPrice'];
        $price = $_POST['currentPrice'];
        $supplier = $_POST['supplier'];
        $quantity = $_POST['quantity'];
        $sold = $_POST['sold'];
        $categoryID = $_POST['categoryID'];
    
            if(isset($_FILES['image'])){
                
                $documentRoot = $_SERVER['DOCUMENT_ROOT'];
                $documenttg = '/img/';
                $dirimg = $documenttg.basename($_FILES['image']['name']);
    
                if(move_uploaded_file($_FILES['image']['tmp_name'],$documentRoot.$dirimg)){
                    $controller = new Admin_DetailController();
                    $results = $controller->Update_Detail($DetailID,$Title,$description,"img/".basename($_FILES['image']['name']),$oldprice,$price,$supplier,$quantity,$sold,$categoryID);
                    $result = $controller->Update_ProductByDetail($Title,"img/".basename($_FILES['image']['name']),$oldprice,$price,$DetailID);
                    if($results && $result){
                        header('Content-type: application/json');
                        echo json_encode(['check'=>true,'message'=>'Sửa thành công Sản Phẩm!']);
                    }else{
                        header('Content-type: application/json');
                        echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình sửa!']);
                    }
                }
            }else{
                $img = $_POST['image'];
                $controller = new Admin_DetailController();
                $resultn = $controller->Update_Detail($DetailID,$Title,$description,$img,$oldprice,$price,$supplier,$quantity,$sold,$categoryID);
                    $resultns = $controller->Update_ProductByDetail($Title,$img,$oldprice,$price,$DetailID);
                    if($resultns && $resultn){
                        header('Content-type: application/json');
                        echo json_encode(['check'=>true,'message'=>'Sửa thành công Sản Phẩm!']);
                    }else{
                        header('Content-type: application/json');
                        echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình sửa!']);
                    }
            }
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Không có yêu cầu POST!']);
        }


?>