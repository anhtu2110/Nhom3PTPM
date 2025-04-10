<?php
    require_once './Controller/Admin_ContactController.php';
?>
<div class="row d-flex mb-3">
    <div class="col-6 mx-auto">
        <label for="input" class="form-label">Nhập tên:</label>
        <input type="search" class="form-control" id="email" placeholder="Nhập tên cần tìm kiếm" name="search">
    </div>

</div>
<table class="mx-auto table table-bordered">
    <tr>
        <th class="table-primary text-center">STT</th>
        <th class="table-primary text-center">ID Hỗ Trợ</th>
        <th class="table-primary text-center">Tên người gửi</th>
        <th class="table-primary text-center">Tiêu đề</th>
        <th class="table-primary text-center">Nội dung</th>
        <th class="table-primary text-center">Email</th>
        <th class="table-primary text-center">Trạng thái</th>
        <th class="table-primary text-center">Ngày gửi</th>
        <th class="table-primary text-center">Chức năng</th>
    </tr>
    <?php
        $limit = 3;
        $count = 1;
        $offset = isset($_GET['page_contact']) ? ($_GET['page_contact'] - 1)*$limit : 0;
        $data = new Admin_ContactController();
        $result = $data->Display_ContactController($limit,$offset);

        foreach($result as $contactItem):
            switch($contactItem['Status']){
                case 1: 
                    $check = '<p style="color:green;margin:0;">Đã xử lý</p>';
                    break;
                case 2:
                    $check = '<p style="color:goldenrod;margin:0;">Chờ xử lý</p>';
                    break;
            }

    ?>
    <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $contactItem['ContactID'];?></td>
        <td><?php echo $contactItem['Fullname'];?></td>
        <td><?php echo $contactItem['Title'];?></td>
        <td><?php echo $contactItem['Message'];?></td>
        <td><?php echo $contactItem['Email'];?></td>
        <td><?php echo $check;?></td>
        <td><?php echo $contactItem['CreateDay'];?></td>
        <td>
            <div class="chucnang d-flex">
                <div class="btn_update mx-auto">
                <button type="button" class="btn btn-success btn-sm" style="margin-left: 6px;margin-top:5px;">
                <a href="feedback_Contact.php?Contact_id=<?php echo $contactItem['ContactID'];?>"style='color: white;'><i class="fa-solid fa-comment"></i></a>
            </button>
                    <button type="button" class="btn btn-danger btn-sm delete_contact" style="margin-left: 6px;margin-top:5px;"
                    data-contact-id="<?php echo $contactItem['ContactID'];?>"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
        </td>
    </tr>
    <?php 
    endforeach;
    ?>
</table>

<ul class="pagination justify-content-end">
    <?php $showTotal = new Admin_ContactController();
        $result = $showTotal->getTotal_Contacts();
        $sl = $result['total_contact'];

        for($i = 1; $i <= ceil($sl/$limit); $i++){
            echo "<li class='page-item'><a class='page-link' href='?page_contact=$i'>$i</a></li>";
        }
    ?>
</ul>
<script>
    document.querySelectorAll('.delete_contact').forEach(button =>{
        button.addEventListener('click',(e)=>{
            e.preventDefault();

            let ContactID = button.getAttribute('data-contact-id');
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
            formData2.append('ContactID',ContactID);

            let xhr = new XMLHttpRequest();
            xhr.open('POST','./Controller/Delete_ContactController.php');
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