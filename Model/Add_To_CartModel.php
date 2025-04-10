<?php
    require_once $_SERVER['DOCUMENT_ROOT'] .'/Nhom3PTPM/Connect/connectDatabase.php';
    class Cart_Model{
        private $db = null;

        public function __construct(){
            $this->db = new Database();
        }
        public function check_product_exist_with_UserID($UserID, $ProductID) {
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM orders WHERE UserID = '$UserID' AND ProductID = '$ProductID'";
            $result = $conn->query($query);
            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return true;
            }
            return false;
        }
        public function check_product_exist_to_add_order($UserID, $ProductID) {
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM orders WHERE UserID = '$UserID' AND ProductID = '$ProductID' AND status IS NULL";
            $result = $conn->query($query);
            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['Quantity'];
            }
            return 0;
        }
        public function check_product_exist_to_new_order($UserID, $ProductID) {
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM orders WHERE UserID = '$UserID' AND ProductID = '$ProductID' AND status IN ('1', '2', '3','4', '5', '6', '7')";
            $result = $conn->query($query);
            if($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return true;
            }
            return false;
        }
        public function get_quantity_product_exist($UserID, $ProductID) {
            $conn = $this->db->getConnection();
            // Thoát các biến đầu vào để tránh SQL Injection
            $UserID = mysqli_real_escape_string($conn, $UserID);
            $ProductID = mysqli_real_escape_string($conn, $ProductID);

            // Tạo câu lệnh SQL
            $query = "SELECT Quantity FROM orders WHERE UserID = '$UserID' AND ProductID = '$ProductID'";
            $result = $conn->query($query);

            // Kiểm tra kết quả truy vấn
            if ($result && $result->num_rows > 0) {
                 $row = $result->fetch_assoc();
                return $row['Quantity'];
            } else {
                return 0;
            }
        }
        public function Show_CartModel($UserID){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM orders INNER JOIN products ON products.ProductID = orders.ProductID WHERE UserID = '$UserID' AND status IS NULL";
            $result = $conn->query($query);
            return $result;
        }
        public function Save_Tmp_Order($Title, $ProductID, $UserID, $username, $price, $quantity, $total_price){
            $conn = $this->db->getConnection();
            $query = "INSERT INTO orders (Title,ProductID,UserID,UserCustomer,Price,Quantity,Total_Price) VALUES ('$Title', '$ProductID', '$UserID', '$username','$price','$quantity','$total_price')";
            $result = $conn->query($query);
            return $result;
        }
        public function Delete_Tmp_Order($OrderID) {
            $conn = $this->db->getConnection();
            $query = "DELETE FROM orders WHERE OrderID = '$OrderID'";
            $result = $conn->query($query);
            return $result;
        }
        public function Delete_Tmp_Product_Status_Null($ProductID, $userID){
            $conn = $this->db->getConnection();
            $query = "DELETE FROM orders WHERE ProductID = $ProductID AND UserID = $userID AND status IS NULL";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Quantity_Product_Exist($UserID, $ProductID, $quantity, $total_price) {
            $conn = $this->db->getConnection();
            // Thoát các biến đầu vào để tránh SQL Injection
            $UserID = mysqli_real_escape_string($conn, $UserID);
            $ProductID = mysqli_real_escape_string($conn, $ProductID);

            // Tạo câu lệnh SQL
            $query = "UPDATE orders SET Quantity = '$quantity', Total_price = '$total_price' WHERE UserID = '$UserID' AND ProductID = '$ProductID'";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Quantity_Product_Exist_Status_Null($UserID, $ProductID, $quantity, $total_price) {
            $conn = $this->db->getConnection();
            // Thoát các biến đầu vào để tránh SQL Injection
            $UserID = mysqli_real_escape_string($conn, $UserID);
            $ProductID = mysqli_real_escape_string($conn, $ProductID);

            // Tạo câu lệnh SQL
            $query = "UPDATE orders SET Quantity = '$quantity', Total_price = '$total_price' WHERE UserID = '$UserID' AND ProductID = '$ProductID' AND status IS NULL";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Tmp_Order_Chuyen($ProductID,$quantity,$username,$total_price){
            $conn = $this->db->getConnection();
            $query = "UPDATE orders SET Quantity = $quantity,
            UserCustomer = '$username',
            Total_Price = $total_price,
            Status = 1
             WHERE ProductID = $ProductID";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Tmp_Order_User_id($ProductID,$quantity,$username,$total_price){
            $conn = $this->db->getConnection();
            $query = "UPDATE orders SET Quantity = $quantity,
            UserCustomer = '$username',
            Total_Price = $total_price,
            Status = 1
             WHERE ProductID = $ProductID";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Quantity_SoldDetail($quantity,$IDDetail){
            $conn = $this->db->getConnection();
            $query = "UPDATE details SET Quantity = Quantity - $quantity,
            Sold = Sold + $quantity
             WHERE IDDetail = $IDDetail";
            $result = $conn->query($query);
            return $result;
        }

        public function Get_Total_Price($UserID) {
            $conn = $this->db->getConnection();
            // Thoát các biến đầu vào để tránh SQL Injection
            $UserID = mysqli_real_escape_string($conn, $UserID);

            // Tạo câu lệnh SQL
            $query = "SELECT SUM(Total_price) AS Total_price FROM orders WHERE UserID = '$UserID'";
            $result = $conn->query($query);

            // Kiểm tra kết quả truy vấn
            if ($result && $result->num_rows > 0) {
                 $row = $result->fetch_assoc();
                return $row['Total_price'];
            } else {
                return 0;
            }
        }
        public function Get_Total_Price_Product_Status_Null($UserID) {
            $conn = $this->db->getConnection();
            // Thoát các biến đầu vào để tránh SQL Injection
            $UserID = mysqli_real_escape_string($conn, $UserID);

            // Tạo câu lệnh SQL
            $query = "SELECT SUM(Total_Price) AS Total_Price FROM orders WHERE UserID = '$UserID' AND status IS NULL";
            $result = $conn->query($query);

            // Kiểm tra kết quả truy vấn
            if ($result && $result->num_rows > 0) {
                 $row = $result->fetch_assoc();
                return $row['Total_Price'];
            } else {
                return 0;
            }
        }
    }
?>