<?php require_once './Controller/Admin_BlogController.php';
    $controller = new Admin_BlogController();
    $blogID = $_GET['blog_id'];
    $result = $controller->Display_BlogControllers($blogID);
?>

<form>
    <div class="row mb-3">
        <div class="col">
            <?php
            foreach($result as $blogItem):
            ?>
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" value="<?php echo $blogItem['Title'];?>" id="title" placeholder="Nhập tiêu đề">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="content" class="form-label">Nội dung:</label>
            <textarea class="form-control" id="content" rows="5" placeholder="Nhập nội dung"><?php echo $blogItem['Content'];?></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="status" class="form-label">Trạng thái:</label>
            <select class="form-select" id="status">
                <option value="1">Đã xuất bản</option>
                <option value="0">Chưa xuất bản</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="date" class="form-label">Ngày đăng:</label>
            <input type="date" class="form-control" value="<?php echo $blogItem['DateOfWriting'];?>" id="date">
        </div>
        <input type="hidden" id="blog_id" value="<?php echo $blogItem['BlogID'];?>">
    </div>
    <?php endforeach;?>
</form>
<div class="row">
        <div class="col d-grid">
            <button type="button"id="update_blog" class="btn btn-primary">Sửa</button>
        </div>
    </div>

<script>
     document.getElementById('update_blog').addEventListener('click',(e)=>{
        e.preventDefault();

        let BlogID = document.getElementById('blog_id').value;
        let title = document.getElementById('title').value;
        let content = document.getElementById('content').value;
        let image = document.getElementById('image').files[0];
        let status = document.getElementById('status').value;
        let dateup = document.getElementById('date').value;

       if(title === '' || content === '' || image === undefined || status ==='' || dateup ==='' || BlogID ===''){
        swal.fire(
            'Lỗi',
            'Vui lòng nhập đầy đủ thông tin',
            'error'
        );
       }else{
        let formData = new FormData();
        formData.append('blogid',BlogID);
        formData.append('title',title);
        formData.append('content',content);
        formData.append('file',image);
        formData.append('status',status);
        formData.append('date',dateup);

        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/UpDate_BlogController.php',true);
        xhr.onload = ()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.responseText);
                if(response.check){
                    swal.fire({
                        title : 'Thành công!',
                        text : response.message,
                        icon : 'success'
                    }).then(()=>{
                        window.location.assign('Admin_blog.php');
                    });
                }else{
                    swal.fire({
                        title: 'Thất bại!',
                        text : response.message,
                        icon : 'error'
                    });
                }
            }else{
                    swal.fire({
                        title: 'Thất bại!',
                        text : response.message,
                        icon : 'error'
                    });
                }
        }
        xhr.send(formData);
       }
    });
</script>