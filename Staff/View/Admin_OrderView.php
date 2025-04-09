<?php require_once './Controller/Admin_OrderController.php';
$controller = new Admin_OrderController();
$limit = 5;
$offset = isset($_GET['page_order']) ? ($_GET['page_order'] - 1) * $limit : 0;
?>
<div class="row d-flex mb-3">
    <div class="col-6 mx-auto">
        <label for="input" class="form-label">Nhập tên:</label>
        <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm" name="search">
    </div>
</div>
<table class="mx-auto table table-bordered">
    <tr>
        <th class="table-primary text-center">STT</th>
        <th class="table-primary text-center">ID Đơn hàng</th>
        <th class="table-primary text-center">Tên sản phẩm</th>
        <th class="table-primary text-center">ID sản phẩm</th>
        <th class="table-primary text-center">ID Người mua</th>
        <th class="table-primary text-center">Username mua</th>
        <th class="table-primary text-center">Giá thành</th>
        <th class="table-primary text-center">Số lượng</th>
        <th class="table-primary text-center">Tổng tiền</th>
        <th class="table-primary text-center">Thông tin</th>
        <th class="table-primary text-center">Trạng thái</th>
        <th class="table-primary text-center">Chức năng</th>
    </tr>
    <?php 
    $result = $controller->ShowOder_Limit($limit, $offset);
    $count = 1;
    foreach ($result as $item):
        switch ($item['status']) {
            case 1:
                $check = "<span class='badge bg-success'>Đã đặt hàng</span>";
                break;
            case 2:
                $check = "<span class='badge bg-warning'>Hủy đơn,chưa duyệt</span>";
                break;
            case 3:
                $check = "<span class='badge bg-danger'>Đã hủy</span>";
                break;
            case 4:
                $check = "<span class='badge bg-info'>Đã duyệt</span>";
                break;
            case 5:
                $check = "<span class='badge bg-primary'>Đang giao</span>";
                break;
        }
    ?>

    <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $item['OrderID'];?></td>
        <td><?php echo $item['Title'];?></td>
        <td><?php echo $item['ProductID'];?></td>
        <td><?php echo $item['UserID'];?></td>
        <td><?php echo $item['UserCustomer'];?></td>
        <td><?php echo number_format($item['Price'], 0, '.', '.');?></td>
        <td><?php echo $item['Quantity'];?></td>
        <td><?php echo number_format($item['Total_Price'], 0, '.', '.');?></td>
        <td><?php echo $item['Information'];?></td>
        <td><?php echo $check;?></td>
        <td>
            <div class="chucnang d-flex">
                <div class="btn_update mx-auto">
                    <button type="button" class="btn btn-primary btn-sm"style="margin-left: 6px;margin-top:5px;">
                   <a href="update_order.php?order_id=<?php echo $item['OrderID'];?>"style='color:white;'> <i class="fa-solid fa-pen"></i></a></button>
                    <button type="button" class="btn btn-danger btn-sm detele_order"data-order-id='<?php echo $item['OrderID'];?>' style="margin-left: 6px;margin-top:5px;">
                    <i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
        </td>
    </tr>
    <?php 
$count++;
endforeach;?>
</table>
<ul class="pagination justify-content-end">
    <?php
    $count = $controller->getCount()->fetch_assoc();
    $total = $count['total'];
    $pages = ceil($total / $limit);
    for ($i = 1; $i <= $pages; $i++) {
        echo "<li class='page-item'><a class='page-link' href='?page_order=$i'>$i</a></li>";
    }
    ?>
</ul>
<script>

    document.querySelectorAll('.detele_order').forEach(btn =>{
        btn.addEventListener('click',(e)=>{
            e.preventDefault();

            let OrderID = btn.getAttribute('data-order-id');

            swal.fire({
                title: 'Xác nhận xóa',
                text: 'Bạn có chắc muốn xóa bản ghi này?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    let formSend = new FormData();
                    formSend.append('OrderID',OrderID);


                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', './Controller/Delete_OrderController.php', true);
                    xhr.onload = () => {
                        if (xhr.status === 200) {
                            let response = JSON.parse(xhr.responseText);
                            if (response.check) {
                                swal.fire({
                                    title: 'Thành công!',
                                    text: response.message,
                                    icon: 'success'
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                swal.fire({
                                    title: 'Thất bại!',
                                    text: response.message,
                                    icon: 'error'
                                });
                            }
                        } else {
                            swal.fire({
                                title: 'Thất bại!',
                                text: 'Có lỗi xảy ra khi xóa bản ghi.',
                                icon: 'error'
                            });
                        }
                    };
                    xhr.send(formSend);
                }
            });
        });
    });
</script>