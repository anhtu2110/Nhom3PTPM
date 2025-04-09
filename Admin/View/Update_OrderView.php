<?php require_once './Controller/Admin_OrderController.php';
$OrderID = $_GET['order_id'];
$controller = new Admin_OrderController();
$result = $controller->ShowOrder($OrderID);
$results = $result->fetch_assoc();
$list_status_order = $controller->Get_list_status_order();
?>
<form action="">
    <div class="row mb-3 mt-5">
        <div class="col-6">
            <label for="input" class="form-label">ID Đơn hàng:</label>
            <input type="text" class="form-control" value="<?php echo $results['OrderID']; ?>" id="id"
                placeholder="Nhập ID Đơn hàng" name="OrderID" readonly>
        </div>
        <div class="col-6">
            <label for="input" class="form-label">Trạng thái sản phẩm:</label>
            <select class="form-control" id="status" name="Title">
                <option value="active">--Chọn trạng thái--</option>
                <?php
                foreach ($list_status_order as $value) {
                    ?>
                <option value="<?php echo $value['id_status'] ?>"
                    <?php if($results['status'] == $value['id_status']) echo 'selected' ?>>
                    <?php echo $value['name_status'] ?></option>
                <?php
                }
                ?>
                <!-- <option value="1">Chờ xác nhận</option>
                <option value="2">Hủy đơn(Chờ duyệt)</option>
                <option value="3">Đã hủy</option>
                <option value="4">Đã giao</option>
                <option value="5">Đang giao</option>
                <option value="6">abc</option> -->
            </select>

        </div>
</form>
<script>
$(document).ready(function() {
    $("#status").change(function(e) {
        e.preventDefault();
        let OrderID = $("#id").val();
        let status = $(this).val();
        let data = {
            OrderID: OrderID,
            status: status
        };
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/TestCNPM/Admin/Controller/Update_OrderController.php",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.check) {
                    swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: ''
                    }).then(() => {
                        window.location.href =
                            'http://192.168.126.128:80/TestCNPM/Admin/admin_oder.php';
                    })
                } else {
                    swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Cập nhật trạng thái sản phẩm thất bại'
                    });
                }
            }
        });
    });
});
</script>