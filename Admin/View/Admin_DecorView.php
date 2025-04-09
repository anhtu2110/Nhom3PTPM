<?php require_once './Controller/Admin_DecorController.php';
$controller = new Admin_DecorController();
$limit = 3;
$offset = isset($_GET['page_id']) ? ($_GET['page_id'] - 1) * $limit : 0;
?>
<div class="row d-flex mb-3">
    <div class="col-6 mx-auto">
        <label for="input" class="form-label">Nhập tên:</label>
        <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm" name="search">
    </div>
    <div class="col-2">
        <button class="btn btn-success mt-4"id="chuyen_add"><i class="fa-solid fa-check"></i> Thêm Decor
            mới</button>
    </div>
</div>
<table class="mx-auto table table-bordered">
    <tr>
        <th class="table-primary text-center">STT</th>
        <th class="table-primary text-center">ID Decor</th>
        <th class="table-primary text-center">Tiêu đề</th>
        <th class="table-primary text-center">Nội dung</th>
        <th class="table-primary text-center">Hình ảnh</th>
        <th class="table-primary text-center">Vị trí</th>
        <th class="table-primary text-center">Trạng thái</th>
        <th class="table-primary text-center">Cấp bậc</th>
        <th class="table-primary text-center">Chức năng</th>
    </tr>
    <?php
    $result = $controller->ShowDecor_Limit($limit, $offset);
    $count = 1;
    foreach ($result as $item) :
        switch($item['IsActive']) {
            case 1:
                $item['IsActive'] = 'Hiển thị';
                break;
            case 0:
                $item['IsActive'] = 'Ẩn';
                break;
        }
    ?>
    <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $item['DecorID'];?></td>
        <td><?php echo $item['Title'];?></td>
        <td><?php echo $item['Content'];?></td>
        <td><img src="<?php echo '../'.$item['Image'];?>" style="max-width: 80px;max-height: 80px;"alt=""></td>
        <td><?php echo $item['DecorOder'];?></td>
        <td><?php echo $item['IsActive'];?></td>
        <td><?php echo $item['Levels'];?></td>
        
        <td>
            <div class="chucnang d-flex">
                <div class="btn_update mx-auto">
                    <button type="button" class="btn btn-primary btn-sm"style="margin-left: 6px;margin-top:5px;">
                    <a href="update_decor.php?decor_id=<?php echo $item['DecorID'];?>"style="color:white;"><i class="fa-solid fa-pen"></i></a></button>
                    <button type="button" class="btn btn-danger btn-sm delete_decor" style="margin-left: 6px;margin-top:5px;" data-decor-id="<?php echo $item['DecorID'];?>">
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
    $result = $controller->CountDecor();
    $row = $result->fetch_assoc();
    $total_records = $row['total'];
    $total_pages = ceil($total_records / $limit);
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<li class='page-item'><a class='page-link' href='?page_id=$i'>$i</a></li>";
    }
    ?>
</ul>
<script>
    document.getElementById('chuyen_add').addEventListener('click', function () {
        window.location.href = 'Add_Decor.php';
    });
    document.querySelectorAll('.delete_decor').forEach((button) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            let DecorID = button.getAttribute('data-decor-id');

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
                    formSend.append('DecorID', DecorID);

                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', './Controller/Delete_DecorController.php', true);
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