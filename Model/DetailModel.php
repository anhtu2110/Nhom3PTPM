<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Connect/connectDatabase.php';
	class DetailModel{
		private $db = null;

		public function __construct(){
			$this->db = new Database();
		}

		public function getDetailModel($ProductID){
			$conn = $this->db->getConnection();
			$query = "SELECT details.*, category.title AS category_title,products.ProductID FROM details INNER JOIN
			 category ON category.CategoryID = details.CategoryID INNER JOIN products ON products.IDDetail =  details.IDDetail
			 WHERE details.IDDetail = $ProductID";

			$result = $conn->query($query);
			$DetailItem =[];

			while($row = $result->fetch_assoc()){
				$DetailItem[]= $row;
				
				} 
				return $DetailItem;
		}
		
	}
?>