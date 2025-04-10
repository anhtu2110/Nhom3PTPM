<form>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề">
        </div>
        <div class="col-md-4">
            <label for="content" class="form-label">Nội dung:</label>
            <textarea class="form-control" id="content" rows="3" placeholder="Nhập nội dung"></textarea>
        </div>
        <div class="col-md-4">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="position" class="form-label">Vị trí:</label>
            <input type="text" class="form-control" id="position" placeholder="Nhập vị trí">
        </div>
        <div class="col-md-4">
            <label for="status" class="form-label">Trạng thái:</label>
            <select class="form-select" id="status">
                <option value="1">Đã xuất bản</option>
                <option value="2">Bản nháp</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="level" class="form-label">Cấp bậc:</label>
            <input type="number" class="form-control" id="level" placeholder="Nhập cấp bậc">
        </div>
    </div>
</form>
<div class="row">
        <div class="col d-grid">
            <button type="submit" class="btn btn-primary"id="add_decor">Thêm</button>
        </div>
    </div>
    <script>
    document.getElementById('add_decor').addEventListener('click', (e) => {
    e.preventDefault();
    let title = document.getElementById('title').value;
    let content = document.getElementById('content').value;
    let image = document.getElementById('image').files[0];
    let position = document.getElementById('position').value;
    let status = document.getElementById('status').value;
    let level = document.getElementById('level').value;


    if (title === '' || content === '' || image === '' || position === '' || status === '' || level === '') {
        swal.fire(
            'Thiếu thông tin!',
            'Vui lòng điền đầy đủ thông tin và chọn một file trước khi nhấn Thêm!',
            'error'
        );
    } else {
        let formData = new FormData();
        formData.append('title', title);
        formData.append('content', content);
        formData.append('image', image);
        formData.append('position', position);
        formData.append('status', status);
        formData.append('level', level);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', './Controller/Add_DecorController.php', true);
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
                        text: `Thêm thành công ${title} vào cơ sở dữ liệu!`,
                        icon: 'success'
                    }).then(()=>{
                        window.location.href = 'admin_decor.php';
                    })
                } else {
                    swal.fire({
                        title: 'Thất bại!',
                        text: `${title} không thêm vào cơ sở dữ liệu: ${response.message}`,
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