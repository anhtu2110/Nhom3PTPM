<form id="loginForm">
    <div class="mt-3">
        <div class="username d-flex">
            <i class="fa-regular fa-user my-auto"></i>
            <input type="text" id="username" name="username" class="no-border" placeholder="UserName..." required>
        </div>
        <hr>
    </div>
    <div class="mt-3">
        <i class="fa-solid fa-key"></i>
        <input type="password" id="password" name="password" class="no-border" placeholder="PassWord..." required>
        <hr>
    </div>
    <!-- <a href="resetPW.php" class="d-flex justify-content-end">Bạn quên mật khẩu?</a> -->
    <br>
    <div class="d-grid">
        <button type="submit" class="btn btn-outline-dark" id="check-login">Đăng nhập</button>
    </div>
    <div class="regisn d-flex justify-content-center">
        <p class="mt-2 ">Chưa có tài khoản ?</p>
        <a href="regisn.php" class="chuyen-regisn">Đăng ký ngay</a>
    </div>
</form>

<script>
document.getElementById('check-login').addEventListener('click', function(event) {
    event.preventDefault();
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://192.168.126.128:80/Nhom3PTPM/Controller/LoginController.php', true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            let response = JSON.parse(xhr.responseText);
            if (response.success) {
                swal.fire(
                    'Đăng nhập thành công',
                    'Chúc bạn một ngày tốt lành',
                    'success'
                ).then(() => {
                    window.location.replace('index.php');
                });
            } else {
                swal.fire(
                    'Đăng nhập thất bại',
                    'Tài khoản hoặc mật khẩu không đúng',
                    'error'
                );
            }
        }
    }
    xhr.send(formData);
});
</script>