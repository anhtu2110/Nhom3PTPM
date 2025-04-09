<form>
<?php 
                $contactID = isset($_GET['Contact_id']) ? $_GET['Contact_id'] : '';
                require_once './Controller/Admin_ContactController.php';
                $conn = new Admin_ContactController();
                $result = $conn->Display_Contact($contactID);

                foreach($result as $email):
            ?>
<div class="row mb-3">
        <div class="col-md-6">
            <label for="title" class="form-label">Tiêu đề người gửi:</label>
            <input type="text" class="form-control" id="title2" value="<?php echo $email['Title'];?>"readonly>
        </div>
        <div class="col-md-6">
            <label for="contactID" class="form-label">Mã Hỗ Trợ:</label>
            <input type="text" class="form-control" id="contactID" value="<?php echo $_GET['Contact_id'] ?>"readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="title" class="form-label">Họ tên người gửi:</label>
            <input type="text" class="form-control" id="Username" value="<?php echo $email['Fullname'];?>"readonly>
        </div>
        <div class="col-md-6">
            <label for="contactID" class="form-label">Ngày gửi hỗ trợ:</label>
            <input type="text" class="form-control" id="datesuport" value="<?php echo $email['CreateDay'];?>"readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="fullName" class="form-label">Họ tên người hỗ trợ:</label>
            <input type="text" class="form-control" id="fullname" placeholder="Nhập họ tên">
        </div>
        <div class="col-md-6">
            
            <label for="email" class="form-label">Email người nhận:</label>
            <input type="email" class="form-control" id="email" value="<?php echo $email['Email'];?>" placeholder="Nhập email">
            <?php endforeach;?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề">
        </div>
        <div class="col-md-6">
            <label for="registrationDate" class="form-label">Ngày hỗ trợ:</label>
            <input type="date" class="form-control"id="registrationDate" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
                                                                                    echo date('Y-m-d'); ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="title" class="form-label">Nội dung hỗ trợ:</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Nhập nội dung"></textarea>

        </div>
    </div>

</form>
<style>
    .an{
        display: none;
    }
</style>
<div class="row">
        <div class="tam-an an">
            <div class="d-grid">
            <button class="btn btn-primary"disabled>
                <span class="spinner-border spinner-border-sm"></span>
                Đang xử lý..
            </button>
            </div>
        </div>
        <div class="hienthi">
            <div class="d-grid">
            <button type="submit" class="btn btn-primary" id="feedback">
                Gửi hỗ trợ
            </button>
            </div>
        </div>
</div>



<script>
    document.getElementById('feedback').addEventListener('click', (e) => {
        e.preventDefault();

        document.querySelector('.tam-an').classList.remove('an');
        document.querySelector('.hienthi').classList.add('an');


        let fullname = document.getElementById('fullname').value;
        let email = document.getElementById('email').value;
        let title = document.getElementById('title').value;
        let date = document.getElementById('registrationDate').value;
        let ma_support = document.getElementById('contactID').value;
        let message = document.getElementById('message').value;
        let Username = document.getElementById('Username').value;

        let formData = new FormData();
        formData.append('fullname', fullname);
        formData.append('email', email);
        formData.append('title', title);
        formData.append('date', date);
        formData.append('ma_support', ma_support);
        formData.append('message', message);
        formData.append('username',Username);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', './Controller/Feedback_ContactController.php');
        xhr.onload = () => {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.check) {
                    swal.fire({
                        title: 'Thành công!',
                        text: response.message,
                        icon: 'success'
                    });
                } else {
                    swal.fire({
                        title: 'Thất bại!',
                        text: response.message,
                        icon: 'error'
                    });
                }
            }
            document.querySelector('.hienthi').classList.remove('an');
            document.querySelector('.tam-an').classList.add('an');
        }
        xhr.send(formData);
    })
</script>