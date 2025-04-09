<form id="registerForm">
    <div class="mb-2">
        <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" required>
    </div>
    <div class="mb-2">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
    <div class="mb-2">
        <input type="text" class="form-control" name="phone" placeholder="Phone" required>
    </div>
    <div class="mb-2">
        <input type="text" class="form-control" name="username" placeholder="UserName" required>
    </div>
    <div class="mb-2">
        <input type="password" class="form-control" name="password" placeholder="Mật Khẩu" required>
    </div>
    <div class="mb-2">
        <input type="password" class="form-control" name="password2" placeholder="Nhập lại mật khẩu" required>
    </div>
    <div class="mb-2">
        <input type="text" class="form-control" name="address" placeholder="Địa chỉ" required>
    </div>
    <input type="hidden" name="current_date_time" value="<?php echo date('Y-m-d H:i:s'); ?>">
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Đăng Kí</button>
    </div>
</form>
<script>
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://192.168.126.128:80/Nhom3PTPM/Controller/Regisncontroller.php', true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Đăng ký thành công!',
                    text: response.message,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = './login.php';
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message,
                    confirmButtonText: 'OK'
                });
            }
        }
    };
    xhr.onerror = function() {
        console.error('Có lỗi xảy ra khi gửi yêu cầu đăng ký.');
    };
    xhr.send(formData);
});
</script>