<?php 
    session_start();
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
                        <?php
                        require_once './View/New_PasswordView.php';
                        ?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</body> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
 new WOW().init();
</script>
<script></script>
</html> 
