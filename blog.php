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
   <div class="banner">
    <div class="container-fluid blog-banner">
        <img src="./img/banner_blog.jpg" alt="" class= "w-100">
    </div>
   </div>
   <br>
        <div class="blog">
            <div class="container">
              <div class="title wow zoomIn">
                <h2 >Tin tức - Sự kiện</h2>
               
      
                <p class="text-info wow zoomIn">"Khám phá bộ sưu tập nội thất bán chạy của chúng tôi
                   - từ những bộ sofa sang trọng đến bàn ăn đẹp mắt và 
                   đèn trang trí phong cách. Sản phẩm nội thất bán chạy 
                   của chúng tôi không chỉ là sự kết hợp hoàn hảo giữa 
                   chất lượng và thiết kế tinh tế, mà còn là biểu tượng 
                   của sự sang trọng và phong cách trong không gian sống
                    của bạn. Duyệt qua các sản phẩm nổi bật của chúng tôi
                     ngay hôm nay và biến ước mơ về một không gian sống 
                     lý tưởng thành hiện thực!"</p>
               </div>
               <hr>
                <?php require_once './view/BlogView.php';?>
            <hr>
        </div>
          </div>
          <hr>
          <div class="content-blog">
            <div class="container">
               <div class="row">
                <div class="col-md-3 shadow">
                    <img src="./img/decor-blog1.jpg" alt="" class="w-100">
                </div>
                <div class="col-md-9">
                    <h3 class="wow fadeInUp">1. "10 Ý Tưởng Trang Trí Nhà Cửa Độc Đáo Cho Phòng Khách"</h3>
                    <p class="wow fadeInUp">Bạn đang muốn biến căn phòng khách của mình trở nên độc đáo và
                         phong cách hơn? Trong bài viết này, chúng tôi đã tổng hợp 10 ý
                          tưởng trang trí sáng tạo để bạn có thể áp dụng ngay vào không
                           gian sống của mình. Từ việc sử dụng các phụ kiện trang trí nhỏ
                            nhắn đến việc thay đổi màu sắc và đồ đạc, hãy cùng khám phá
                             cách làm mới phòng khách của bạn.</p>
                    <h3 class="wow fadeInUp">2. "Bí Quyết Trang Trí Nhà Cửa Theo Phong Cách Scandinavian"</h3>
                    <p class="wow fadeInUp">Phong cách trang trí Scandinavia luôn được biết đến với sự tối giản,
                         thanh lịch và sự thoải mái. Trong bài viết này, chúng tôi sẽ chia
                          sẻ các bí quyết và lời khuyên để bạn có thể áp dụng phong cách
                           này vào không gian sống của mình. Từ việc chọn lựa đồ đạc đến
                            việc sắp xếp không gian, hãy khám phá cách biến căn nhà của 
                            bạn trở nên ấm áp và hiện đại theo phong cách Scandinavia.</p>
                    <h3 class="wow fadeInUp">3. "5 Ý Tưởng Trang Trí Phòng Ngủ Tạo Cảm Giác Thư Thái"</h3>
                    <p class="wow fadeInUp">Phòng ngủ là nơi bạn thư giãn và nghỉ ngơi sau một ngày làm việc
                         căng thẳng. Vậy tại sao không biến nó trở thành một không gian
                          đẹp mắt và thư thái hơn? Trong bài viết này, chúng tôi sẽ chia 
                          sẻ 5 ý tưởng trang trí đơn giản nhưng hiệu quả để tạo ra một không
                           gian ngủ yên bình và thoải mái. Từ việc sử dụng ánh sáng đúng cách
                            đến việc chọn lựa trang trí giường và đồ đạc, hãy khám phá cách
                             biến phòng ngủ của bạn trở nên thư thái và tạo cảm giác thoải
                              mái mỗi khi bước vào.</p>
                </div>
               </div>
               <br>
               <div class="row">
                <div class="col-md-9">
                    <h3 class="wow fadeInUp">1. "10 Ý Tưởng Trang Trí Nhà Cửa Độc Đáo Cho Phòng Khách"</h3>
                    <p class="wow fadeInUp">Bạn đang muốn biến căn phòng khách của mình trở nên độc đáo và
                         phong cách hơn? Trong bài viết này, chúng tôi đã tổng hợp 10 ý
                          tưởng trang trí sáng tạo để bạn có thể áp dụng ngay vào không
                           gian sống của mình. Từ việc sử dụng các phụ kiện trang trí nhỏ
                            nhắn đến việc thay đổi màu sắc và đồ đạc, hãy cùng khám phá
                             cách làm mới phòng khách của bạn.</p>
                    <h3 class="wow fadeInUp">2. "Bí Quyết Trang Trí Nhà Cửa Theo Phong Cách Scandinavian"</h3>
                    <p class="wow fadeInUp">Phong cách trang trí Scandinavia luôn được biết đến với sự tối giản,
                         thanh lịch và sự thoải mái. Trong bài viết này, chúng tôi sẽ chia
                          sẻ các bí quyết và lời khuyên để bạn có thể áp dụng phong cách
                           này vào không gian sống của mình. Từ việc chọn lựa đồ đạc đến
                            việc sắp xếp không gian, hãy khám phá cách biến căn nhà của 
                            bạn trở nên ấm áp và hiện đại theo phong cách Scandinavia.</p>
                    <h3 class="wow fadeInUp">3. "5 Ý Tưởng Trang Trí Phòng Ngủ Tạo Cảm Giác Thư Thái"</h3>
                    <p class="wow fadeInUp">Phòng ngủ là nơi bạn thư giãn và nghỉ ngơi sau một ngày làm việc
                         căng thẳng. Vậy tại sao không biến nó trở thành một không gian
                          đẹp mắt và thư thái hơn? Trong bài viết này, chúng tôi sẽ chia 
                          sẻ 5 ý tưởng trang trí đơn giản nhưng hiệu quả để tạo ra một không
                           gian ngủ yên bình và thoải mái. Từ việc sử dụng ánh sáng đúng cách
                            đến việc chọn lựa trang trí giường và đồ đạc, hãy khám phá cách
                             biến phòng ngủ của bạn trở nên thư thái và tạo cảm giác thoải
                              mái mỗi khi bước vào.</p>
                </div>
                <div class="col-md-3 shadow">
                    <img src="./img/decor-blog2.jpg" alt="" class="w-100">
                </div>
               </div>
            </div>
          </div>
          <?php 
          require_once './Include/footer.php';
          ?>

          
    <script src="./js/index.js"></script>

</body>
</html>
