<?php 
    session_start();
    require_once './Include/header.php';
  ?>
  <style>
    .banner-regisn{
    height: 100vh;
}
.form-dangki{
    width: 80%;
    height: 80%;
    background-color: rgb(255, 255, 255);
    border-radius: 20px;
    position: absolute;
    top: 10%;
    left: 8.5%;
    z-index: 1;
}
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
   <div class="regisn-form">
    <div class="container-fluid p-0">
        <div class="banner">
            <img src="./img/banner-regisn.jpg" alt="" class="w-100 banner-regisn">
        </div>
        <div class="form-dangki">
            <div class="row p-5">
                <div class="col-md-6">
                    <img src="./img/banner-rg.png" alt="" class="w-100">
                </div>
                <div class="col-md-6">
                    <h4 class="text-center mb-2">Đăng Kí tài khoản với My House Decor</h4>
                    <?php 
                    require_once './View/RegisnView.php';?>
                </div>
            </div>
        </div>
    </div>
   </div>
   <?php 
   require_once './Include/footer.php';
   ?>
<script src="./js/index.js"></script>
</html> 
