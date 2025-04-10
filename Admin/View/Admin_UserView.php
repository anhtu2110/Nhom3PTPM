<div class="row d-flex mb-3">
    <div class="col-6 mx-auto">
        <label for="input" class="form-label">Nhập tên:</label>
        <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm" name="search">
    </div>
    <div class="col-4 justify-content-end">
        <button class="btn btn-success mt-4" id="chuyen_addstaff"><i class="fa-solid fa-check"></i> Thêm Nhân viên
            mới</button>
    </div>
</div>
<table class="mx-auto table table-bordered">
    <tr>
        <th class="table-primary text-center">STT</th>
        <th class="table-primary text-center">ID Nhân Viên</th>
        <th class="table-primary text-center">Họ tên</th>
        <th class="table-primary text-center">UserName</th>
        <th class="table-primary text-center">Password</th>
        <th class="table-primary text-center">Email</th>
        <th class="table-primary text-center">Địa chỉ</th>
        <th class="table-primary text-center">Hình ảnh</th>
        <th class="table-primary text-center">Ngày đăng kí</th>
        <th class="table-primary text-center">Trạng thái</th>
        <th class="table-primary text-center">Chức năng</th>
    </tr>
    <?php
    $limit = 3;
    $offset = isset($_GET['page_staff']) ? ($_GET['page_staff'] - 1) * $limit : 0;
    require_once './Controller/Admin_UserController.php';
    $row = new Admin_UserController();
    $result = $row->Display_AdminUser($limit, $offset);
    $count = 1;
    foreach ($result as $bien) :
        switch ($bien['Status']) {
            case 1:
                $status = '<p style="margin: 0; color:green">Hoạt động</p>';
                break;
            case 2:
                $status = '<p style="margin: 0; color:red">Đình chỉ</p>';
                break;
            case 3:
                $status = 'Thôi việc';
                break;
        }
    ?>


    <tr>
        <td style="padding:5px"><?php echo $count; ?></td>
        <td style="padding:5px"><?php echo $bien['UserID']; ?></td>
        <td style="padding:5px"><?php echo $bien['Title']; ?></td>
        <td style="padding:5px"><?php echo $bien['UserName']; ?></td>
        <td style="padding:5px"><?php echo md5($bien['Password']); ?></td>
        <td style="padding:5px"><?php echo $bien['Email']; ?></td>
        <td style="padding:5px"><?php echo $bien['Address']; ?></td>
        <td style="padding:5px;"><img src="<?php echo $bien['Image']; ?>" alt=""
                style="max-width: 80px;max-height: 80px;"></td>
        <td style="padding:5px"><?php echo $bien['RegistrationDate']; ?></td>
        <td style="padding:5px"><?php echo $status; ?></td>
        <td style="padding:5px">
            <div class="chucnang d-flex">
                <div class="btn_update mx-auto">
                    <button type="button" class="btn btn-primary btn-sm edit_user"
                        style="margin-left: 6px;margin-top:5px;">
                        <a href="update_staff.php?update_staff=<?php echo $bien['UserID'];?>"><i class="fa-solid fa-pen"
                                style="color:white;"></i></a></button>
                    <button type="button" class="btn btn-danger btn-sm delete_user"
                        style="margin-left: 6px; margin-top:5px;" data-user-id="<?php echo $bien['UserID'];?>"><i
                            class="fa-solid fa-trash-can"></i></a></button>
                </div>
            </div>
        </td>
    </tr>
    <?php
        $count++;
    endforeach; ?>
</table>
<?php
require_once './Model/Admin_UserModel.php';
$model = new Admin_UserModel();
$result = $model->getTotalUsers();
$totalUsers = $result['total'];
?>
<ul class="pagination justify-content-end">
    <?php
    for ($i = 1; $i <= ceil($totalUsers / 3); $i++) {
        echo "<li class='page-item'><a class='page-link' href='?page_staff=$i'>$i</a></li>";
    }
    ?>
</ul>
<script>
document.getElementById('chuyen_addstaff').addEventListener('click', () => {
    window.location.href = 'add_staff.php';
});
document.querySelectorAll('.delete_user').forEach((button) => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        let userID = button.getAttribute('data-user-id');

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
                formSend.append('UserID', userID);

                let xhr = new XMLHttpRequest();
                xhr.open('POST', './Controller/Delete_StaffController.php', true);
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
document.getElementById('export_staff').addEventListener('click', function() {
    let sendForm = new FormData();
    sendForm.append('export_staff', true);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', './Controller/EXCEL.php', true);
    xhr.responseType = "blob";

    xhr.onload = function() {
        if (xhr.status === 200) {
            let contentType = xhr.getResponseHeader("content-type");
            if (contentType && contentType.indexOf(
                    "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") !== -1) {

                let blob = new Blob([xhr.response], {
                    type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                });
                let url = window.URL.createObjectURL(blob);
                let a = document.createElement('a');
                a.href = url;
                a.download = 'export_staff.xlsx';
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
            } else {
                let response = JSON.parse(xhr.responseText);
                if (response.check) {
                    swal.fire({
                        title: 'Thành công!',
                        text: response.message,
                        icon: 'success'
                    });
                } else {
                    swal.fire({
                        title: 'Thất bại!',
                        text: response.message,
                        icon: 'error'
                    });
                }
            }
        }
    };
    xhr.send(sendForm);
});
</script>