<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/TestCNPM/Model/BlogModel.php';

	class BlogController{
		private $model = null;

		public function __construct(){
			$this->model =new BlogModel();
		}

		public function BlogController(){
			return $this->model->getBlogModel();
		}
	}

?>