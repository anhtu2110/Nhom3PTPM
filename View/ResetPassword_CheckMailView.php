<style>
#verification_code {
    background: none;
    border: none;
}

input::placeholder {
    color: black;
}
</style>
<div class="col-md-9">
    <form action="">
        <div class="mt-3">
            <div class="username d-flex">
                <i class="fa-regular fa-envelope my-auto"></i>
                <input type="email" id="email" name="email" class="no-border" placeholder="Nhập Email..." required>
                <button class="btn btn-outline-dark btn-sm" style="width:100px" id='change_password'>
                    Lấy mã</button>
            </div>
            <hr class='mt-1'>
            <div class="username d-flex mt-3">
                <i class="fa-solid fa-unlock-keyhole my-auto"></i>
                <input type="text" id="verification_code" name="verification_code" class="no-border"
                    placeholder="Nhập mã có trong Email..." required>
            </div>
            <hr>
        </div>
        <a href="login.html" class="d-flex justify-content-end">Quay lại đăng nhập?</a>
        <br>
        <div class="d-grid">
            <button type="button" class="btn btn-outline-dark" id='update_password'>
                Lấy lại mật khẩu</button>
        </div>
        <div class="regisn d-flex justify-content-center">
            <p class="mt-2 ">Chưa có tài khoản ?</p>
            <a href="regisn.php" class="chuyen-regisn">Đăng ký ngay</a>
        </div>
    </form>
</div>

<script>
function getCount_EndCode() {
    const input = document.getElementById('verification_code');
    let count = 59;
    const interval = setInterval(() => {
        input.placeholder = `Thời gian mã còn (${count})s`;
        count--;

        if (count == 0) {
            clearInterval(interval);
            input.placeholder = 'Nhập mã có trong Email...';
        }
    }, 1000);
}

document.getElementById('change_password').addEventListener('click', (e) => {
    e.preventDefault();
    let email = document.getElementById('email').value;
    if (email === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Vui lòng nhập Email!',
        });
        return;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email không hợp lệ!',
        });
        return;
    }
    document.getElementById('change_password').innerHTML =
        '<div class="sniper d-flex"><span class="spinner-grow spinner-grow-sm p-1"></span><span class="spinner-grow spinner-grow-sm p-1"></span><span class="spinner-grow spinner-grow-sm p-1"></span></div>';
    setTimeout(() => {
        document.getElementById('change_password').innerHTML = 'Lấy mã';
    }, 60000);
    let formData = new FormData();
    formData.append('email', email);

    fetch('http://192.168.126.128:80/Nhom3PTPM/Controller/ResetPasswordController.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                getCount_EndCode();
                let formDatas = new FormData();
                formDatas.append('email', email);
                return fetch('./Controller/Code_MailResetPassword.php', {
                    method: 'POST',
                    body: formDatas
                });
            } else {
                throw new Error('Email không tồn tại!');
            }
        })
        .then(() => {
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: 'Mã đã được gửi đến Email của bạn!',
            });
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error.message,
            });
        });
});
document.getElementById('update_password').addEventListener('click', (e) => {
    e.preventDefault();

    let email = document.getElementById('email').value;
    let verification_code = document.getElementById('verification_code').value;
    if (verification_code === '' || email === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Vui lòng nhập đầy đủ thông tin!',
        });
        return;
    }

    let formSend = new FormData();
    formSend.append('email', email);
    formSend.append('verification_code', verification_code);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://192.168.126.128:80/Nhom3PTPM/Controller/Check_CodePasswordController.php',
        true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            try {
                let data = JSON.parse(xhr.responseText);
                if (data.check) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Mã xác minh chính xác, bấm OK để chuyển hướng thay Password mới!',
                    }).then(() => {
                        window.location.href = 'new_password.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Mã xác nhận không chính xác!',
                    });
                }
            } catch (e) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Có lỗi xảy ra khi xử lý phản hồi từ máy chủ!' + e,
                });
            };
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Có lỗi xảy ra trong quá trình gửi yêu cầu!',
            });
        }
    };

    xhr.onerror = function() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Không thể kết nối đến máy chủ!',
        });
    };

    xhr.send(formSend);
});
</script>