<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  $(document).ready(function() {
    $('#contactForm').submit(function(event) {
      event.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        type: 'POST',
        url: 'Controller/ContactController.php',
        data: formData,
        success: function(response) {
          Swal.fire(
            "Thành Công!", 
            "Cảm ơn bạn đã gửi yêu cầu, chúng tôi sẽ liên hệ lại cho bạn trong thời gian sớm nhất!", 
            "success"
          );
        },
        error: function(xhr, status, error) {
          Swal.fire(
            "Lỗi!", 
            "Có lỗi xảy ra khi gửi dữ liệu. Vui lòng thử lại sau.", 
            "error"
          );
        }
      });
    });
  });
</script>

<div class="col-md-6 wow zoomIn">
  <h2 class="text-end">BẠN CẦN HỖ TRỢ?</h2>
  <p class="text-end">Liên hệ với chúng tôi bằng cách gửi biểu mẫu này!</p>
  <form id="contactForm">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Họ và tên</label>
      <input type="text" class="form-control" name ="fullname" placeholder="Nhập họ và tên" required>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput2" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput2" class="form-label">Nhập tiêu đề</label>
      <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề" required>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
      <textarea class="form-control" name="content" placeholder="Nhập nội dung" required></textarea>
    </div>
    <input type="hidden" name="current_date_time" value="<?php  date_default_timezone_set('Asia/Ho_Chi_Minh'); echo date('Y-m-d H:i:s'); ?>">
    <div class="d-grid">
      <input class="btn btn-primary" type="submit" id="checkcam">
    </div>
  </form>
</div>
