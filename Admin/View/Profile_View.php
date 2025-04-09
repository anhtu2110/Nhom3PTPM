<style>
    .avt_profile img {
        border: solid 1px black;
        width: 250px;
        height: 250px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>
<div class="container d-flex">
    <div class="row mt-5 profile justify-content-center my-auto p-5">
        <div class="col-3">
            <div class="avt_profile d-flex">
                <?php
                require_once './Controller/Profile_Controller.php';
                $userid = $_SESSION['is_admin'];
                $conn = new Profile_Controller();
                $results = $conn->DisplayProfile_Controller($userid);
                foreach ($results as $result) :
                ?>
                    <img src="<?php echo $result['Image']; ?>" alt="" class="mx-auto">
            </div>

            <h5 class="text-center mt-3">Thay đổi ảnh? Vui lòng nhập file dưới dạng JPG,..</h5>
            <div class="btn_update">
                <input type="file" name='upload' id="uplaod">
                <div class="d-grid">
                    <button class="btn btn-primary mt-3 mb-2" id="btn-update_avt">Update Ảnh</button>
                </div>
            </div>
        </div>
        <div class="col-7 information">
            <h1 class="text-center mt-2">
                Thông tin cá nhân
            </h1>
            <form action="">
                <div class="row">

                    <div class="col-6 mb-3 mt-3">
                        <label for="">Họ và tên:</label>
                        <input type="text" class="form-control" id="fullname" placeholder="" value="<?php echo isset($result['Title']) ? $result['Title'] : ''; ?>" name="email">
                    </div>
                    <div class="col-6 mb-3 mt-3">
                        <label for="">Số điện thoại:</label>
                        <input type="text" class="form-control" id="phone" placeholder="" value="<?php echo $result['Phone_Number']; ?>" name="email">
                    </div>
                    <div class="col-6 mb-3 mt-3">
                        <label for="">UserName:</label>
                        <input type="text" class="form-control" id="username" placeholder="" value="<?php echo $result['UserName']; ?>" name="email" readonly>
                    </div>
                    <div class="col-6 mb-3 mt-3">
                        <label for="">Mật khẩu:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" placeholder="" value="<?php echo $result['Password']; ?>" name="password">
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <script>
                        document.getElementById('togglePassword').addEventListener('click', function() {
                            var passwordInput = document.getElementById('password');
                            if (passwordInput.type === 'password') {
                                passwordInput.type = 'text';
                                this.innerHTML = '<i class="fa-solid fa-lock"></i>';
                            } else {
                                passwordInput.type = 'password';
                                this.innerHTML = '<i class="fa-regular fa-eye"></i>';
                            }
                        });
                    </script>

                    <div class="col-6 mb-3 mt-3">
                        <label for="">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="" value="<?php echo $result['Email']; ?>" name="email">
                    </div>
                    <div class="col-6 mb-3 mt-3">
                        <label for="">Quyền:</label>
                        <?php
                        if (isset($result['IDRole']) && $result['IDRole'] == 1) {
                            $quyen = 'Admin';
                        }
                        ?>
                        <input type="text" class="form-control" id="role" placeholder="" value="<?php echo $quyen; ?>" name="email" readonly>
                    </div>
                </div>
            <?php endforeach; ?>
            </form>
            <div class="d-grid mb-3">
                <button class="btn btn-success" id="update_profile">Cập nhật trang cá nhân</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('btn-update_avt').addEventListener('click', (e) => {
        e.preventDefault();
        let file = document.getElementById('uplaod').files[0];
        let formData6 = new FormData();
        formData6.append('file', file);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', './Controller/UpdateAvt_Controller.php', true);
        xhr.onload = () => {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.check) {
                    swal.fire({
                        title: 'Thành công',
                        text: response.message,
                        icon: 'success'
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    swal.fire(
                        'Thất bại',
                        'Có lỗi trong quá trình Uploads Avatar',
                        'error'
                    );
                }
            } else {
                swal.fire(
                    'Thất bại',
                    'Máy chủ không phản hồi',
                    'error'
                );
            }
        }
        xhr.send(formData6);
    });

    document.getElementById('update_profile').addEventListener('click', (e) => {
        e.preventDefault();
        let formData7 = [];

        let fullname = document.getElementById('fullname').value;
        let email = document.getElementById('email').value;
        let phone_number = document.getElementById('phone').value;
        let password = document.getElementById('password').value;
        formData7 = [{
            fullname: fullname,
            email: email,
            phone: phone_number,
            password: password
        }];

        console.log(formData7);
        let xhr2 = new XMLHttpRequest();
        xhr2.open('POST', './Controller/Update_ProfileController.php', true);
        xhr2.onload = () => {
            if (xhr2.status === 200) {
                let reponses = JSON.parse(xhr2.responseText);
                if (reponses.check) {
                    swal.fire({
                        title: 'Thành công!',
                        text: reponses.message,
                        icon: 'success'
                    });
                } else {
                    swal.fire({
                        title: 'Thất bại!',
                        text: reponses.message,
                        icon: 'error'
                    });
                }
            } else {
                swal.fire({
                    title: 'Thất bại!',
                    text: 'Không nhận được thông tin từ máy chủ',
                    icon: 'error'
                });
            }
        }
        xhr2.send(JSON.stringify(formData7));
    });
</script>