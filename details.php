<?php 
session_start();
    require_once './Controller/auth.php';
    require_once './Include/header.php';
  ?>
<style>
.hinhanh {
    display: flex;
    justify-content: center;
    align-items: center;

}

.information {
    margin-left: 10px;
}

.hinhanh img {
    max-width: 80%;
}

.banners img {
    border: none;
    border-radius: 10px;
}

.price {
    margin-left: 10px;
}

.cachxa1xiu {
    margin-left: 10px;
}

.icon_money {
    margin-top: 9px;
}

.details_product {
    border: none;
    background: none;
    margin-top: 5px;
}

.details_product:hover {
    color: blue;
}

.old_price,
.add_to_cart {
    display: flex;
    justify-content: flex-end;
    margin-left: auto;
}

.magin_abc {
    margin-bottom: 10px;
    margin-top: 1px;
    padding-left: 10px;
}

.click_mua,
.click_cart {
    margin-right: 20px;
    border-radius: 0;
    font-size: 17px;
}

.danh_gia,
.cmt_danhgia {
    color: goldenrod;
}

.comment_title {
    margin-left: 30px;
}

.comments img {
    border: none;
    border-radius: 10px;
    margin-left: 30px;
}

.img_customer img {
    border-radius: 50%;
    object-fit: cover;
    width: 50px;
    height: 50px;
    border: solid 1px black;
}

.form_select {
    width: 180px;
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

<body>
    <div class="start">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-md-8 wow slideInDown">
                    <p><i class="fa-solid fa-location-dot"></i> 111 Trieu Khuc, Quan Thanh Xuan, Ha Noi</p>
                    <p><i class="fa-solid fa-phone"></i> +84 382 752 110</p>
                    <p><i class="fa-solid fa-envelope"></i> daotu2110@gmail.com</p>
                </div>
                <div class="col-md-4 wow slideInDown" id="n1">
                    <a href="https://www.facebook.com/profile.php?id=61559644528431"><i
                            class="fa-brands fa-facebook"></i></a>
                    <a href="https://x.com/?lang=vi"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://web.telegram.org/"><i class="fa-brands fa-telegram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php
      require_once './View/DetailsView.php';
    ?>
    <br>
    <div class="comments m-2">
        <h3 class="comment_title text-info">Đánh giá sản phẩm :</h3>
        <img src="img/bannersss.png" alt="">
        <?php
        require_once './View/CommentView.php';
      ?>
    </div>
    <?php 
    require_once './Include/footer.php';
    ?>

    </html>