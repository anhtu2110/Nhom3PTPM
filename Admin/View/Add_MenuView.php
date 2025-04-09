<form>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề">
        </div>
        <div class="col-md-4">
            <label for="status" class="form-label">Trạng thái:</label>
            <select class="form-select" id="status">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="level" class="form-label">Cấp bậc:</label>
            <input type="number" class="form-control" id="level" placeholder="Nhập cấp bậc">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="menu" class="form-label">Thuộc Menu:</label>
            <input type="text" class="form-control" id="menu" placeholder="Nhập thuộc menu">
        </div>
        <div class="col-md-4">
            <label for="order" class="form-label">Thứ tự:</label>
            <input type="number" class="form-control" id="order" placeholder="Nhập thứ tự">
        </div>
        <div class="col-md-4">
            <label for="path" class="form-label">Đường dẫn:</label>
            <input type="text" class="form-control" id="path" placeholder="Nhập đường dẫn">
        </div>
    </div>
    <div class="row">
        <div class="col d-grid">
            <button type="submit" class="btn btn-primary"id="add_menu">Thêm</button>
        </div>
    </div>
</form>
<script>
    document.getElementById('add_menu').addEventListener('click',function(e){
        e.preventDefault();

        let Title = document.getElementById('title').value;
        let IsActive = document.getElementById('status').value;
        let Levels = document.getElementById('level').value;
        let ParentID = document.getElementById('menu').value;
        let MenuOrder = document.getElementById('order').value;
        let Link = document.getElementById('path').value;

        if(Title === '' || IsActive ==='' || Levels === ''|| ParentID === '' || MenuOrder === '' || Link === ''){
            swal.fire(
                'Thiếu thông tin!',
                'Vui lòng nhập đủ thông tin rồi mới gửi!',
                'question'
            );
        }else{
            let formData = new FormData();
        formData.append('Title',Title);
        formData.append('IsActive',IsActive);
        formData.append('Levels',Levels);
        formData.append('ParentID',ParentID);
        formData.append('MenuOrder',MenuOrder);
        formData.append('Link',Link);

        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/Add_MenuController.php');
        xhr.onload = ()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.response);
                if(response.check){
                    swal.fire({
                        title : 'Thành công!',
                        text : response.message,
                        icon : 'success'
                    }).then(()=>{
                        window.location.assign('admin_menu.php');
                    });
                }else{
                    swal.fire({
                        title : 'Thất bại!',
                        text : response.message,
                        icon : 'error'
                    });
                }
            }else{
                swal.fire({
                        title : 'Thất bại!',
                        text : response.message,
                        icon : 'error'
                    });
            }
        }
        xhr.send(formData);
        }
    })
</script>