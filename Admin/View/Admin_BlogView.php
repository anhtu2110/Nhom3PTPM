<div class="row d-flex mb-3">
                        <div class="col-6 mx-auto">
                            <label for="input" class="form-label">Nhập tên:</label>
                            <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm"
                                name="search">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-success mt-4"id="chuyen_blog_add"><i class="fa-solid fa-check" ></i> Thêm Blog
                                mới</button>
                        </div>
                    </div>
                    <table class="mx-auto table table-bordered">
                        <tr>
                            <th class="table-primary text-center">STT</th>
                            <th class="table-primary text-center">ID Blog</th>
                            <th class="table-primary text-center">Tiêu đề</th>
                            <th class="table-primary text-center">Nội dung</th>
                            <th class="table-primary text-center">Hình ảnh</th>
                            <th class="table-primary text-center">Trạng thái</th>
                            <th class="table-primary text-center">Ngày đăng</th>
                            <th class="table-primary text-center">Chức năng</th>
                        </tr>
                        <?php require_once './Controller/Admin_BlogController.php';
                            $limit = 3;
                            $offset = isset($_GET['page_blog']) ? ($_GET['page_blog'] - 1)*$limit : 1;
                            $controller = new Admin_BlogController();
                            $BlogItems = $controller->Display_BlogController($limit,$offset);
                            $count_Blog = 1;

                        foreach($BlogItems as $item):
                            switch($item['IsActive']){
                                case 1:
                                    $check ='<p style="color: green; margin:0">Hiển thị</p>';
                                    break;
                                case 0:
                                    $check ='<p style="color: red;margin:0">Ẩn</p>';
                                    break;
                            }
                        ?>
                        <tr>
                            <td style="padding:5px"><?php echo $count_Blog;?></td>
                            <td style="padding:5px"><?php echo $item['BlogID'];?></td>
                            <td style="padding:5px"><?php echo $item['Title'];?></td>
                            <td style="padding:5px"><?php echo $item['Content'];?></td>
                            <td style="padding:5px;"><img src="<?php echo '../'.$item['Image'];?>" alt=""style="max-width: 80px;max-height: 80px;"></td>
                            <td style="padding:5px"><?php echo $check;?></td>
                            <td style="padding:5px"><?php echo $item['DateOfWriting'];?></td>
                            <td>
                                <div class="chucnang d-flex">
                                    <div class="btn_update mx-auto">
                                        <button type="button" class="btn btn-primary btn-sm" style="margin-left: 6px;margin-top:5px;">
                                    <a href="update_blog.php?blog_id=<?php echo $item['BlogID'];?>"style="color: white;"><i class="fa-solid fa-pen"></i></a></button>
                                        <button type="button" class="btn btn-danger btn-sm btn_delete_Blog" style="margin-left: 6px;margin-top:5px;"
                                        data-blog-id="<?php echo $item['BlogID'];?>"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $count_Blog++;
                        endforeach;       
                        ?>
                    </table>
                    <?php 
                    $tinhcount = new Admin_BlogController();
                    $tg = $tinhcount->getCount();
                    $kq = $tg['total_blog'];
                    ?>
                    <ul class="pagination justify-content-end">
                        <?php
                        for($i = 1;$i <=ceil($kq/3);$i++){
                            echo "<li class='page-item'><a class='page-link' href='?page_blog=$i'>$i</a></li>";
                        }
                        ?>
                    </ul>
<script>
    document.getElementById('chuyen_blog_add').addEventListener('click',function(){
        window.location.href ="add_blog.php";
    });

    document.querySelectorAll('.btn_delete_Blog').forEach(button=>{
        button.addEventListener('click',function(e){
            e.preventDefault();
            let BlogID = button.getAttribute('data-blog-id');
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
            formData2.append('blogID',BlogID);

            let xhr = new XMLHttpRequest();
            xhr.open('POST','./Controller/Delete_BlogController.php');
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

                  