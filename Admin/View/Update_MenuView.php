<?php require_once './Controller/Admin_MenuController.php';
$controller = new Admin_MenuController();
$menuID = isset($_GET['menu_id']) ? $_GET['menu_id'] : '';
$items = $controller->ShowMenu_TheoID($menuID);
?>
<form>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" value="<?php echo $items['Title'];?>" id="title" placeholder="Nhập tiêu đề">
            <input type="hidden"id="menuid" value="<?php echo $items['MenuID'];?>">
        </div>
        <div class="col-md-4">
            <label for="status" class="form-label">Trạng thái:</label>
            <select class="form-select" id="status">
                <option value="1">Hoạt động</option>
                <option value="0">Không hoạt động</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="level" class="form-label">Cấp bậc:</label>
            <input type="number" class="form-control" id="level"value="<?php echo $items['Levels'];?>" placeholder="Nhập cấp bậc">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="menu" class="form-label">Thuộc Menu:</label>
            <input type="text" class="form-control"value="<?php echo $items['ParentID'];?>" id="menu" placeholder="Nhập thuộc menu">
        </div>
        <div class="col-md-4">
            <label for="order" class="form-label">Thứ tự:</label>
            <input type="number" class="form-control"value="<?php echo $items['MenuOrder'];?>" id="order" placeholder="Nhập thứ tự">
        </div>
        <div class="col-md-4">
            <label for="path" class="form-label">Đường dẫn:</label>
            <input type="text" class="form-control" id="path"value="<?php echo $items['Link'];?>" placeholder="Nhập đường dẫn">
        </div>
    </div>


</form>
<div class="row">
    <div class="col d-grid">
        <button type="button" class="btn btn-primary"id="update_menu">Sửa</button>
    </div>
</div>
<script>
    document.getElementById('update_menu').addEventListener('click',(e)=>{
        e.preventDefault();

        let menuid = document.getElementById('menuid').value;
        let title = document.getElementById('title').value;
        let IsActive = document.getElementById('status').value;
        let Levels = document.getElementById('level').value;
        let ParentID = document.getElementById('menu').value;
        let MenuOrder = document.getElementById('order').value;
        let Link = document.getElementById('path').value;

        let formData = new FormData();

        formData.append('MenuID',menuid);
        formData.append('Title',title);
        formData.append('IsActive',IsActive);
        formData.append('Levels',Levels);
        formData.append('ParentID',ParentID);
        formData.append('MenuOrder',MenuOrder);
        formData.append('Link',Link);

        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/Update_MenuController.php');
        xhr.onload = ()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.response);
                if(response.check){
                    swal.fire({
                        title: 'Thành công!',
                        text: response.message,
                        icon: 'success'
                    }).then(()=>{
                        window.location.assign('admin_menu.php');
                    });
                }else{
                    swal.fire({
                        title: 'Thất bại!',
                        text: response.message,
                        icon: 'error'
                    }); 
                }
            }else{
                swal.fire({
                        title: 'Thất bại!',
                        text: response.message,
                        icon: 'error'
                    });
            }
        };
        xhr.send(formData);
    })
</script>