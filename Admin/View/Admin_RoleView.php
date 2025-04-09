<?php require_once './Controller/Admin_RoleController.php';
$conn = new Admin_RoleController();
$limit = 5;
$offset = isset($_GET['page']) ? ($_GET['page'] - 1) * $limit : 0;
?>
<div class="row d-flex mb-3">
    <div class="col-6 mx-auto">
        <label for="input" class="form-label">Nhập tên:</label>
        <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm" name="search">
    </div>
    <div class="col-2">
        <button class="btn btn-success mt-4" id='chuyen_addRole'><i class="fa-solid fa-check"></i> Thêm Quyền
            mới</button>
    </div>
</div>
<table class="mx-auto table table-bordered">
    <tr>
        <th class="table-primary text-center">STT</th>
        <th class="table-primary text-center">ID Quyền</th>
        <th class="table-primary text-center">Tên Quyền</th>
        <th class="table-primary text-center">Chức năng</th>
    </tr>
    <?php
    $result = $conn->show_Role_Limit($limit, $offset);
    $count = 1;
    foreach($result as $item):
    ?>
    <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $item['IDRole'];?></td>
        <td><?php echo $item['Role'];?></td>
        <td>
            <div class="chucnang d-flex">
                <div class="btn_update mx-auto">
                    <button type="button" class="btn btn-primary btn-sm"><a href="update_role.php?role_id=<?php echo $item['IDRole'];?>" style="color: white;"><i class="fa-solid fa-pen"></i></a></button>
                    <button type="button" class="btn btn-danger btn-sm delete_role" style="margin-left: 6px;"data-role-id="<?php echo $item['IDRole'];?>">
                    <i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
        </td>
    </tr>
    <?php
$count++;
endforeach;?>
</table>
<ul class="pagination justify-content-end">
    <?php 
    $total_role = $conn->count_Role();
    $total_role = $total_role->fetch_assoc();
    $total_role = $total_role['total_role'];
    $total_page = ceil($total_role / $limit);
    for ($i = 1; $i <= $total_page; $i++) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }
        ?>

</ul>
<script>
    document.getElementById('chuyen_addRole').addEventListener('click', function () {
        window.location.href = 'add_role.php';
    });
    document.querySelectorAll('.delete_role').forEach(btn =>{
        btn.addEventListener('click',(e)=>{
            e.preventDefault();

            let IDRole = btn.getAttribute('data-role-id');

            swal.fire({
                title: 'Xác nhận xóa',
                text: 'Bạn có chắc muốn xóa bản ghi này?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    let formSend = new FormData();
                    formSend.append('IDRole',IDRole);

                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', './Controller/Delete_RoleController.php', true);
                    xhr.onload = () => {
                        if (xhr.status === 200) {
                            let response = JSON.parse(xhr.responseText);
                            if (response.check) {
                                swal.fire({
                                    title: 'Thành công!',
                                    text: response.message,
                                    icon: 'success'
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                swal.fire({
                                    title: 'Thất bại!',
                                    text: response.message,
                                    icon: 'error'
                                });
                            }
                        } else {
                            swal.fire({
                                title: 'Thất bại!',
                                text: 'Có lỗi xảy ra khi xóa bản ghi.',
                                icon: 'error'
                            });
                        }
                    };
                    xhr.send(formSend);
                }
            });
        });
    });
</script>