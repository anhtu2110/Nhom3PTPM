<?php 
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
    require_once './Include/header.php';
   require_once './Include/menu_start.php';
  ?>
<style>
#map {
    width: 90%;
    height: 456px;
}

.banner-link img {
    border: none;
    padding: 0;
    filter: brightness(70%);
}

.banner-link {
    position: relative;
    text-align: center;
    color: white;
}

.banner-link img {
    filter: brightness(60%);
    width: 100%;
    height: auto;
}

.banner-link .overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.banner-link h4,
.banner-link p,
.banner-link button {
    margin: 0.5rem 0;
}

.banner-link h4 {
    font-size: 2rem;
    font-weight: bold;
}

.banner-link p {
    font-size: 1.2rem;
}

@media (max-width: 768px) {

    h1,
    h2,
    h3,
    h5,
    h4,
    h6 {
        font-size: 1.5rem;
        /* Giảm kích thước tiêu đề */
    }


    p {
        font-size: 1rem;
        /* Giảm kích thước đoạn văn */
    }

    button {
        font-size: 0.9rem;
        /* Giảm kích thước nút */
    }
}

@media (max-width: 576px) {

    h1,
    h2,
    h3,
    h5,
    h4,
    h6 {
        font-size: 1.2rem;
        /* Giảm thêm kích thước tiêu đề */
    }

    .newproduct img {
        max-width: 50%;
    }

    p {
        font-size: 0.8rem;
        /* Giảm thêm kích thước đoạn văn */
    }

    button {
        font-size: 0.7rem;
        /* Giảm thêm kích thước nút */
    }
}

@media (max-width: 768px) {
    .banner-link h4 {
        font-size: 1.5rem;
        /* Giảm kích thước tiêu đề */
    }

    .banner-link p {
        font-size: 1rem;
        /* Giảm kích thước đoạn văn */
    }

    .banner-link button {
        font-size: 0.9rem;
        /* Giảm kích thước nút */
    }
}

@media (max-width: 576px) {
    .banner-link h4 {
        font-size: 1.2rem;
        /* Giảm thêm kích thước tiêu đề */
    }

    .banner-link p {
        font-size: 0.8rem;
    }

    .banner-link button {
        font-size: 0.7rem;
    }
}

#btn_chuyenproduct {
    border-radius: 0px;
    background-color: white;
    color: black;
    font-weight: bold;
    border: none;
    text-transform: uppercase;
}

#btn_chuyenproduct:hover {
    background-color: #cccccc;
    color: black;
    border: solid 1px white;
}

.banner-link2 img {
    border: none;
}

.banner_link2 {
    height: 310px;
}

.hover-zooms {
    transition: transform 0.3s ease;
}

.banner_link2 img {
    width: 100%;
    height: auto;
    object-fit: cover;
    filter: brightness(60%);
}

.banner_link3 img {
    filter: brightness(60%);

}

.banner_link2 img:hover {
    filter: brightness(100%);
    transform: scale(1.029);
}

.banner_link3 img:hover {
    filter: brightness(100%);
    transform: scale(1.029);
}

.banner_link0 img {
    filter: brightness(60%);
}

.banner_link0 img:hover {
    filter: brightness(100%);
    transform: scale(1.005);
}

.absut {
    position: relative;
}

.can_giua {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 1.5rem;
    font-weight: bold;
}

.banner img {
    border: none;
    filter: brightness(80%);
}

.btn_seller {
    background-color: black;
    color: white;
}

.besller_hover {
    transition: border 0.3s ease-in-out;
    margin: auto;
}

.besller_hover:hover {
    border: solid 1px #bbbbbb;
}

.btn_click {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
    width: 100%;
}

.besller_hover:hover .btn_click {
    opacity: 1;
    visibility: visible;
}

.chuyenhtml {
    border-radius: 0px;
}

