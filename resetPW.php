<?php 
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
    <div class="banner login-img">
        <img src="./img/login.jpg" alt="" >
    </div>
    <div class="login-form">
        <div class="container">
            <div class="row d-flex justify-content-center ">
                <div class="m199">
                  <h3 class="text-center mt-5 login-title">Lấy lại mật khẩu đăng nhập</h3>
                  <div class="container">
                    <div class="row d-flex justify-content-center ">
                        <?php require_once './View/ResetPassword_CheckMailView.php';?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    require_once './Include/footer.php';
    ?>
<script src="./js/main.js"></script>

</html> 
