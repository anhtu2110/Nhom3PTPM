<?php require_once './Controller/Admin_CategoryController.php';
$controller = new Admin_CategoryController();
$CategoryID = $_GET['Category_id'];
$data = $controller->ShowCategoryID($CategoryID);
?>
<form>
    <div class="row mb-3">
        <div class="col">
            <label for="categoryName" class="form-label">Tên thể loại:</label>
            <input type="text" class="form-control" id="title" value="<?php echo $data['Title'];?>" placeholder="Nhập tên thể loại">
        </div>
    </div>

</form>
<div class="row">
    <div class="col d-grid">
        <button type="submit" class="btn btn-primary"id="update_category">Sửa</button>
    </div>
</div>
<script>
    document.getElementById('update_category').addEventListener('click',function(){

        var title = document.getElementById('title').value;
        var categoryID = <?php echo $_GET['Category_id']?>;
       
        let FormDatas = new FormData();
        FormDatas.append('Title',title);
        FormDatas.append('CategoryID',categoryID);


        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/UpDate_CategoryController.php',true);
        xhr.onload = ()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.responseText);
                if(response.check){
                    swal.fire({
                        title : 'Thành công!',
                        text : response.message,
                        icon : 'success'
                    }).then(()=>{
                        window.location.assign('Admin_category.php');
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