<?php require_once './Controller/Admin_OrderController.php';
$OrderID = $_GET['order_id'];
$controller = new Admin_OrderController();
$result = $controller->ShowOrder($OrderID);
$results = $result->fetch_assoc();

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
                <option value="2">Hủy đơn(Chờ duyệt)</option>
                <option value="3">Đã hủy</option>
                <option value="4">Đã giao</option>
                <option value="5">Đang giao</option>

            </select>

        </div>
</form>
<div class="d-grid mt-5">
    <button type="button" class="btn btn-primary" id="update_order">Cập Nhật Trạng Thái</button>
</div>
<script>
document.getElementById('update_order').addEventListener('click', (e) => {
    e.preventDefault();
    let OrderID = document.getElementById('id').value;
    let status = document.getElementById('status').value;
    if (status == 'active') {
        swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Vui lòng chọn trạng thái sản phẩm'
        });
    }
    let formData = new FormData();
    formData.append('OrderID', OrderID);
    formData.append('status', status);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', './Controller/Update_OrderController.php', true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.check) {
                    swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Cập nhật trạng thái sản phẩm thành công'
                    }).then(() => {
                        window.location.href = 'admin_oder.php';
                    });
                } else {
                    swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Cập nhật trạng thái sản phẩm thất bại'
                    });
                }
            }
        }
    }
    xhr.send(formData);

})
</script>