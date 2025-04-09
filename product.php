<?php 
    session_start();
    require_once './Include/header.php';
    require_once './Include/menu_start.php';
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
    <!-- banner -->
    <div class="banner-product ">
      <img src="./img/1.png" alt="">
    </div>
    <hr>
   <div class="khoitao wow fadeInUp">
    <div class="container">
      <div class="giaohang">
        <div class="row">
          <div class="col-md-4 d-flex">
            <a href=""><i class="fa-solid fa-motorcycle"></i></a>
            <div class="title2 my-auto">
              <h4>Giao hàng nhanh chóng.</h4>
            <p>Dịch vụ giao hàng tận tâm - nhanh chóng và uy tín số 1 việt nam.</p>
            </div>
          </div>
          <div class="col-md-4 d-flex">
            <a href=""><i class="fa-solid fa-gift"></i></a>
            <div class="title2 my-auto">
              <h4>Khuyến mãi lớn </h4>
            <p>Đặt hàng dễ dàng - ngập tràn khuyến mãi.</p>
            </div>
          </div>
          <div class="col-md-4 d-flex">
            <a href=""><i class="fa-solid fa-headset"></i></a>
            <div class="title2 my-auto">
              <h4>Đội ngũ hỗ trợ nhanh chóng - tận tình</h4>
            <p>Liên hệ đội ngũ hỗ trợ để được kiểm tra nhanh chóng, tránh những sai
              lầm không đáng có.
            </p>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
   <hr>
    <?php
      require_once './View/ProductView.php';
    ?>
      <hr>

      <?php 
    require_once './Include/footer.php';
    ?>
<script src="./js/index.js"></script>

</html>