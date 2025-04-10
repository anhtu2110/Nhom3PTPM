<?php
session_start();
require_once './Controller/auth.php';
require_once './Include/header.php';
?>
<style>
  @media (max-width: 768px) {
    h1,h2,h3,h5,h4,h6 {
      font-size: 1.5rem; /* Giảm kích thước tiêu đề */
    }

    p {
      font-size: 1rem; /* Giảm kích thước đoạn văn */
    }

     button {
      font-size: 0.9rem; /* Giảm kích thước nút */
    }
  }

  @media (max-width: 576px) {
    h1,h2,h3,h5,h4,h6 {
      font-size: 1.2rem; /* Giảm thêm kích thước tiêu đề */
    }

    p {
      font-size: 0.8rem; /* Giảm thêm kích thước đoạn văn */
    }

    button {
      font-size: 0.7rem; /* Giảm thêm kích thước nút */
    }
  }
</style>
 <div class="done">
       <!-- menu order -->
     <?php require_once './Include/menu_start.php';?>
    <div class="banner customers">
        <img src="./img/banner_checkdon.jpg" alt="" class="w-100">
    </div>
    
   <?php require_once './View/CheckDonView.php';?>
  <?php 
    require_once './Include/footer.php';
    ?>
<script src="./js/checkdon.js"></script>
</html> 
