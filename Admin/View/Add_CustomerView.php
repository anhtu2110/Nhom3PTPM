<form>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="fullName" class="form-label">Họ tên:</label>
            <input type="text" class="form-control" id="fullName" placeholder="Nhập họ tên">
        </div>
        <div class="col-md-4">
            <label for="userName" class="form-label">UserName:</label>
            <input type="text" class="form-control" id="username" placeholder="Nhập userName">
        </div>
        <div class="col-md-4">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Nhập password">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập email">
        </div>
        <div class="col-md-4">
            <label for="address" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ">
        </div>
        <div class="col-md-4">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="fullName" class="form-label">Số điện thoại:</label>
            <input type="text" class="form-control" id="phone" placeholder="Nhập SDT">
        </div>
        <div class="col-md-4">
            <label for="registrationDate" class="form-label">Ngày đăng kí:</label>
            <input type="date" class="form-control" id="registrationDate" value="<?php echo date('Y-m-d');?>">
        </div>
        <div class="col-md-4">
            <label for="status" class="form-label">Trạng thái:</label>
            <select class="form-select" id="status">
                <option value="1">Hoạt động</option>
                <option value="2">Không hoạt động</option>
            </select>
        </div>
    </div>

</form>
<div class="row">
    <div class="col d-grid">
        <button type="submit" class="btn btn-primary"id="add_customer">Thêm</button>
    </div>
</div>
<script>
    document.getElementById('add_customer').addEventListener('click', (e) => {
    e.preventDefault();
    let fullname = document.getElementById('fullName').value;
    let username = document.getElementById('username').value;
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
        xhr.open('POST', './Controller/Add_CustomerController.php', true);
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
                        text: `Thêm thành công nhân viên ${fullname} vào cơ sở dữ liệu!`,
                        icon: 'success'
                    }).then(()=>{
                        window.location.assign('admin_customer.php');
                    });
                } else {
                    swal.fire({
                        title: 'Thất bại!',
                        text: `Nhân viên ${fullname} không thêm vào cơ sở dữ liệu: ${response.message}`,
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