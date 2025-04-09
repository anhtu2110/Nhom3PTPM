    <?php 
        if(isset($_GET['update_staff'])){
            $userID = $_GET['update_staff'];
            require_once './Controller/Admin_UserController.php';
        }
    ?>
<form>
    <div class="row mb-3">
        <div class="col-md-3">
            <?php 
                $controller = new Admin_UserController();
                $result = $controller->Display_Update_Staff_Controller($userID);
                foreach($result as $StaffItem):
            ?>
            <label for="fullName" class="form-label">Họ tên:</label>
            <input type="text" class="form-control" value="<?php echo $StaffItem['Title'];?>" id="fullName" placeholder="Nhập họ tên">
        </div>
        <input type="hidden" id="userID" value="<?php echo $userID; ?>">
        <div class="col-md-3">
            <label for="userName" class="form-label">UserName:</label>
            <input type="text" class="form-control" value="<?php echo $StaffItem['UserName'];?>" id="userName" placeholder="Nhập userName">
        </div>
        <div class="col-md-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" value="<?php echo $StaffItem['Password'];?>" id="password" placeholder="Nhập password">
        </div>
        <div class="col-md-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" value="<?php echo $StaffItem['Email'];?>" id="email" placeholder="Nhập email">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="address" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" value="<?php echo $StaffItem['Address'];?>" id="address" placeholder="Nhập địa chỉ">
        </div>
        <div class="col-md-3">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image">
        </div>
        <div class="col-md-3">
            <label for="registrationDate" class="form-label">Ngày đăng kí:</label>
            <input type="date" class="form-control" value="<?php echo $StaffItem['RegistrationDate'];?>" id="registrationDate">
        </div>
        <div class="col-md-3">
            <label for="email" class="form-label">Số điện thoại:</label>
            <input type="text" class="form-control" value="<?php echo $StaffItem['Phone_Number'];?>" id="phone" placeholder="Nhập email">
        </div>
        <div class="col-md-3">
            <label for="status" class="form-label">Trạng thái:</label>
            <select class="form-select" value="<?php echo $StaffItem['Status'];?>" id="status">
                <option value="1">Hoạt động</option>
                <option value="2">Đình chỉ</option>
                <option value="3">Thôi việc</option>
            </select>
        </div>
    </div>
    <?php
    endforeach;
    ?>
</form>
<div class="row">
    <div class="col d-grid">
        <button type="submit" class="btn btn-primary"id="update_staff">Sửa</button>
    </div>
</div>
<script>
     document.getElementById('update_staff').addEventListener('click', () => {
    let UserID = document.getElementById('userID').value;
    let fullname = document.getElementById('fullName').value;
    let username = document.getElementById('userName').value;
    let password = document.getElementById('password').value;
    let email = document.getElementById('email').value;
    let address = document.getElementById('address').value;
    let registrationDate = document.getElementById('registrationDate').value;
    let status = document.getElementById('status').value;
    let phone = document.getElementById('phone').value;
    let file = document.getElementById('image').files[0];

    if (fullname === '' || username === '' || password === '' || email === '' || address === '' || status === '' || !file || phone === '') {
        swal.fire(
            'Thiếu thông tin!',
            'Vui lòng điền đầy đủ thông tin và chọn một file trước khi nhấn Thêm!',
            'error'
        );
    } else {
        let formData = new FormData();
        formData.append('userID',UserID);
        formData.append('fullname', fullname);
        formData.append('username', username);
        formData.append('password', password);
        formData.append('email', email);
        formData.append('address', address);
        formData.append('extratime', registrationDate);
        formData.append('status', status);
        formData.append('file', file);
        formData.append('phone', phone);


        let xhr = new XMLHttpRequest();
        xhr.open('POST', './Controller/Update_StaffController.php', true);
        xhr.onload = () => {
            if (xhr.status === 200) {
                let response;
                try {
                    response = JSON.parse(xhr.responseText);
                } catch (error) {
                    response = { check: false, message: 'Phản hồi từ server không hợp lệ!' };
                }
                if (response.check) {
                    swal.fire({
                        title: 'Thành công!',
                        text: `Sửa thành công nhân viên ${fullname}!`,
                        icon: 'success'
                    }).then(()=>{
                        window.location.assign('admin_staff.php');
                    });
                } else {
                    swal.fire({
                        title: 'Thất bại!',
                        text: `Nhân viên ${fullname} không được sửa: ${response.message}`,
                        icon: 'error'
                    });
                }
            } else {
                swal.fire({
                    title: 'Thất bại!',
                    text: 'Lỗi máy chủ!',
                    icon: 'error'
                });
            }
        };
        xhr.onerror = () => {
            swal.fire({
                title: 'Lỗi!',
                text: 'Có lỗi xảy ra khi gửi yêu cầu!',
                icon: 'error'
            });
        };
        xhr.ontimeout = () => {
            swal.fire({
                title: 'Lỗi!',
                text: 'Yêu cầu đã vượt quá thời gian chờ!',
                icon: 'error'
            });
        };
        xhr.send(formData);
    }
});
</script>