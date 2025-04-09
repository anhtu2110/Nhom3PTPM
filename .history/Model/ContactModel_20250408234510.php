<?php 
    //require_once '../Connect/connectDatabase.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/TestCNPM/Connect/connectDatabase.php';
    class ContactModel{
        private $db = null;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function SaveData($fullname,$email,$title,$content,$date){
            $conn = $this->db->getConnection();
            $sql = "INSERT INTO contact (Fullname,Title,Email,CreateDay,Message,Status) 
            VALUES ('$fullname','$title','$email','$date','$content',2)";

            if($conn->query($sql) === TRUE ){
                $_SESSION['success_message'] = "Thành Công! Cảm ơn bạn đã gửi yêu cầu, chúng tôi sẽ liên hệ lại cho bạn trong thời gian sớm nhất!";
            }else{
                $_SESSION['error_message'] = "Có lỗi xảy ra khi lưu dữ liệu. Vui lòng thử lại sau.";
            }
            $conn->close();
        }
    }
?>