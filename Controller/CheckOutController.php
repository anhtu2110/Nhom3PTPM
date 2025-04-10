<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/CheckOutModel.php';
    class CheckOut_controller{
        private $model = null;

        public function __construct(){
            $this->model = new Save_Information();
        }
        public function Save_Information($UserID,$Information){
            return $this->model->Save_Information($UserID,$Information);
        }
        public function Show_Tinh(){
            return $this->model->Show_Tinh();
        }
        public function Show_Huyen($id){
            return $this->model->Show_Huyen($id);
        }
        public function Show_Xa($id){
            return $this->model->Show_Xa($id);
        }
        public function Update_Information_With_OrderID($OrderID, $UserID, $Information) {
            return $this->model->Update_Information_With_OrderID($OrderID, $UserID, $Information);
        }
    }

    if(isset($_POST['provinceId'])){
        $controller = new CheckOut_controller();
        $result = $controller->Show_Huyen($_POST['provinceId']);
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        echo json_encode($data);
    }elseif (isset($_POST['districtId'])) {
        $controller = new CheckOut_controller();
        $districtId = $_POST['districtId'];
        $result = $controller->Show_Xa($districtId);
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        echo json_encode($data);
    }elseif(isset($_POST['UserID']) && isset($_POST['Information'])){
        $Information = $_POST['Information'];
        $controller = new CheckOut_controller();
        if(!empty($_POST['OrderID'])) {
            $OrderID = $_POST['OrderID'];
            $result = $controller->Update_Information_With_OrderID($OrderID, $_POST['UserID'], $Information);
        } else {
            $result = $controller->Save_Information($_POST['UserID'],$Information);
        }
        if (!empty($_POST['OrderID'])) {
            if($result){
                echo json_encode(['check' => true, 'update' => true]);
            }else{
                echo json_encode(['check' => false]);
            }
        } else {
            if($result){
                echo json_encode(['check' => true, 'save' => true]);
            }else{
                echo json_encode(['check' => false]);
            }
        }
        
    }

?>