<?php
require_once '../Connect/connectDatabase.php';
class Profile_Model {
    private $db = null;

    public function __construct(){
        $this->db = new Database();
    }

    public function Show_ProfileStaff($UserID){
        $conn = $this->db->getConnection();
        $query = "SELECT * FROM user WHERE UserID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $UserID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function Update_Avatar($UserID,$Img){
        $conn = $this->db->getConnection();
        $query = "UPDATE user SET Image = ? WHERE UserID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $Img, $UserID);
        return $stmt->execute();
    }
    public function Update_Profile($UserID,$Title,$UserName,$Password,$Email,$Phone_Number,$Address){
        $conn = $this->db->getConnection();
        $query = "UPDATE user SET Title = ?, UserName = ?, Password = ?, Email = ?, Phone_Number = ?, Address = ? WHERE UserID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssi", $Title, $UserName, $Password, $Email, $Phone_Number, $Address, $UserID);
        return $stmt->execute();
    }
}
?>
