<form action="">
    <div class="mt-5">
        <i class="fa-solid fa-user"></i>
        <input type="text" name="UserName" id="UserName" class="no-border" placeholder="Tên tài khoản">
    </div>
    <hr>
    <div class="mt-5 mb-1 ">
        <i class="fa-solid fa-key"></i>
        <input type="password" name="password" id="password" class="no-border" placeholder="Mật khẩu">
    </div>
    <hr>
    <!-- <a href="resetpasword.php" class="d-flex justify-content-end text-dark mt-2">Quên mật khẩu?</a> -->

</form>
<div class="d-grid mt-4">
    <button type="button" class="btn btn-secondary" id="login-btn">Đăng Nhập</button>
</div>
<script>
document.getElementById('login-btn').addEventListener('click', (e) => {
    e.preventDefault();

    let username = document.getElementById('UserName').value;
    let password = document.getElementById('password').value;

    let formData = {
        username: username,
        password: password
    };

    let xhr = new XMLHttpRequest();
    xhr.open('POST', './Controller/CheckLoginController.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = () => {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
            let response = JSON.parse(xhr.responseText);
            if (response.check) {
                swal.fire(
                    'Thành công!',
                    'Chúc bạn một ngày tốt lành!',
                    'success'
                ).then(() => {
                    window.location.assign('index.php');
                });
            } else {
                swal.fire({
                    title: 'Lỗi đăng nhập!',
                    text: response.message,
                    icon: 'error'
                });
            }
        } else {
            swal.fire(
                'Có lỗi xảy ra!',
                'Có lỗi xảy ra trong quá trình đăng nhập Admin',
                'error'
            );
        }
    };
    xhr.send(JSON.stringify(formData));
});
</script>