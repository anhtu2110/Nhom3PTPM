<?php
	//require_once 'Connect/connectDatabase.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/TestCNPM/Connect/connectDatabase.php';
	class DecorModel{
		private $db = null;

		public function __construct(){
			$this->db = new Database();
		}
		public function getDecor_FISRT(){
			$conn = $this->db->getConnection();
			$query = "SELECT * FROM decor WHERE Levels = 1 ORDER BY DecorOder";
			$result = $conn->query($query);
			$DecorItem1 = [];

			while($row = $result->fetch_assoc()){
				$DecorItem1[] = $row;			
			}
			return $DecorItem1;
		}

		public function getDecor_LAST(){
			$conn = $this->db->getConnection();
			$query = "SELECT * FROM decor WHERE Levels = 2 ORDER BY DecorOder";
			$result = $conn->query($query);
			$DecorItem2 = [];

			while ($row = $result->fetch_assoc()) {
				$DecorItem2[] = $row;
			}
			return $DecorItem2;
		}
	}

?>