<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Controller/CheckDonController.php';


    $checkDon = new CheckDonController();
    $result = $checkDon->Show_CheckOut($_SESSION['userID']);
?>
<div class="checktt">
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-3 wow zoomIn">
                <div class="h3">Lưu ý :</div>
                <p>Kiểm tra đơn hàng: Hãy đảm bảo rằng
                    đã xem xét kỹ thông tin
                    về đơn hàng của họ, bao gồm các mặt hàng,
                    số lượng, giá cả và phí vận chuyển.</p>
                <p>Kiểm tra thông tin thanh toán: Yêu cầu
                    kiểm tra kỹ thông tin thanh toán, bao
                    gồm số thẻ tín dụng/debit, ngày hết hạn và
                    mã bảo mật, để đảm bảo tính chính xác và
                    tránh việc nhập sai thông tin.</p>
                <p>Xác nhận lại giá cả và phí: Đảm bảo rằng đã
                    xem xét và chấp nhận các chi phí liên
                    quan đến đơn hàng, bao gồm cả giá sản phẩm và
                    các loại phí khác như phí vận chuyển hoặc thuế.</p>
            </div>
            <div class="col-md-9">
                <h2 class="text-center wow zoomIn">Thông Tin Chi Tiết Đơn Hàng Của Bạn</h2>
                <hr>
                <?php
                    foreach($result as $item):
                ?>
                <div class="row shadow pb-2 wow fadeInUp">
                    <div class="col-md-2">
                        <img src="<?php echo $item['Image'];?>" alt="" class="w-100">
                    </div>
                    <div class="col-md-10">
                        <h6 class="mb-0"><?php echo $item['Title'];?></h6>
                        <div class="giatienhientai d-flex">
                            <p class="mb-0">Giá : <span
                                    class="mb-0"><?php echo number_format($item['Price'],0,'.','.');?>VND</span></p>
                        </div>
                        <div class="soluongcuoi d-flex">
                            <p class="mb-0">Số lượng đã chọn :
                                <span class="mb-0"><?php echo $item['Quantity'];?></span>
                            </p>
                        </div>
                        <div class="diachi d-flex">
                            <p class="mb-0">Thông tin khách hàng :
                                <span class="mb-0"><?php echo $item['Information'];?></span>
                            </p>
                        </div>
                        <style>
                        .badge-small {
                            font-size: 0.65rem;
                            padding: 0.2em 0.4em;
                        }
                        </style>
                        <div class="trangthai d-flex ">
                            <p>Trạng Thái :</p>
                            <?php
                                switch($item['status']){
                                    case 1:
                                        $check = "<span class='badge bg-warning'>Chở xác nhận</span>";
                                        break;
                                    case 2:
                                        $check = "<span class='badge bg-primary bg-gradient'>Xác nhận đơn hàng</span>";
                                        break;
                                    case 3:
                                        $check = "<span class='badge' style='background-color: orange'>Người bán đang chuẩn bị hàng</span>";
                                        break;
                                    case 4:
                                        $check = "<span class='badge bg-primary'>Đã gửi hàng cho bên vận chuyển</span>";
                                        break;
                                    case 5:
                                        $check = "<span class='badge bg-success'>Đang vận chuyển</span>";
                                        break; 
                                    case 6: 
                                        $check = "<span class='badge bg-success bg-gradient'>Đã giao</span>";
                                        break;     
                                    case 7: 
                                        $check = "<span class='badge bg-danger'>Đã hủy</span>";
                                        break;   
                                }
                            ?>
                            <p class=""><?php echo $check;?></p>
                        </div>
                        <div class="btn_change_address d-flex justify-content-end mb-2">
                            <button type="button" class="btn btn-sm btn-primary change_address"
                                data-status-id="<?php echo $item['status'];?>"
                                data-order-id="<?php echo $item["OrderID"] ?>" <?php if ($item['status'] == 4 || $item['status'] == 5 || $item['status'] == 6 || $item['status'] == 7) {
                                    echo "disabled";
                                } ?>>Thay đổi địa chỉ</button>
                        </div>
                        <div class="btn_delete d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-danger huydon"
                                data-delete-id="<?php echo $item['ProductID'];?>"
                                data-status-id="<?php echo $item['status'];?>"
                                data-order-id="<?php echo $item["OrderID"] ?>" <?php if ($item['status'] == 4 || $item['status'] == 5 || $item['status'] == 6 || $item['status'] == 7) {
                                    echo "disabled";
                                } ?>>Hủy đơn</button>
                        </div>
                    </div>

                </div>
                <br>
                <?php endforeach;?>
                <br>

            </div>
        </div>
    </div>
</div>
<hr>
</div>

<hr>

<script>
$(document).ready(function() {
    $(".change_address").click(function(e) {
        e.preventDefault();
        let OrderID = $(this).attr("data-order-id");
        window.location.href = './checkout.php?orderID=' + OrderID;
    });
    $(".huydon").click(function(e) {
        e.preventDefault();
        let OrderID = $(this).attr("data-order-id");
        let data = {
            OrderID: OrderID,
        };
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/Nhom3PTPM/Controller/CheckDonController.php",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.check) {
                    swal.fire({
                        title: "Hủy đơn hàng thành công",
                        text: "Thành công",
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then((result) => {
                        location.reload();
                    });
                } else {
                    swal.fire({
                        title: "Hủy đơn hàng thất bại",
                        text: "Thất bại",
                        icon: "error",
                        confirmButtonText: "OK",
                    })
                }
            }
        });
    });
});
</script>

<!-- <script>
$(document).ready(function() {
    $(".change_address").click(function(e) {
        e.preventDefault();
        let OrderID = $(this).attr("data-order-id");
        window.location.href = './checkout.php?orderID=' + OrderID;
    });
    $(".huydon").click(function(e) {
        e.preventDefault();
        let OrderID = $(this).attr("data-order-id");
        let data = {
            OrderID: OrderID,
        };
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/Nhom3PTPM/Controller/CheckDonController.php",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.check) {
                    swal.fire({
                        title: "Hủy đơn hàng thành công",
                        text: "Thành công",
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then((result) => {
                        location.reload();
                    });
                } else {
                    swal.fire({
                        title: "Hủy đơn hàng thất bại",
                        text: "Thất bại",
                        icon: "error",
                        confirmButtonText: "OK",
                    })
                }
            }
        });
    });
});
</script> -->