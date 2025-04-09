
<?php require_once './Controller/Admin_DecorController.php';
    $decor_id = $_GET['decor_id'];
    $decor = new Admin_DecorController();
    $result = $decor->ShowDecor($decor_id);

?>
<form>
    <?php foreach($result as $item):?>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" value="<?php echo $item['Title'];?>" id="title" placeholder="Nhập tiêu đề">
        </div>
        <div class="col-md-4">
            <label for="content" class="form-label">Nội dung:</label>
            <textarea class="form-control" id="content" rows="3" placeholder="Nhập nội dung"><?php echo $item['Content'];?></textarea>
        </div>
        <div class="col-md-4">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="position" class="form-label">Vị trí:</label>
            <input type="text" class="form-control"value="<?php echo $item['DecorOder'];?>" id="position" placeholder="Nhập vị trí">
        </div>
        <div class="col-md-4">
            <label for="status" class="form-label">Trạng thái:</label>
            <select class="form-select" id="status">
                <option value="1">Đã xuất bản</option>
                <option value="0">Bản nháp</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="level" class="form-label">Cấp bậc:</label>
            <input type="number"value="<?php echo $item['Levels'];?>" class="form-control" id="level" placeholder="Nhập cấp bậc">
        </div>
    </div>
    <?php endforeach;?>
</form>
<div class="row">
        <div class="col d-grid">
            <button type="submit" class="btn btn-primary"id="update_decor">Sửa</button>
        </div>
</div>
<script>
    document.getElementById('update_decor').addEventListener('click',function(){

        var title = document.getElementById('title').value;
        var content = document.getElementById('content').value;
        if(document.getElementById('image').files[0]){
            var image = document.getElementById('image').files[0];
        }else{
            var image = '<?php echo $item['Image']?>';
             }
        var position = document.getElementById('position').value;
        var status = document.getElementById('status').value;
        var level = document.getElementById('level').value;
            
        var FormDatas = new FormData();
        FormDatas.append('decor_id','<?php echo $decor_id;?>');
        FormDatas.append('title',title);
        FormDatas.append('content',content);
        FormDatas.append('image',image);
        FormDatas.append('position',position);
        FormDatas.append('status',status);
        FormDatas.append('level',level);
        
        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/UpDate_DecorController.php',true);
        xhr.onload = ()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.responseText);
                if(response.check){
                    swal.fire({
                        title : 'Thành công!',
                        text : response.message,
                        icon : 'success'
                    }).then(()=>{
                        window.location.assign('Admin_decor.php');
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
        xhr.send(FormDatas);
       });
    
</script>