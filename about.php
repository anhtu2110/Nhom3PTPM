  <?php 
  session_start();
    require_once './Include/header.php';
    require_once './Include/menu_start.php';
  ?>
  <style>
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

    p {
        font-size: 0.8rem;
        /* Giảm thêm kích thước đoạn văn */
    }

    button {
        font-size: 0.7rem;
        /* Giảm thêm kích thước nút */
    }
}
  </style>
  <div class="banner ">
      <img src="/img/abount-us.jpg" alt="" class="w-100 h-auto">
  </div>
  <!-- <hr> -->

  <div class="content-about" id="content-about" style="padding-top: 55px">
      <div class="container">
          <div class="container">
              <div class="admin wow zoomIn">
                  <h1 class="text-center">Đội ngũ Admin của chúng tôi</h1>
                  <hr>
              </div>
          </div>
          <div class="row wow fadeInUp">
              <div class="col-md-4">
                  <div class="about-item ">
                      <img src="./img/cmt-4.jpg" alt="" class="">
                      <div class="bestcontent text-center">
                          <h1>Dương Tuấn Đạt</h1>
                          <p>"Bạn đã bao giờ mơ ước biến căn nhà của mình thành một không gian
                              sống mơ ước chưa? Tại MyHouse Decor,
                              chúng tôi không chỉ cung cấp các sản phẩm nội thất đẳng cấp mà
                              còn là nguồn cảm hứng để bạn tạo ra không gian độc đáo và phản
                              ánh cá nhân.
                          </p>

                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="about-item ">
                      <img src="./img/cmt-7.jpg" alt="" class="">
                      <div class="bestcontent text-center">
                          <h1>Đoàn Văn Hào</h1>
                          <p>"Bạn đã bao giờ mơ ước biến căn nhà của mình thành một không gian
                              sống mơ ước chưa? Tại MyHouse Decor,
                              chúng tôi không chỉ cung cấp các sản phẩm nội thất đẳng cấp mà
                              còn là nguồn cảm hứng để bạn tạo ra không gian độc đáo và phản
                              ánh cá nhân.
                          </p>

                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="about-item ">
                      <img src="./img/cmt-11.jpg" alt="" class="">
                      <div class="bestcontent text-center">
                          <h1>Đinh Phú Quang</h1>
                          <p>"Bạn đã bao giờ mơ ước biến căn nhà của mình thành một không gian
                              sống mơ ước chưa? Tại MyHouse Decor,
                              chúng tôi không chỉ cung cấp các sản phẩm nội thất đẳng cấp mà
                              còn là nguồn cảm hứng để bạn tạo ra không gian độc đáo và phản
                              ánh cá nhân.
                          </p>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <hr>
  <div class="blog-about">
      <div class="container">
          <div class="row">
              <div class="col-md-9 wow fadeInUp">
                  <h3 class="text-center">Trần Văn Huy (CEO)</h3>
                  <h6 class="text-info">Giới thiệu về Admin Trần Văn Huy :</h6>
                  <p>Trần Văn Huy, một cá nhân đam mê với lĩnh vực trang trí và decor nhà cửa, đã gắn bó với
                      My House Decor từ những ngày đầu tiên của sự ra đời của trang web này. Với sự tận tụy,
                      kiến thức sâu sắc và kinh nghiệm thực tế, Trần Văn Huy đã đóng góp không nhỏ vào sự phát
                      triển và thành công của My House Decor trong lĩnh vực trang trí nội thất.</p>
                  <h6 class="text-info">Kinh nghiệm và Kiến thức:</h6>
                  <p>Trần Văn Huy đã tích luỹ được một lượng kiến thức đáng kể trong lĩnh vực decor nhà cửa
                      qua nhiều năm làm việc. Với bề dày kinh nghiệm, anh đã tham gia và thực hiện nhiều dự án
                      decor cho các căn hộ, biệt thự, cũng như các không gian thương mại. Sự hiểu biết sâu sắc
                      về các phong cách trang trí, vật liệu và công nghệ mới nhất đã giúp anh xây dựng những
                      không gian sống độc đáo và đáng sống.</p>
                  <h6 class="text-info">Cam kết và Tầm nhìn :</h6>
                  <p>Với tinh thần sáng tạo và cam kết tới sự hoàn hảo, Trần Văn Huy luôn đặt mục tiêu cao trong mọi
                      dự án mà anh thực hiện. Sứ mệnh của anh là tạo ra những không gian sống ấm áp, tinh tế và phản ánh
                      cá nhân của mỗi chủ nhân. Sự tận tụy và sự chuyên nghiệp của anh đã mang lại niềm tin và sự hài
                      lòng từ khách hàng.</p>
              </div>
              <div class="col-md-3 wow zoomIn">
                  <img src="./img/cmt-13.jpg" alt="" class="w-100">
              </div>
          </div>
      </div>
  </div>
  <hr>
  <div class="nhanvien wow zoomIn">
      <div class="container">
          <h1 class="text-center">Đội ngũ nhân viên của chúng tôi</h1>
          <p class="text-center">Với mỗi dự án, nhân viên của My House Decor đều đặt
              ra một tiêu chuẩn cao về chất lượng và sự tinh tế. Họ không chỉ đơn thuần
              là những nhà thiết kế, mà còn là những người nắm vững các xu hướng mới nhất
              và sử dụng công nghệ tiên tiến để tạo ra những không gian sống độc đáo và đẳng cấp</p>
          <hr>
          <div class="row justify-content-center wow fadeInUp">
              <!-- <div class="col-md-2">
          <img src="./img/cmt-4.jpg" alt="">
         <div class="contents text-center">
          <h4>Nguyen Linh Chi</h4>
          <p>Chuc vu</p>
         </div>
        </div> -->
              <div>
                  <div class="owl-carousel">
                      <div>
                          <img src="./img/item-nv02.jpg" alt="">
                          <div class="contents text-center">
                              <h4>Nguyen Linh Chi</h4>
                              <p>Chuc vu</p>
                          </div>
                      </div>
                      <div>
                          <img src="./img/item-nv03.jpg" alt="">
                          <div class="contents text-center">
                              <h4>Nguyen Linh Chi</h4>
                              <p>Chuc vu</p>
                          </div>
                      </div>
                      <div>
                          <img src="./img/item-nv04.jpg" alt="">
                          <div class="contents text-center">
                              <h4>Nguyen Linh Chi</h4>
                              <p>Chuc vu</p>
                          </div>
                      </div>
                      <div>
                          <img src="./img/item-nv07.jpg" alt="">
                          <div class="contents text-center">
                              <h4>Nguyen Linh Chi</h4>
                              <p>Chuc vu</p>
                          </div>
                      </div>
                      <div>
                          <img src="./img/item-nv08.jpg" alt="">
                          <div class="contents text-center">
                              <h4>Nguyen Linh Chi</h4>
                              <p>Chuc vu</p>
                          </div>
                      </div>
                      <div>
                          <img src="./img/item-nv09.jpg" alt="">
                          <div class="contents text-center">
                              <h4>Nguyen Linh Chi</h4>
                              <p>Chuc vu</p>
                          </div>
                      </div>
                      <div>
                          <img src="./img/cmt-10.jpg" alt="">
                          <div class="contents text-center">
                              <h4>Nguyen Linh Chi</h4>
                              <p>Chuc vu</p>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>

  <hr>

  <?php 
    require_once './Include/footer.php';
    ?>
  <script src="./js/about.js"></script>


  </html>