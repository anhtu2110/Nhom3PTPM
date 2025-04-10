<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Nhom3PTPM/Controller/Add_To_CartController.php';
    $controller = new Cart_Controller();
    $UserID = $_SESSION['userID'];
    $result = $controller->Show_CartController($UserID);
    foreach($result as $item):
?>
<div class="cart-item wow fadeInUp">
    <div class="row">
        <div class="col-md-2">
            <img src="<?php echo $item['Image'];?>" alt="" class="w-100">
        </div>
        <div class="col-md-9">
            <h3><?php echo $item['Title'];?></h3>
            <input type="hidden" class='detailID' value="<?php echo $item['IDDetail'];?>">
            <div class="giatienitem d-flex">
                <p>Giá tiền :
                <p class="giatien"><?php echo number_format($item['Price'], 0, ",", ".") ;?> VND</p>
                </p>
            </div>
            <div class="sll d-flex">
                <p>Số lượng :</p>
                <button class="btn btn-outline-primary decrement" data-id-product="<?php echo $item['ProductID'] ?>"
                    data-price="<?php echo $item['Price'];?>">-</button>
                <input type="text" value="<?php echo isset($item['Quantity']) ? $item['Quantity'] : 1;?>" min='1'
                    class="quantity">
                <button class="btn btn-outline-primary increment" data-id-product="<?php echo $item['ProductID'] ?>"
                    data-price="<?php echo $item['Price'];?>">+</button>
            </div>

        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <input type="hidden" id='check_status' value="<?php echo isset($item['status']) ? $item['status'] : '';?>">
            <button class="btn btn-danger tam-an" data-delete-product="<?php echo $item['ProductID'];?>"
                data-order-id="<?php echo $item["OrderID"] ?>">Xóa Sản
                Phẩm</button>
        </div>
    </div>
</div>
<br>
<?php endforeach;?>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    function decrement(element) {
        const quantityInput = element.parentElement.querySelector('.quantity');
        let value = parseInt(quantityInput.value);
        if (value > 1) {
            quantityInput.value = value - 1;
        }
    }

    function increment(element) {
        const quantityInput = element.parentElement.querySelector('.quantity');
        let value = parseInt(quantityInput.value);
        quantityInput.value = value + 1;
    }
    document.querySelectorAll('.decrement').forEach(button => {
        button.addEventListener('click', (e) => {
            decrement(e.target);
        });
    });
    document.querySelectorAll('.increment').forEach(button => {
        button.addEventListener('click', (e) => {
            increment(e.target);
        });
    });
});

$(document).ready(function() {
    $(".decrement").click(function(e) {
        e.preventDefault();
        let quantity = $(this).next("input.quantity").val()
        let product_id = $(this).attr("data-id-product");
        let price = $(this).attr("data-price");
        let data = {
            quantity: quantity,
            price: price,
            product_id: product_id
        }
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/Nhom3PTPM/Controller/Update_Cart_Controller.php",
            data: data,
            dataType: "text",
            success: function(response) {
                $("p.resultMoney").text(response);
                $("p#total-money").text(response);
            }
        });

    });
    $(".increment").click(function(e) {
        e.preventDefault();
        let product_id = $(this).attr("data-id-product");
        let quantity = $(this).prev("input.quantity").val();
        let price = $(this).attr("data-price");
        let data = {
            quantity: quantity,
            price: price,
            product_id: product_id
        }
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/Nhom3PTPM/Controller/Update_Cart_Controller.php",
            data: data,
            dataType: "text",
            success: function(response) {
                $("p.resultMoney").text(response);
                $("p#total-money").text(response);
            }
        });

    });
    $(".tam-an").click(function(e) {
        e.preventDefault();
        let OrderID = $(this).attr("data-order-id");
        swal.fire({
            title: 'Bạn có chắc chắn muốn xóa sản phẩm này không?',
            icon: 'warning',
            text: 'Sau khi xóa bạn không thể khôi phục lại sản phẩm này',
            showCancelButton: true,
            confirmButtonText: `Xóa`,
            cancelButtonText: `Hủy`,
        }).then((result) => {
            if (result.isConfirmed) {
                let check_status = $(this).prev("input#check_status").val();
                if (check_status == 4 || check_status == 5 || check_status == 6) {
                    swal.fire({
                        title: 'Bạn không thể xóa sản phẩm này',
                        icon: 'error',
                        text: 'Sản phẩm này đã được thanh toán hoặc đang được vận chuyển '
                    });
                } else {
                    let data = {
                        OrderID: OrderID
                    };
                    $.ajax({
                        type: "POST",
                        url: "http://192.168.126.128:80/Nhom3PTPM/Controller/Delete_TmpOrder.php",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            if (response.check) {
                                swal.fire({
                                    title: 'Xóa sản phẩm thành công',
                                    text: 'Sản phẩm đã được xóa khỏi giỏ hàng',
                                    icon: 'success'
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                swal.fire({
                                    title: 'Xóa sản phẩm thất bại',
                                    text: 'Có lỗi xảy ra trong quá trình xóa sản phẩm',
                                    icon: 'error'
                                });
                            }
                        }
                    });
                }
            }
        })
    });
});
</script>