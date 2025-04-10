<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/DetailModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/CommentModel.php';
class DetailController
{
	private $model = null;
	private $cmt = null;

	public function __construct()
	{
		$this->model = new DetailModel();
		$this->cmt = new CommentModel();
	}
	public function getDetailController($ProductID)
	{
		$result = $this->model->getDetailModel($ProductID);
		return $result;
	}
	public function getSum($ProductID)
	{
		$result = $this->cmt->setSum($ProductID);
		return $result;
	}
	public function getComment($ProductID)
	{
		$result = $this->cmt->showTotalComment($ProductID);
		return $result;
	}
	public function Star($ProductID)
	{
		$Sumstar = $this->getSum($ProductID);
		$result1 = $Sumstar->fetch_assoc();
		$totalStars = isset($result1['Sum']) ? $result1['Sum'] : 0;
	
		$Count = $this->getComment($ProductID);
		$result2 = $Count->fetch_assoc();
		$totalComments = isset($result2['Total']) ? $result2['Total'] : 0;
	
		if ($totalComments == 0) {
			return 0;
		}
	
		$number = $totalStars / $totalComments;
		$rounded_number = round($number, 1); 
		$int_num = floor($rounded_number);
		$float_num = $rounded_number - $int_num;
	
		if ($float_num < 0.25) {
			$float_num = 0;
		} elseif ($float_num >= 0.25 && $float_num < 0.75) {
			$float_num = 0.5;
		} else {
			$float_num = 1;
		}
	
		return $int_num + $float_num;
	}
	

}
?>