.img_xinhh {
    border-radius: 0px 20px 0px 0px;
}
</style>
<!-- banner -->
<div class="banner">
    <div class="container-fluid">
        <div id="demo" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/banner1.png" alt="Los Angeles" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/banner2.jpg" alt="Chicago" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/banner3.jpg" alt="New York" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/banner4.jpg" alt="New York" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="img/banner5.jpg" alt="New York" class="d-block w-100">
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</div>

<br>
<div class="banner-link">
    <div class="container-fluid p-0">
        <img src="img/ghe-thu-gian-jula-ma-17-7840.jpg" alt="Ghế thư giãn">
        <div class="overlay">
            <h4>GHẾ THƯ GIẢN SOFA JPG003</h4>
            <p class="text-warning">Chất lượng hoàn hảo đến từ Mỹ, bảo hành trọn đời Ghế...</p>
            <button class="btn btn-outline-secondary" id="btn_chuyenproduct"
                onclick="window.location.href='product.php'">Xem chi tiết</button>
        </div>
    </div>
</div>
<br>

<div class="banner-link2 p-0 m-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 absut banner_link0">
                <img src="img/soffa-banne-link.jpg" class="w-100 hover-zooms" alt="">
                <h4 class="can_giua">SOFA</h4>
            </div>
            <div class="col-md-4 banner_link2 d-flex">
                <div class="row">
                    <div class="col-md-6 absut">
                        <img src="img/banner-link2.jpg" class="w-100 hover-zooms" alt="">
                        <h4 class="can_giua">BÌNH HOA</h4>
                    </div>
                    <div class="col-md-6 absut">
                        <img src="img/banner-link3.jpg" class="w-100 hover-zooms" alt="">
                        <h4 class="can_giua">HOA</h4>
                    </div>
                    <div class="col-md-6 absut mt-4">
                        <img src="img/banner-link4.jpg" class="w-100 hover-zooms" alt="">
                        <h4 class="can_giua">LỊCH</h4>
                    </div>
                    <div class="col-md-6 absut mt-4">
                        <img src="img/banner-link5.jpg" class="w-100 hover-zooms" alt="">
                        <h4 class="can_giua">GIƯỜNG</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2 banner_link3">
                <div class="row">
                    <div class="col-md-12 absut">
                        <img src="img/banner-link7.jpg" class="w-100 hover-zoom" alt="">
                        <h4 class="can_giua">DECOR</h4>
                    </div>
                    <div class="col-md-12 absut mt-4">
                        <img src="img/banner-link8.jpg" class="w-100 hover-zoom" alt="">
                        <h4 class="can_giua">GHẾ</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- sample -->
<div class="sample" id="hotdecor">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="demo2" class="carousel slide " data-bs-ride="carousel">

                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner wow zoomIn">
                        <div class="carousel-item active">
                            <img src="./img/blog-1.jpg" alt="Los Angeles" class="d-block w-100 hover-zoom">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/blog-2.jpg" alt="Chicago" class="d-block w-100 hover-zoom">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/blog-3.jpg" alt="New York" class="d-block w-100 hover-zoom">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5 wow zoomIn">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="thietke">
                        <h1 id="hmm ">Một số mẫu nội thất do My House Decor thực hiện</h1>
                        <p class="m4 text-info">Với hơn 24 năm kinh nghiệm trong lĩnh vực hoàn thiện nội thất,
                            My House Decor cung cấp các giải pháp toàn diện bao gồm thiết kế,
                            trang trí và cung cấp nội thất trọn gói. Sở hữu tính chuyên nghiệp
                            đội ngũ và hệ thống 10 cửa hàng, My House Decor là sự lựa chọn cho
                            một không gian sang trọng và hiện đại.</p>
                        <button class="btn btn-light chuyenhtml">Xem Thêm</button>
                    </div>

                </div>

            </div>

        </div>
        <hr>
    </div>
