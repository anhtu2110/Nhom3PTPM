    <?php require_once './Controller/Admin_CustomerController.php'; ?>
    <div class="row d-flex mb-3">
        <div class="col-6 mx-auto">
            <label for="input" class="form-label">Nhập tên:</label>
            <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm" name="search">
        </div>
        <div class="col-4 d-flex justify-content-end">
            <button class="btn btn-success mt-4" id="chuyen_add_customer"><i class="fa-solid fa-check"></i> Thêm Khách
                hàng
                mới</button>
        </div>
    </div>
    <table class="mx-auto table table-bordered">
        <tr>
            <th class="table-primary text-center">STT</th>
            <th class="table-primary text-center">ID Khách hàng</th>
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
        $limit = 4;
        $offset = isset($_GET['page_customer']) ? ($_GET['page_customer'] - 1) * $limit : 0;
        $show = new Admin_CustomerController();
        $reslut = $show->Display_Customer($limit, $offset);
        $count = 1;
        foreach ($reslut as $item) :
            switch ($item['Status']) {
                case 1:
                    $status = "<p style='color:green;margin:0'>Hoạt động</p>";
                    break;
                case 2:
                    $status = "<p style='color:red;margin:0'>Ngừng hoạt động</p>";
                    break;
                case 3:
                    $status = "<p style='color:goldenrod;margin:0'>Đình chỉ</p>";
                    break;
            }
        ?>
        <tr>
            <td style="padding:5px"><?php echo $count; ?></td>
            <td style="padding:5px"><?php echo $item['UserID']; ?></td>
            <td style="padding:5px"><?php echo $item['Title']; ?></td>
            <td style="padding:5px"><?php echo $item['UserName']; ?></td>
            <td style="padding:5px"><?php echo md5($item['Password']); ?></td>
            <td style="padding:5px"><?php echo $item['Email']; ?></td>
            <td style="padding:5px"><?php echo $item['Address']; ?></td>
            <td style="padding:5px"><img src="<?php echo '../' . $item['Image']; ?>" alt=""
                    style="max-width: 80px;max-height: 80px;"></td>
            <td style="padding:5px"><?php echo $item['RegistrationDate']; ?></td>
            <td style="padding:5px"><?php echo $status; ?></td>
            <td style="padding:5px">
                <div class="chucnang d-flex">
                    <div class="btn_update mx-auto">
                        <button type="button" class="btn btn-primary btn-sm" style="margin-left: 6px;margin-top:5px;">
                            <a href="update_customer.php?customer_id=<?php echo $item['UserID']; ?>"
                                style="color:white;"><i class="fa-solid fa-pen"></i></a>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm delete_customer"
                            data-customer-id="<?php echo $item['UserID']; ?>"
                            style="margin-left: 6px;margin-top:5px;"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
            </td>
            <?php
            $count++;
        endforeach;
            ?>
        </tr>
    </table>
    <ul class="pagination justify-content-end">
        <?php
        $tinhsl = new Admin_CustomerController();
        $kq = $tinhsl->getCount_Customer();
        $sum = $kq['total_customer'];
        for ($i = 1; $i <= ceil($sum / $limit); $i++) {
            echo "<li class='page-item'><a class='page-link' href='?page_customer=$i'>$i</a></li>";
        }
        ?>
    </ul>
    <script>
document.getElementById('chuyen_add_customer').addEventListener('click', function() {
    window.location.href = "add_customer.php";
});
document.querySelectorAll('.delete_customer').forEach((button) => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        let CustomerID = button.getAttribute('data-customer-id');

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
                formSend.append('CustomerID', CustomerID);

                let xhr = new XMLHttpRequest();
                xhr.open('POST', './Controller/Delete_CustomerController.php', true);
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
document.getElementById('export_customer').addEventListener('click', function() {
    let sendForm = new FormData();
    sendForm.append('export_customer', true);

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
                a.download = 'export_customer.xlsx';
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