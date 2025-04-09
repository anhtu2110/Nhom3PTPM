<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="banner">
        <img src="./img/bannner.jpg" alt="" class="w-100">
    </div>
  
    <div class="login">
        <div class="conatiner">
            <div class="row">
                <div class="col-md-7 team d-flex my-auto">
                    <img src="./img/fg-img.png" alt="" class="w-100">
                </div>
                <div class="col-md-4 formlogin">
                    <h3 class="text-center">Quên mật khẩu </h3>
        <form action="">
            <div class="mt-5">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name ="email" id = "email"class="no-border" placeholder="Nhập Email">
            </div>
            <hr>
            <div class="d-grid mt-4">
                <button type="button" class="btn btn-secondary" id="reset-btn">Lấy lại mật khẩu</button>
            </div>
            <a href="login_admin.php" class="d-flex mt-2 justify-content-center text-dark">Quay lại đăng nhập</a>
        </form>
                </div>
            </div>
            <hr class="mt-3">
            <div class="row">
                <div class="col-md-12">
                    <p class="mt-3 text-center">&copy; Bản Quyền 2024 code bởi Tran Van Huy</p>
                </div>
            </div>
        </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/main.js"></script>
  <script>
      new WOW().init();
  </script>
  <script></script>
</body>
</html>
