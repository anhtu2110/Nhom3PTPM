<?php require_once './Controller/Admin_CategoryController.php';
$controller = new Admin_CategoryController();
$limit = 5;
$offset = isset($_GET['page']) ? ($_GET['page'] - 1) * $limit : 0;

?>
<div class="row d-flex mb-3">
    <div class="col-6 mx-auto">
        <label for="input" class="form-label">Nhập tên:</label>
        <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm" name="search">
    </div>
    <div class="col-2">
        <button class="btn btn-success mt-4"id='chuyen_add_category'><i class="fa-solid fa-check" ></i> Thêm Thể Loại
            mới</button>
    </div>
</div>
<table class="mx-auto table table-bordered">
    <tr>
        <th class="table-primary text-center">STT</th>
        <th class="table-primary text-center">ID Thể Loại</th>
        <th class="table-primary text-center">Tên thể loại</th>
        <th class="table-primary text-center">Chức năng</th>

    </tr>
    <?php 
        $show_Category = $controller->ShowCategory_Limit($limit, $offset);
        $count = 1;
        foreach ($show_Category as $item) :
    ?>
    <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $item['CategoryID'];?></td>
        <td><?php echo $item['Title'];?></td>
        <td>
            <div class="chucnang d-flex">
                <div class="btn_update mx-auto">
                    <button type="button" class="btn btn-primary btn-sm">
                        <a href="Update_category.php?Category_id=<?php echo $item['CategoryID'];?>" style="color: white;"><i class="fa-solid fa-pen"></i></a>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm delete_category" style="margin-left: 6px;" data-category-id="<?php echo $item['CategoryID'];?>">
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
    $result = $controller->get_Count();
    $total = $result['total'];
    $pages = ceil($total / $limit);
    for ($i = 1; $i <= $pages; $i++) {
        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
    }
    ?>
</ul>
<script>
    document.getElementById('chuyen_add_category').addEventListener('click', function() {
        window.location.href = 'Add_category.php';
    });
    document.querySelectorAll('.delete_category').forEach(button =>{
        button.addEventListener('click',(e)=>{
            e.preventDefault();

            let CategoryID = button.getAttribute('data-category-id');
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
                if (result.isConfirmed){
                    let formData2 = new FormData();
            formData2.append('CategoryID',CategoryID);

            let xhr = new XMLHttpRequest();
            xhr.open('POST','./Controller/Delete_CategoryController.php');
            xhr.onload =()=>{
                if(xhr.status === 200){
                    let response = JSON.parse(xhr.responseText);
                    if(response.check){
                        swal.fire({
                            title :'Thành công!',
                            text: response.message,
                            icon : 'success'
                        }).then(()=>{
                            location.reload();
                        });
                    }else{
                        swal.fire({
                            title :'Thất bại!',
                            text: response.message,
                            icon : 'error'
                        });
                    }
                }else{
                        swal.fire({
                            title :'Thất bại!',
                            text: response.message,
                            icon : 'error'
                        });
                    }
            }
            xhr.send(formData2);
                }
        });
        });
    });
    

</script>