</div>
<!-- check -->
<!-- <div class="check wow zoomIn">
          <div class="container">
            <div class="row">
              <div class="col-md-6 hover-container">
                  <img src="img/banner-2.jpg" alt="">
                  <h2 class="mx-auto my-auto">Không gian phòng khách</h2>
                  <p class="my-auto">Phòng khách là không gian chính của ngôi nhà, là nơi sum họp gia đình.
                      Phân chia không gian phòng khách thành các khu vực nhỏ hơn và sắp xếp đồ 
                      nội thất theo nhóm. Ví dụ, bạn có thể sắp xếp các ghế sofa và bàn trà thành 
                      một khu vực để trò chuyện, còn khu vực khác có thể làm nơi đọc sách hoặc xem 
                      TV.
                  </p>
              </div>
              <div class="col-md-6 hover-container">
                  <img class="full-img" src="./img/duoi.jpg" alt="">
              </div>
          </div>
          
          </div>
          <hr>
      </div> -->
<!-- show product -->

<div class="newProduct" id="newproduct">

    <div class="container">
        <div class="title wow zoomIn">
            <h2>Một số sản phẩm hot - bán chạy của chúng tôi</h2>
            <p class="text-info">"Khám phá bộ sưu tập nội thất bán chạy của chúng tôi
                - từ những bộ sofa sang trọng đến bàn ăn đẹp mắt và
                đèn trang trí phong cách. Sản phẩm nội thất bán chạy
                của chúng tôi không chỉ là sự kết hợp hoàn hảo giữa
                chất lượng và thiết kế tinh tế, mà còn là biểu tượng
                của sự sang trọng và phong cách trong không gian sống
                của bạn. Duyệt qua các sản phẩm nổi bật của chúng tôi
                ngay hôm nay và biến ước mơ về một không gian sống
                lý tưởng thành hiện thực!"</p>
        </div>
        <br>
        <?php 
          require_once './View/BestSellerView.php';
        ?>
    </div>
</div>
<hr>
<!-- contact -->
<div class="contact" id="contact">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="imgct wow zoomIn">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2370086037586!2d105.79821987476805!3d20.983134489345026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc3e1f657e1%3A0x77feb691d107c5f!2zMTExIFAuIFRyaeG7gXUgS2jDumMsIFTDom4gVHJp4buBdSwgVGhhbmggVHLDrCwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1720591085597!5m2!1svi!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <?php
          require_once './View/formContact.php';
          ?>
        </div>
    </div>
</div>
<hr>
<!-- blog -->
<div class="blog" style="background-color: #EEEEEE;">
    <div class="container">
        <div class="title wow fadeInUp">
            <h2>CHUYỆN NHÀ MY HOUSE DECOR</h2>


            <p class="text-info">"Khám phá bộ sưu tập nội thất bán chạy của chúng tôi
                - từ những bộ sofa sang trọng đến bàn ăn đẹp mắt và
                đèn trang trí phong cách. Sản phẩm nội thất bán chạy
                của chúng tôi không chỉ là sự kết hợp hoàn hảo giữa
                chất lượng và thiết kế tinh tế, mà còn là biểu tượng
                của sự sang trọng và phong cách trong không gian sống
                của bạn. Duyệt qua các sản phẩm nổi bật của chúng tôi
                ngay hôm nay và biến ước mơ về một không gian sống
                lý tưởng thành hiện thực!"</p>
        </div>
        <br>
        <?php require_once './View/BlogView.php';?>

        <a href="blog.php" class="text-end">Xem tất cả tin tức</a>
        <hr>
    </div>
</div>


<?php 
    require_once './Include/footer.php';
    ?>
<script src="./js/index.js"></script>
<!-- <script>
      var map = L.map('map').setView([18.6666, 105.6731], 15);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
      }).addTo(map);

      var marker = L.marker([18.6666, 105.6731]).addTo(map)
        .bindPopup('Đại học Vinh, Nghệ An, Việt Nam')
        .openPopup();
    </script> -->

</html>