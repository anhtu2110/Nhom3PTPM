<?php
require_once './Controller/ProfileController.php';
if (!isset($_SESSION['staffID'])) {
    echo "No staff ID found in session.";
    exit;
}

$UserID = $_SESSION['staffID'];
$controller = new Profile_Controller();
$result = $controller->Show_ProfileStaffs($UserID);
if (!$result) {
    echo "No profile found for the given staff ID.";
    exit;
}
?>
<div class="row mt-5 form_profile pt-5">
    <div class="col-md-4 image-container">
        <img src="<?php echo htmlspecialchars('./'.$result['Image']); ?>" class="mt-1" alt="">
        <h4 class="text-center mt-2"><?php echo htmlspecialchars($result['Title']); ?></h4>
        <p class="text-center"><?php echo htmlspecialchars($result['Email']); ?></p>
        <div class="form_update d-flex mb-2">
            <input class="form-control" type="file"id='file'>
            <button class="btn btn-success btn-them">Thêm</button>
        </div>
    </div>
    <div class="col-md-7 m-1">
        <h3>Thông tin cá nhân</h3>
        <form>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">Họ và tên:</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($result['Title']); ?>" id="title" name="title">
                </div>
                <div class="form-group col-md-6">
                    <label for="username">Tên người dùng:</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($result['UserName']); ?>" id="Username" name="username">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6" style="height: auto;">
                    <label for="password">Mật khẩu:</label>
                    <div class="form_password d-flex">
                        <input type="password" class="form-control m-0" value="<?php echo htmlspecialchars($result['Password']); ?>" id="Password" style="height: 41.6px;" name="password">
                        <span class="my-auto m-2 thaydoi"><i class="fa-regular fa-eye my-auto" id="view"></i></span>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" value="<?php echo htmlspecialchars($result['Email']); ?>" id="Email" name="email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="phone_number">Số điện thoại:</label>
                    <input type="tel" class="form-control" value="<?php echo htmlspecialchars($result['Phone_Number']); ?>" id="phone_number" name="phone_number">
                </div>
                <div class="form-group col-md-12">
                    <label for="address">Địa chỉ:</label>
                    <textarea class="form-control" id="address" name="address"><?php echo htmlspecialchars($result['Address']); ?></textarea>
                </div>
            </div>
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary" id='Update_Profile'>Cập nhật trang cá nhân</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.querySelector('.btn-them').addEventListener('click',(e)=>{
        e.preventDefault();
        let file = document.getElementById('file').files[0];
        let IDStaff = <?php echo $UserID; ?>;
        if(!document.getElementById('file').files[0]){
            swal.fire(
                'Thất bại',
                'Vui lòng chọn ảnh đại diện',
                'error'
            );
            return;
        }
        let formData = new FormData();
        formData.append('file', file);
        formData.append('IDStaff', IDStaff);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', './Controller/ProfileController.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.check) {
                    swal.fire(
                        'Thành công',
                        'Cập nhật ảnh đại diện thành công',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                } else {
                    swal.fire(
                        'Thất bại',
                        response.message,
                        'error'
                    );
                }
            }
        }
        xhr.send(formData);
    });
    document.getElementById('Update_Profile').addEventListener('click',(e)=>{
        e.preventDefault();

        let title = document.getElementById('title').value;
        let username = document.getElementById('Username').value;
        let password = document.getElementById('Password').value;
        let email = document.getElementById('Email').value;
        let phone_number = document.getElementById('phone_number').value;
        let address = document.getElementById('address').value;
        let IDStaff = <?php echo $UserID; ?>;
        let formData = new FormData();
        formData.append('title', title);
        formData.append('username', username);
        formData.append('password', password);
        formData.append('email', email);
        formData.append('phone_number', phone_number);
        formData.append('address', address);
        formData.append('IDStaff', IDStaff);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', './Controller/Update_profileController.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.check) {
                    swal.fire(
                        'Thành công',
                        'Cập nhật thông tin cá nhân thành công',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                } else {
                    swal.fire(
                        'Thất bại',
                        response.message,
                        'error'
                    );
                }
            }
        }
        xhr.send(formData);
    });

</script>
