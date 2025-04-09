
    <?php require_once './Controller/Admin_RoleController.php';
    $controller = new Admin_RoleController();
    $id = $_GET['role_id'];
    $results = $controller->show_Role($id);
    $result = $results->fetch_assoc();
    ?>
<form>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="roleName" class="form-label">Tên Quyền:</label>
            <input type="text" class="form-control" value="<?php echo $result['Role'];?>" id="roleName" placeholder="Nhập tên quyền">
        </div>
    </div>
    
</form>
<div class="row">
        <div class="col d-grid">
            <button type="submit" class="btn btn-primary" id='update_role'>Sửa</button>
        </div>
    </div>
    <script>
    document.getElementById('update_role').addEventListener('click',(e)=>{
        e.preventDefault();

        let Role = document.getElementById('roleName').value;
        let IDRole = <?php echo $id?>;

        let formData = new FormData();
        formData.append('role_id',IDRole);
        formData.append('roleName',Role);

        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/Update_RoleController.php');
        xhr.onload = ()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.response);
                if(response.check){
                    swal.fire({
                        title: 'Thành công!',
                        text: response.message,
                        icon: 'success'
                    }).then(()=>{
                        window.location.assign('admin_role.php');
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