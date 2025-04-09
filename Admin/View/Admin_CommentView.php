<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/MyHouseDecor/Admin/Controller/Admin_CommentController.php';
$limit = 4;
$offset = isset($_GET['page']) ? ($_GET['page'] - 1) * $limit : 0;
$controller = new Admin_CommentController();
$result = $controller->showComment($limit, $offset);
$count = 1;

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
        <th class="table-primary text-center">ID Bình luận</th>
        <th class="table-primary text-center">Tên Chi Tiết Sản Phẩm</th>
        <th class="table-primary text-center">Tài Khoản bình luận</th>
        <th class="table-primary text-center">Hình ảnh</th>
        <th class="table-primary text-center">Nội dung</th>
        <th class="table-primary text-center">Số sao đánh giá</th>
        <th class="table-primary text-center">Ngày đánh giá</th>
        <th class="table-primary text-center">Trạng thái</th>
        <th class="table-primary text-center">Chức năng</th>
    </tr>
    <?php foreach ($result as $items) :
        switch ($items['Status']) {
            case 1:
                $status = '<p class="m-0" style="color: green;">Đã duyệt</p>';
                break;
            case 0:
                $status = '<p class="m-0" style="color: goldenrod;">Chưa duyệt</p>';
                break;
        }
    ?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $items['CmtID']; ?></td>
        <td><?php
                $x = $controller->getNameProduct($items['DetailsID']);
                echo $x;
                ?></td>
        <td><?php echo $items['UserName']; ?></td>
        <td><img src="<?php echo '../' . $items['Image']; ?>" style="max-width: 80px;max-height: 80px;" alt=""></td>
        <td><?php echo $items['Content']; ?></td>
        <td><?php echo $items['Star']; ?></td>
        <td><?php echo $items['Date']; ?></td>
        <td><?php echo $status; ?></td>
        <td>
            <div class="chucnang d-flex">
                <div class="btn_update mx-auto">
                    <button type="button" class="btn btn-success btn-sm confirm_comment"
                        style="margin-left: 6px;margin-top:5px;" data-update-id="<?php echo $items['CmtID']; ?>"
                        data-bs-toggle="tooltip" title="Duyệt!">
                        <i class="fa-solid fa-check"></i></button>
                    <button type="button" data-delete-id='<?php echo $items['CmtID']; ?>' id='delete_comment'
                        class="btn btn-danger btn-sm" style="margin-left: 6px;margin-top:5px;" data-bs-toggle="tooltip"
                        title="Xóa!" style="margin-left: 6px;"><i class="fa-solid fa-xmark"></i></button>
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
    $counts = $controller->getCount();
    $count = $counts->fetch_assoc();
    $total = $count['total'];
    for ($i = 1; $i <= ceil($total / $limit); $i++) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }
    ?>
</ul>
<script>
document.querySelectorAll('#delete_comment').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        let id = btn.getAttribute('data-delete-id');
        swal.fire({
            title: 'Bạn có chắc chắn muốn xóa không?',
            text: 'Dữ liệu sẽ không thể khôi phục lại!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                let formData = new FormData();
                formData.append('id', id);
                let xhr = new XMLHttpRequest();
                xhr.open('POST', './Controller/Delete_CommentController.php');
                xhr.onload = () => {
                    if (xhr.status == 200) {
                        let result = xhr.responseText;
                        if (result == 'true') {
                            swal.fire({
                                title: 'Xóa thành công!',
                                text: 'Dữ liệu đã được xóa!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });

                        } else {
                            swal.fire({
                                title: 'Xóa thất bại!',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                }
                xhr.send(formData);
            }
        });
    });
});
document.querySelectorAll('.confirm_comment').forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        let idbtn = button.getAttribute('data-update-id');
        let formDatas = new FormData();
        formDatas.append('id', idbtn);
        let xhrs = new XMLHttpRequest();
        xhrs.open('POST', './Controller/Update_CommentController.php');
        xhrs.onload = () => {
            if (xhrs.status == 200) {
                let results = xhrs.responseText;
                if (results == 'true') {
                    swal.fire({
                        title: 'Duyệt thành công!',
                        text: 'Dữ liệu đã được duyệt!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });

                } else {
                    swal.fire({
                        title: 'Duyệt thất bại!',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        }
        xhrs.send(formDatas);
    });
});
</script>