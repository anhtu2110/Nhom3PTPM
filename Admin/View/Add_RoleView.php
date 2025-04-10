<form>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="roleName" class="form-label">Tên Quyền:</label>
            <input type="text" class="form-control" id="roleName" placeholder="Nhập tên quyền">
        </div>
    </div>
    
</form>
<div class="row">
        <div class="col d-grid">
            <button type="submit" class="btn btn-primary" id="add_role">Thêm</button>
        </div>
    </div>
    <script>
    document.getElementById('add_role').addEventListener('click', (e) => {
    e.preventDefault();
    let role = document.getElementById('roleName').value;

    if (role==='') {
        swal.fire(
            'Thiếu thông tin!',
            'Vui lòng điền đầy đủ thông tin và chọn một file trước khi nhấn Thêm!',
            'error'
        );
    } else {
        let formData = new FormData();
        formData.append('role', role);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', './Controller/Add_RoleController.php', true);
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
                        text: `Thêm thành công quyền ${role} vào cơ sở dữ liệu!`,
                        icon: 'success'
                    }).then(()=>{
                        window.location.href = 'admin_role.php';
                    })
                } else {
                    swal.fire({
                        title: 'Thất bại!',
                        text: `quyền ${role} không thêm vào cơ sở dữ liệu: ${response.message}`,
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