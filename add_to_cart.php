<?php 
    session_start();
    require_once './Controller/auth.php';
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
<div class="banner add-to-cart">
    <img src="/img/Gray Elegant Interior Design Facebook Cover.png" alt="">
</div>
<!-- <hr> -->
<div class="checkcart" style="padding-top:55px">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="cart-banner d-flex justify-content-center align-items-center wow zoomIn">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <h3 class="mb-0 ">My Cart</h3>
                </div>
                <br>
                <?php
                  require_once './View/Add_To_CartView.php';
                  $total_prices = $controller->Get_Total_Price_Product_Status_Null_Controller($_SESSION['userID']);
                ?>
            </div>
            <div class="col-md-4 wow zoomIn">
                <div class="cart-checkout d-flex justify-content-center align-items-center">
                    <div class="container">
                        <div class="checkout-title text-center ">
                            <br>
                            <div class="sum_item d-flex">
                                <h5 id="Sum-product">Số đơn hàng bạn mua là :
                                </h5>
                                <h5 id="kq"></h5>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-end">
                                    <p>Số tiền thanh toán:</p>
                                    <hr>
                                    <p>Phí ship:</p>
                                    <hr>
                                    <p>Tổng số tiền thanh toán :</p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <p class="tien" id="total-money">
                                        <?php echo number_format($total_prices, 0, ",", ".") ;?> VND</p>
                                    <hr>
                                    <p style="color: red;">FREE</p>
                                    <hr>
                                    <p class="resultMoney" style="font-weight : bold;" id="total-money1">
                                        <?php echo number_format($total_prices, 0, ",", ".") ;?> VND</p>
                                </div>
                            </div>
                        </div>
                        <div class="btncheckout text-center">
                            <div class="d-gird ">
                                <button class="btn btn-primary w-100 mt-2" onclick="window.location.href='checkout.php'" <?php if ($total_prices <= 0) {
                                        echo "disabled";
                                    } ?>>Check Out</button>
                                <p class="m-0">OR</p>
                                <button class="btn btn-light w-100" onclick="window.location.href='checkdon.php'">Xem lộ
                                    trình đơn hàng</button>
                            </div>
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

<script src="./js/add_to_cart.js"></script>

</html>