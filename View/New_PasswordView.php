<style>
#password2 {
    background: none;
    border: none;
}
</style>
<div class="col-md-9">
    <form action="">
        <div class="mt-3">
            <div class="username d-flex">
                <i class="fa-solid fa-lock my-auto" style="margin-right: 5px;"></i>
                <input type="password" id="password" name="username" class="no-border"
                    placeholder="Nhập mật khẩu mới..." required>
            </div>
            <hr>
            <div class="username d-flex mt-4">
                <i class="fa-solid fa-lock my-auto" style="margin-right: 5px;"></i>
                <input type="password" id="password2" name="username" class="no-border"
                    placeholder="Nhập lại mật khẩu mới..." required>
            </div>
            <hr>
        </div>
        <a href="login.php" class="d-flex justify-content-end">Quay lại đăng nhập?</a>
        <br>

    </form>
    <div class="d-grid">
        <button type="button" class="btn btn-outline-dark" id='change_pass'>Lấy lại mật khẩu</button>
    </div>
    <div class="regisn d-flex justify-content-center">
        <p class="mt-2 ">Chưa có tài khoản ?</p>
        <a href="regisn.php" class="chuyen-regisn">Đăng ký ngay</a>
    </div>
</div>
<script>
document.getElementById('change_pass').addEventListener('click', (e) => {
    e.preventDefault();

    let password = document.getElementById('password').value;
    let password2 = document.getElementById('password2').value;
    let email = '<?php echo $_SESSION['Password_Email'];?>';

    if (password !== password2) {
        Swal.fire({
            icon: 'error',
            title: 'Mật khẩu không khớp',
            text: 'Vui lòng nhập lại mật khẩu',
        });
        return;
    }
    let formData = new FormData();
    formData.append('password', password);
    formData.append('email', email);

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let result = JSON.parse(xhr.responseText);
            if (result.status) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: 'Mật khẩu đã được thay đổi',
                }).then(() => {
                    window.location.href = 'login.php';
                });

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Thất bại',
                    text: 'Mật khẩu không thể thay đổi',
                });
            }
        }
    }
    xhr.open('POST', 'http://192.168.126.128:80/Nhom3PTPM/Controller/New_Password.php', true);
    xhr.send(formData);
});
</script>