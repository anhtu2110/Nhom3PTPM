<?php
	//require_once './Connect/connectDatabase.php';
	require_once __DIR__ . '/../Connect/connectDatabase.php';
	class ProductModel{
		private $db = null;

		public function __construct(){
			$this->db = new Database();
		}
		public function getProductModel(){
			$conn = $this->db->getConnection();
			$query = "SELECT * FROM products";
			$result = $conn->query($query);
			$ProductItem = [];

			while($row = $result->fetch_assoc()){
				$ProductItem[] = $row;
			}
			return $ProductItem;
		}
	}
?>