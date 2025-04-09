<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../img/Black and White Minimalist Professional Initial Logo.png" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>My House Decor</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.php">
                    <span class="align-middle">My Houser Decor</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Trang cá nhân
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="index.php">
                            <i class="fa-solid fa-house"></i></i> <span class="align-middle">Trang chủ</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="profile.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Trang cá
                                nhân</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="logout.php">
                            <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Đăng
                                xuất</span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Chức năng và quản lý
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_staff.php">
                            <i class="fa-solid fa-user"></i></i> <span class="align-middle">Quản lý nhân viên</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_blog.php">
                            <i class="fa-solid fa-signs-post"></i></i> <span class="align-middle">Quản lý bài
                                viết</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_contact.php">
                            <i class="fa-solid fa-headphones"></i></i> <span class="align-middle">Quản lý hỗ trợ</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_customer.php">
                            <i class="fa-solid fa-list"></i></i> <span class="align-middle">Quản lý khách hàng</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_category.php">
                            <i class="fa-solid fa-pen"></i> <span class="align-middle">Quản lý Danh mục SP</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_oder.php">
                            <i class="fa-brands fa-opencart"></i></i> <span class="align-middle">Quản lý đơn hàng</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_decor.php">
                            <i class="fa-solid fa-star"></i></i> <span class="align-middle">Quản lý trang trí</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_product.php">
                            <i class="fa-brands fa-product-hunt"></i></i> <span class="align-middle">Quản lý sản
                                phẩm</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_details.php">
                            <i class="fa-solid fa-clipboard"></i><span class="align-middle">Quản lý chi tiết sản
                                phẩm</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_role.php">
                            <i class="fa-solid fa-hand"></i></i> <span class="align-middle">Quản lý quyền</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_menu.php">
                            <i class="fa-solid fa-bars"></i></i> <span class="align-middle">Quản lý Menu</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admin_comment.php">
                            <i class="fa-regular fa-comment-dots"></i></i> <span class="align-middle">Quản lý
                                Comment</span>
                        </a>
                    </li>

            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">

                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="<?php echo $_SESSION['Image'] ? $_SESSION['Image'] : './img/avt.png';?>"
                                    class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span
                                    class="text-dark"><?php echo $_SESSION['UserName'] ? $_SESSION['UserName'] : 'Username';?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="profile.php"><i class="align-middle me-1"
                                        data-feather="user"></i>Trang cá nhân</a>
                                <a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"
                                        style="padding-right:3px"></i></i>Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>