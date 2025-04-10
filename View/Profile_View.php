<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/TestCNPM/Controller/Profile_Controller.php';
$controller = new Profile_Controller();
$userID = $_GET['profile_id'];
$result = $controller->Show_Profile($userID);
$row = $result->fetch_assoc();
?>
<div class="row mt-5 form_profile pt-5">
    <div class="col-md-4 m-1">
        <img src="<?php echo $row['Image'];?>" class='mt-2' alt="">
        <h4 class="text-center mt-4"><?php echo $row['Title'];?></h4>
        <p class="text-center">Email : <?php echo $row['Email'];?></p>
        <div class="form_update d-flex mb-2">
            <input class='form-control' type="file" id='file'>
            <button class="btn btn-success btn-them" id='update_file'>Thêm</button>
        </div>
    </div>
    <div class="col-md-7 m-1">
        <h3>Thông tin cá nhân</h3>
        <form>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">Họ Tên :</label>
                    <input type="text" class="form-control" value="<?php echo $row['Title'];?>" id="title" name="title">
                </div>
                <div class="form-group col-md-6">
                    <label for="username">Tên người dùng:</label>
                    <input type="text" class="form-control" value="<?php echo $row['UserName'];?>" id="Username"
                        name="username">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6" style="height: auto;">
                    <label for="password">Mật khẩu (Lưu trữ dưới dạng mã hóa):</label>
                    <div class="form_password d-flex">
                        <input type="password" class="form-control m-0" value="<?php echo $row['Password'];?>"
                            id="Password" style="height: 41.6px;" name="password">
                        <span class="my-auto m-2 thaydoi"><i class="fa-regular fa-eye my-auto" id="view"></i></span>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" value="<?php echo $row['Email'];?>" id="Email"
                        name="email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="phone_number">Số điện thoại:</label>
                    <input type="tel" class="form-control" id="phone_number" value="<?php echo $row['Phone_Number'];?>"
                        name="phone_number">
                </div>
                <div class="form-group col-md-12">
                    <label for="address">Địa chỉ:</label>
                    <textarea class="form-control" id="address" name="address"><?php echo $row['Address'];?></textarea>
                </div>
            </div>

        </form>
        <div class="d-grid mt-3">
            <button type="button" class="btn btn-primary" id='update_information'>Cập nhật trang cá nhân</button>
        </div>
    </div>
</div>
<script>
document.getElementById('update_information').addEventListener('click', (e) => {
    e.preventDefault();
    let title = document.getElementById('title').value;
    let username = document.getElementById('Username').value;
    let password = document.getElementById('Password').value;
    let email = document.getElementById('Email').value;
    let phone_number = document.getElementById('phone_number').value;
    let address = document.getElementById('address').value;
    let UserID = <?php echo $userID?>;

    let formDatas = new FormData();

    formDatas.append('title', title);
    formDatas.append('username', username);
    formDatas.append('password', password);
    formDatas.append('email', email);
    formDatas.append('phone_number', phone_number);
    formDatas.append('address', address);
    formDatas.append('UserID', UserID);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://192.168.126.128:80/TestCNPM/Controller/Update_ProfileController.php', true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let response = JSON.parse(xhr.responseText);
            if (response.check) {
                swal.fire({
                    title: 'Thành công',
                    text: response.message,
                    icon: 'success',
                }).then(() => {
                    location.reload();
                });
            } else {
                swal.fire({
                    title: 'Lỗi',
                    text: response.message,
                    icon: 'error',

                });
            }
        }
    }
    xhr.send(formDatas);

});
document.getElementById('update_file').addEventListener('click', (e) => {
    e.preventDefault();
    let file = document.getElementById('file').files[0];
    let UserID = <?php echo $userID?>;
    if (document.getElementById('file').files.length == 0) {
        swal.fire(
            'Lỗi',
            'Vui lòng chọn ảnh trước khi bấm!',
            'error'
        )
    } else {
        let formData = new FormData();
        formData.append('file', file);
        formData.append('UserID', UserID);


        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://192.168.126.128:80/Nhom3PTPM/Controller/Profile_Controller.php', true);
        xhr.onload = function() {
            if (xhr.status == 200) {
                let responses = JSON.parse(xhr.responseText);
                if (responses.status) {
                    swal.fire({
                        title: 'Thành công',
                        text: responses.message,
                        icon: 'success',
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    swal.fire({
                        title: 'Lỗi',
                        text: responses.message,
                        icon: 'error',

                    });
                }
            }
        }
        xhr.send(formData);
    }
});
</script>