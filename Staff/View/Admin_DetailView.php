<?php require_once './Controller/Admin_DetailController.php';
$controller = new Admin_DetailController();
$limit = 5;
$offset = isset($_GET['page_details']) ? ($_GET['page_details'] - 1) * $limit : 0;
?>
<div class="row d-flex mb-3">
    <div class="col-6 mx-auto">
        <label for="input" class="form-label">Nhập tên:</label>
        <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm" name="search">
    </div>
    <div class="col-2">
        <button class="btn btn-success mt-4" id="chuyen_adddetails"><i class="fa-solid fa-check"></i> Thêm Chi tiết
            mới</button>
    </div>
</div>
<table class="mx-auto table table-bordered">
    <tr>
        <th class="table-primary text-center">STT</th>
        <th class="table-primary text-center">ID Detail</th>
        <th class="table-primary text-center">Tiêu đề</th>
        <th class="table-primary text-center">Mô tả</th>
        <th class="table-primary text-center">Hình ảnh</th>
        <th class="table-primary text-center">Giá cũ</th>
        <th class="table-primary text-center">Giá hiện tại</th>
        <th class="table-primary text-center">Nhà cung cấp</th>
        <th class="table-primary text-center">Số lượng</th>
        <th class="table-primary text-center">Đã bán</th>
        <th class="table-primary text-center">Danh mục</th>
        <th class="table-primary text-center">Chức năng</th>
    </tr>
    <?php
    $showDetail = $controller->showDetail_Limit($limit, $offset);
    $count = 1;
    foreach ($showDetail as $item) :
        switch ($item['CategoryID']) {
            case 1:
                $item['CategoryID'] = 'Ghế Decor';
                break;
            case 2:
                $item['CategoryID'] = 'Bàn làm việc';
                break;
            case 3:
                $item['CategoryID'] = 'Đồ Decor';
                break;
            case 4:
                $item['CategoryID'] = 'Kệ để đồ';
                break;
            case 4:
                $item['CategoryID'] = 'Giường ngủ';
                break;
        }
    ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $item['IDDetail']; ?></td>
            <td><?php echo $item['Title']; ?></td>
            <td><?php echo $item['Describes']; ?></td>
            <td><img src="<?php echo '../' . $item['Image']; ?>" alt="" style="max-width: 80px;max-height: 80px;"></td>
            <td><?php echo number_format($item['OldPrice'], 0, '.', '.'); ?></td>
            <td><?php echo number_format($item['Price'], 0, '.', '.'); ?></td>
            <td><?php echo $item['Supplier']; ?></td>
            <td><?php echo $item['Quantity']; ?></td>
            <td><?php echo $item['Sold']; ?></td>
            <td><?php echo $item['CategoryID']; ?></td>
            <td>
                <div class="chucnang d-flex">
                    <div class="btn_update mx-auto">
                        <button type="button" class="btn btn-primary btn-sm" style="margin-left: 6px;margin-top:5px;">
                            <a href="Update_details.php?details_id=<?php echo $item['IDDetail']; ?>" style="color: white;"><i class="fa-solid fa-pen"></i></a></button>
                        <button type="button" class="btn btn-danger btn-sm delete_detail" style="margin-left: 6px;margin-top:5px;" data-detail-id='<?php echo $item['IDDetail']; ?>'><i class="fa-solid fa-trash-can"></i></button>
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
    $result = $controller->getCount();
    $row = $result->fetch_assoc();
    $total_records = $row['total'];
    $total_page = ceil($total_records / $limit);
    if ($total_page > 1) {
        for ($i = 1; $i <= $total_page; $i++) {
            echo '<li class="page-item"><a class="page-link" href="?page_details=' . $i . '">' . $i . '</a></li>';
        }
    }
    ?>
</ul>

<script>
    document.getElementById('chuyen_adddetails').addEventListener('click', function() {
        window.location.href = 'add_details.php';
    });
    document.querySelectorAll('.delete_detail').forEach((button) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            let IDDetail = button.getAttribute('data-detail-id');

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
                    formSend.append('IDDetail', IDDetail);

                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', './Controller/DeleteDetailController.php', true);
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