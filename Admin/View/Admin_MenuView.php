    <?php require_once './Controller/Admin_MenuController.php'; ?>
    <div class="row d-flex mb-3">
        <div class="col-6 mx-auto">
            <label for="input" class="form-label">Nhập tên:</label>
            <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm" name="search">
        </div>
        <div class="col-2">
            <button class="btn btn-success mt-4"onclick="window.location.href='add_menu.php'"><i class="fa-solid fa-check" ></i> Thêm Menu
                mới</button>
        </div>
    </div>
    <table class="mx-auto table table-bordered">
        <tr>
            <th class="table-primary text-center">STT</th>
            <th class="table-primary text-center">MenuID</th>
            <th class="table-primary text-center">Tiêu đề</th>
            <th class="table-primary text-center">Trạng thái</th>
            <th class="table-primary text-center">Cấp bậc</th>
            <th class="table-primary text-center">Thuộc Menu</th>
            <th class="table-primary text-center">Thứ tự</th>
            <th class="table-primary text-center">Đường dẫn</th>
            <th class="table-primary text-center">Chức năng</th>
        </tr>
        <?php
        $count_menu = new Admin_MenuController();
        $limit = 5;
        $offset = isset($_GET['page_menu']) ? ($_GET['page_menu'] -1)*$limit : 0;
        $menu_item = $count_menu->ShowLimitMenu($limit, $offset);
        $count = 1;
        foreach ($menu_item as $item) :
            switch ($item['IsActive']) {
                case 1:
                    $check = "<p style='color:green;margin:0'>Hiển thị</p>";
                    break;
                case 0:
                    $check = "<p style='color:red;margin:0'>Ẩn</p>";
                    break;
            }
        ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $item['MenuID']; ?></td>
                <td><?php echo $item['Title']; ?></td>
                <td><?php echo $check;?></td>
                <td><?php echo $item['Levels']; ?></td>
                <td><?php echo $item['ParentID']; ?></td>
                <td><?php echo $item['MenuOrder']; ?></td>
                <td><?php echo $item['Link']; ?></td>
                <td>
                    <div class="chucnang d-flex">
                        <div class="btn_update mx-auto">
                            <button type="button" class="btn btn-primary btn-sm">
                                <a href="update_menu.php?menu_id=<?php echo $item['MenuID']; ?>"style="color:white;"><i class="fa-solid fa-pen"></i></a>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm delete_menu" style="margin-left: 6px;"data-menu-id="<?php echo $item['MenuID'];?>">
                            <i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>
                </td>
            </tr>
        <?php $count++;
        endforeach; ?>
    </table>
    <ul class="pagination justify-content-end">
        <?php
        $result = $count_menu->setCount();
        $row = $result['total_menu'];
        for ($i = 1; $i <= ceil($row / $limit); $i++) {
            echo "<li class='page-item'><a class='page-link' href='?page_menu=$i'>$i</a></li>";
        }
        ?>
    </ul>
<script>
    document.querySelectorAll('.delete_menu').forEach(btn =>{
        btn.addEventListener('click',(e)=>{
            e.preventDefault();

            let MenuID = btn.getAttribute('data-menu-id');

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
                    formSend.append('MenuID',MenuID);

                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', './Controller/Delete_MenuController.php', true);
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