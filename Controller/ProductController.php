<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/TestCNPM/Model/ProductModel.php';

	class ProductController{
		private $model = null;

	public function __construct(){
		$this->model = new ProductModel();
	}

	public function getProductController(){
		return $this->model->getProductModel();
	}
	}
?>