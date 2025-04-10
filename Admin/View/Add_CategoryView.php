<form>
    <div class="row mb-3">
        <div class="col">
            <label for="categoryName" class="form-label">Tên thể loại:</label>
            <input type="text" class="form-control" id="categoryName" placeholder="Nhập tên thể loại">
        </div>
    </div>

</form>
<div class="row">
    <div class="col d-grid">
        <button type="submit" class="btn btn-primary" id = 'add_category'>Thêm</button>
    </div>
</div>
<script>
    document.getElementById('add_category').addEventListener('click',function(e){
        e.preventDefault();

        let Title = document.getElementById('categoryName').value;

        if(Title === ''){
            swal.fire(
                'Thiếu thông tin!',
                'Vui lòng nhập đủ thông tin rồi mới gửi!',
                'question'
            );
        }else{
            let formData = new FormData();
        formData.append('title',Title);

        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/Add_CategoryController.php');
        xhr.onload = ()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.response);
                if(response.check){
                    swal.fire({
                        title : 'Thành công!',
                        text : response.message,
                        icon : 'success'
                    }).then(()=>{
                        window.location.assign('admin_category.php');
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