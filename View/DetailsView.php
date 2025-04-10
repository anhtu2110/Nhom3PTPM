<?php
if (isset($_GET['Product_Detail_id']) && !empty($_GET['Product_Detail_id'])) {
    $ProductID = $_GET['Product_Detail_id'];
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Controller/DetailController.php';
    $controller = new DetailController();
    $result = $controller->getDetailController($ProductID);

    if ($result && isset($result[0])) {
        $detail = $result[0];

        $title = isset($detail['Title']) ? $detail['Title'] : '';
        $describes = isset($detail['Describes']) ? $detail['Describes'] : '';
        $image = isset($detail['Image']) ? $detail['Image'] : '';
        $supplier = isset($detail['Supplier']) ? $detail['Supplier'] : '';
        $category_title = isset($detail['category_title']) ? $detail['category_title'] : '';
        $sold = isset($detail['Sold']) ? $detail['Sold'] : '';
        $quantity = isset($detail['Quantity']) ? $detail['Quantity'] : '';
        $price = isset($detail['Price']) ? $detail['Price'] : '';
        $oldPrice = isset($detail['OldPrice']) ? number_format($detail['OldPrice'], 0, '.', '.') : '';
        $IDSpham = isset($detail['ProductID']) ? $detail['ProductID'] : '';
?>

<div class="content mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 hinhanh">
                <img src="<?php echo $image; ?>" alt="product" class="img-fluid">
            </div>
            <div class="col-md-5 banners">
                <h2><?php echo $title; ?></h2>
                <img src="img/bannersss.png" alt="" class="mt-4">
                <div class="information">
                    <div class="mota">
                        <button data-bs-toggle="collapse" data-bs-target="#demo" class="details_product">
                            Chi tiết sản phẩm <i class="fas fa-chevron-down"></i>
                        </button>
                        <div id="demo" class="collapse text-info">
                            <?php echo $describes; ?>
                        </div>
                    </div>
                    <div class="prices d-flex">
                        <h5 class="mt-3">Giá thành : </h5>
                        <h5 class="mt-3 price"> <?php echo number_format($price, 0, '.', '.'); ?></h5>
                        <p class="icon_money text-danger">đ</p>
                        <div class="old_price d-flex justify-content-end">
                            <p class="mt-3">Giá cũ :</p>
                            <del class="mt-3 cachxa1xiu"><?php echo $oldPrice; ?>đ</del>
                        </div>
                    </div>

                    <div class="sold d-flex">
                        <h5>Đã bán :</h5>
                        <p class="magin_abc"><?php echo $sold; ?></p>
                    </div>
                    <div class="quantity d-flex">
                        <h5>Số lượng :</h5>
                        <p class="magin_abc"><?php echo $quantity; ?></p>
                    </div>
                    <div class="supplier d-flex">
                        <h5>Nhà cung cấp :</h5>
                        <p class="magin_abc"><?php echo $supplier; ?></p>
                    </div>
                    <div class="category d-flex">
                        <h5>Danh mục :</h5>
                        <p class="magin_abc"><?php echo $category_title; ?></p>
                    </div>
                    <div class="ID_product d-flex">
                        <h5>ID sản phẩm :</h5>
                        <p class="magin_abc"><?php echo $_GET['Product_Detail_id']; ?></p>
                    </div>
                    <div class="danh_gia">
                        <?php
                                $star_kq = $controller->Star($ProductID);
                                $get_json = file_get_contents('star.json');
                                $data = json_decode($get_json, true);
                                $star_key = (string)$star_kq;

                                if (isset($data[$star_key])) {
                                    $star = $data[$star_key];
                                } else {
                                    $star = "Không có đánh giá cho số sao này";
                                }
                                echo $star;
                                ?>
                    </div>
                    <div class="add_to_cart">
                        <button class="btn btn-dark mt-3 click_mua" id="chuyencart">Mua Ngay</button>
                        <button class="btn btn-outline-dark mt-3 click_cart">Thêm vào giỏ hàng</button>
                    </div>
                    <div class="contact d-flex mt-3 justify-content-center">
                        <p class="">Mua hàng cần tư vấn liên hệ :</p>
                        <p class="text-danger"> 0382 752 110</p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    } else {
        echo "<p>Không tìm thấy thông tin chi tiết cho sản phẩm có ID: $ProductID</p>";
    }
} else {
    echo "<p>Không tìm thấy ID sản phẩm trong URL.</p>";
}
?>
<script>
$(document).ready(function() {
    $(".click_cart").click(function(e) {
        e.preventDefault();
        let Title = "<?php echo $title; ?>";
        let Price = "<?php echo $price; ?>";
        let ProductID = "<?php echo $IDSpham; ?>";

        let data = {
            Title: Title,
            Price: Price,
            ProductID: ProductID
        }
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/Nhom3PTPM/Controller/Save_TmpOrderController.php",
            data: data,
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    swal.fire({
                        title: 'Đã thêm vào giỏ hàng',
                        text: data.message,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                } else {
                    swal.fire({
                        title: 'Có lỗi xảy ra',
                        text: data.message,
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
    $("#chuyencart").click(function(e) {
        e.preventDefault();
        let Title = "<?php echo $title; ?>";
        let Price = "<?php echo $price; ?>";
        let ProductID = "<?php echo $IDSpham; ?>";

        let data = {
            Title: Title,
            Price: Price,
            ProductID: ProductID
        }
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/Nhom3PTPM/Controller/Save_TmpOrderController.php",
            data: data,
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    swal.fire({
                        title: 'Đã thêm vào giỏ hàng',
                        text: data.message,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'add_to_cart.php';
                        }
                    });
                } else {
                    swal.fire({
                        title: 'Có lỗi xảy ra',
                        text: data.message,
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
});
</script>

<!-- <script>
$(document).ready(function() {
    $(".click_cart").click(function(e) {
        e.preventDefault();
        let Title = "<?php echo $title; ?>";
        let Price = "<?php echo $price; ?>";
        let ProductID = "<?php echo $IDSpham; ?>";

        let data = {
            Title: Title,
            Price: Price,
            ProductID: ProductID
        }
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/TestCNPM/Controller/Save_TmpOrderController.php",
            data: data,
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    swal.fire({
                        title: 'Đã thêm vào giỏ hàng',
                        text: data.message,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                } else {
                    swal.fire({
                        title: 'Có lỗi xảy ra',
                        text: data.message,
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
    $("#chuyencart").click(function(e) {
        e.preventDefault();
        let Title = "<?php echo $title; ?>";
        let Price = "<?php echo $price; ?>";
        let ProductID = "<?php echo $IDSpham; ?>";

        let data = {
            Title: Title,
            Price: Price,
            ProductID: ProductID
        }
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/TestCNPM/Controller/Save_TmpOrderController.php",
            data: data,
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    swal.fire({
                        title: 'Đã thêm vào giỏ hàng',
                        text: data.message,
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'add_to_cart.php';
                        }
                    });
                } else {
                    swal.fire({
                        title: 'Có lỗi xảy ra',
                        text: data.message,
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
});
</script> -->