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

        <div class="banner decor-banner">
        </div>
    
        <!-- 01 -->
       <div class="lop01">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">
                    <img src="./img/hotdecor-01.webp" alt="" class="w-100">
                    <div class="content-decor text-white wow zoomIn">
                      <h5 class="chuluon">Góc cảm hứng...</h5>
                      <h1>Ý tưởng không gian sống</h1>
                      <p>Cùng My House Decor khám phá...</p>
                    </div>
                </div>
                <div class="col-md-3">
                  <img src="./img/hotdecor-02.webp" alt="">
                  <br>
                  <img src="./img/hotdecor-02.webp" alt="">
                </div>
            </div>
        </div>
       </div>
       <hr>
        <!-- 02 -->
        <?php
        require_once './View/DecorView.php';
        ?>

              <?php 
    require_once './Include/footer.php';
    ?>
          <script src="./js/index.js"></script>
 
    </html>