<?php require_once './Controller/Admin_ProductController.php';
$controller = new Admin_Product_Controller();
$limit = 5;
?>
<div class="row d-flex mb-3">
    <div class="col-6 mx-auto">
        <label for="input" class="form-label">Nhập tên:</label>
        <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm" name="search">
    </div>
    <div class="col-2">
        <button class="btn btn-success mt-4" id="chuyen_addProduct"><i class="fa-solid fa-check"></i> Thêm Sản phẩm mới
            mới</button>
    </div>
</div>
<table class="mx-auto table table-bordered">
    <tr>
        <th class="table-primary text-center">STT</th>
        <th class="table-primary text-center">ID Sản Phẩm</th>
        <th class="table-primary text-center">Tên sản phẩm</th>
        <th class="table-primary text-center">Hình ảnh</th>
        <th class="table-primary text-center">Giá cũ</th>
        <th class="table-primary text-center">Giá hiện tại</th>
        <th class="table-primary text-center">Bán chạy</th>
        <th class="table-primary text-center">Ngày nhập</th>
        <th class="table-primary text-center">ID Chi tiết</th>
        <th class="table-primary text-center">Chức năng</th>
    </tr>

    <?php
    $offset = isset($_GET['page_productid']) ? ($_GET['page_productid'] - 1) * $limit : 1;
    $items = $controller->Display_Product($limit, $offset);
    $count = 1;
    foreach ($items as $item) :
        switch ($item['IsBestSeller']) {
            case 1:
                $check = "<p style='margin: 0; color:green;'>Có</p>";
                break;
            case 0:
                $check = "Không";
                break;
        }
    ?>
    
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $item['ProductID']; ?></td>
            <td><?php echo $item['Title']; ?></td>
            <td><img src="<?php echo '../' . $item['Image']; ?>" alt="" style="max-width: 80px;max-height: 80px;"></td>
            <td><?php echo number_format($item['OldPrice'], 0, '.', '.');?></td>
            <td><?php echo number_format($item['Price'], 0, '.', '.'); ?></td>
            <td><?php echo $check; ?></td>
            <td><?php echo $item['ExtraTime']; ?></td>
            <td><?php echo $item['IDDetail']; ?></td>
            <td>
                <div class="chucnang d-flex">
                    <div class="btn_update mx-auto">
                        <button type="button" class="btn btn-primary btn-sm "style="margin-left: 6px;margin-top:5px;"
                        ><a href="Update_Product.php?product_id=<?php echo $item['ProductID'];?>"style="color:white;">
                        <i class="fa-solid fa-pen"></i></a></button>
                        <button type="button" class="btn btn-danger btn-sm delete_product" style="margin-left: 6px;margin-top:5px;"
                         data-product-id="<?php echo $item['ProductID'];?>"
                         data-detail-id="<?php echo $item['IDDetail'];?>">
                        <i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
            </td>
        </tr>
    <?php
        $count++;
    endforeach; ?>
</table>
<ul class="pagination justify-content-end">
    <?php
    $getcount = $controller->ShowTotal_Product();
    $total = $getcount['total_product'];
    for ($i = 1; $i <= ceil($total / $limit); $i++) {
        echo "<li class='page-item'><a class='page-link' href='?page_productid=$i'>$i</a></li>";
    }
    ?>
</ul>
<script>
    document.getElementById('chuyen_addProduct').addEventListener('click',()=>{
        window.location.href ='add_details.php';
    });
    document.querySelectorAll('.delete_product').forEach(btn =>{
        btn.addEventListener('click',(e)=>{
            e.preventDefault();

            let ProductID = btn.getAttribute('data-product-id');
            let IDDetail = btn.getAttribute('data-detail-id');

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
                    formSend.append('ProductID',ProductID);
                    formSend.append('IDDetail',IDDetail);


                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', './Controller/Delete_ProductController.php', true);
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