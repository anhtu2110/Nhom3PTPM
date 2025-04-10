<?php 
require_once './Model/IndexModel.php';
class Index_Controller{
    private $model = null;

    public function __construct()
    {
        $this->model = new Index_Model();
    }
    public function Display_New_Order(){
        return $this->model->ShowNew_Oder();
    }
    public function getTotal_Customer(){
        $result = $this->model->setAll_CountCustomer();
        return $result['total_Customer'];
    }
    public function soluong_status_Customer(){
        $result = $this->model->setStatus_Customer();
        return $result['check_online'];
    }
    public function Check_Online(){
        $total = $this->getTotal_Customer();
        $online = $this->soluong_status_Customer();
        $result = round(($online / $total) * 100, 2);
        return $result;
    }
    public function set_Sum_Money(){
        $result = $this->model->setSum_Money();
        $sum = 0;
        foreach($result as $kq){
            $sum += $kq;
        }
        return number_format($sum, 0, '.', '.');
    }
    public function Sum_Order(){
        $result = $this->model->ShowCount_Oder();
        return $result['sum_order'];
    }
    public function getTotal_Staff(){
        $result = $this->model->setAll_Count_Staff();
        return $result['total__Staff'];
    }
    public function soluong_status_Staff(){
        $result = $this->model->setStatus__Staff();
        return $result['check_online'];
    }
    public function Check_Onlines(){
        $total = $this->getTotal_Staff();
        $online = $this->soluong_status_Staff();
        $result = round(($online / $total) * 100, 2);
        return $result;
    }
    public function Show_NewLogin(){
        return $this->model->Show_NewLogin();
    }
    public function Show_NewContact(){
        return $this->model->Show_NewContact();
    }
}
?>