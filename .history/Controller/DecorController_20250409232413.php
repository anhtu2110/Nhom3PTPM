<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/DecorModel.php';
	class DecorController{
		private $model = null;

		public function __construct(){
			$this->model = new DecorModel();
		}
		public function DecorController_FISRT(){
			$result = $this->model->getDecor_FISRT();
			return $result;
		}
		public function DecorController_LAST(){
			$result = $this->model->getDecor_LAST();
			return $result;
		}
	}
?>