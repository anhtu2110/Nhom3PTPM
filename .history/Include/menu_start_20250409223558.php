   <!-- start -->
   <style>
.h_none button:hover {
    background: none !important;
}

.h_none button:active {
    background: none !important;
}

.menu {
    display: block;
}

.mobile_font {
    display: none;
}

@media (max-width: 768px) {
    .menu {
        display: none;
    }

    .mobile_font {
        display: block;
        background-color: white !important;
    }

    .start {
        display: none;
    }

    .taman_mobile {
        display: none;
    }
}
   </style>
   <div class="start">
       <div class="container-fluid">
           <div class="row d-flex align-items-center">
               <div class="col-md-8 wow slideInDown">
                   <p><i class="fa-solid fa-location-dot"></i> 111 Trieu Khuc, Quan Thanh Xuan, Ha Noi</p>
                   <p><i class="fa-solid fa-phone"></i> +84 382 752 110</p>
                   <p><i class="fa-solid fa-envelope"></i> daotu2110@gmail.com</p>
               </div>
               <div class="col-md-4 wow slideInDown" id="n1">
                   <a href="https://www.facebook.com/profile.php?id=61559644528431"><i
                           class="fa-brands fa-facebook"></i></a>
                   <a href="https://x.com/?lang=vi"><i class="fa-brands fa-twitter"></i></a>
                   <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
                   <a href="https://web.telegram.org/"><i class="fa-brands fa-telegram"></i></a>
               </div>
           </div>
       </div>
   </div>

   <!-- menu order -->
   <div class="menu">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-3 d-flex align-items-center">
                   <div class="logo  ">
                       <a href="index.php" class="wow zoomIn"> My House Decor</a>
                   </div>
               </div>
               <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/View/MenuView.php';

                ?>
               <div class="col-md-2 d-flex align-items-center">
                   <div class="container-fluid loginne wow slideInDown">
                       <div class="row">
                           <div class="col-3 p-0">
                               <a href="add_to_cart.php"><i class="fa-brands fa-opencart"></i></a>
                           </div>
                           <?php
                           if (isset($_SESSION['userName'])) {
                            echo '
                            <div class="col-9">
                                <div class="dropdown h_none">
                                    <button type="button" class="btn btn-primary dropdown-toggle " data-bs-toggle="dropdown" style="color: black;">
                                    <i>' . $_SESSION['userName'] . '</i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item" style="max-height: 50px">
                                            <div class="user-profile d-flex" style="font-size:14px">
                                                <i class="fa-solid fa-user my-auto" style="margin-right: 5px"></i>
                                                <i>' . $_SESSION['userName'] . '</i>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" style="max-height: 50px">
                                            <div class="profile-details d-flex text-center align-items-center">
                                                <i class="fa-regular fa-pen-to-square my-auto"></i>
                                                <a href="profile.php?profile_id='.$_SESSION['userID'].'" style="font-size:14px">Chỉnh sửa trang cá nhân.</a>
                                            </div>
                                        </li>
                                        <li class="dropdown-item" style="max-height: 50px">
                                            <div class="logout-name d-flex text-center align-items-center">
                                                <i class="fa-solid fa-arrow-right-from-bracket my-auto"></i>
                                                <a href="logout.php" style="font-size:14px">Đăng xuất.</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            ';
                        } else {
                            echo ' 
                            <div class="col-9">
                                <a href="login.php"><i class="fa-regular fa-user" id="demo"></i> Login</a>
                            </div>';
                        };
                            ?>
                       </div>
                   </div>

               </div>
           </div>

       </div>
       <hr>
   </div>
   <div class="mobile_font">
       <nav class="navbar navbar-expand-md navbar-light navbar-custom fixed-top">
           <div class="container-fluid" style="background-color: white;padding-bottom:7px;">
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                   data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                   aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNavDropdown">
                   <ul class="navbar-nav mx-auto">
                       <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Controller/MenuController.php';
                $controller = new MenuController();
                $dropdownItems = $controller->displayMenu();
                foreach ($dropdownItems as $menuItem):
                ?>
                       <li class="nav-item <?php echo !empty($menuItem['dropdown']) ? 'dropdown' : ''; ?>"
                           id="<?php echo isset($menuItem['MenuID']) ? $menuItem['MenuID'] : ''; ?>">
                           <a class="nav-link <?php echo !empty($menuItem['dropdown']) ? 'dropdown-toggle' : ''; ?>"
                               href="<?php echo isset($menuItem['Link']) ? $menuItem['Link'] : '#'; ?>"
                               <?php echo !empty($menuItem['dropdown']) ? 'data-bs-toggle="dropdown"' : ''; ?>>
                               <?php echo isset($menuItem['Title']) ? $menuItem['Title'] : 'Unknown Title'; ?>
                           </a>
                           <?php if (!empty($menuItem['dropdown'])): ?>
                           <ul class="dropdown-menu">
                               <?php foreach ($menuItem['dropdown'] as $dropdownItem): ?>
                               <li>
                                   <a class="dropdown-item"
                                       href="<?php echo isset($dropdownItem['#newproduct']) ? $dropdownItem['#newproduct'] : '#newproduct'; ?>">
                                       <?php echo isset($dropdownItem['Title']) ? $dropdownItem['Title'] : 'Unknown Title'; ?>
                                   </a>
                               </li>
                               <?php endforeach; ?>
                           </ul>
                           <?php endif; ?>
                       </li>
                       <?php endforeach; ?>
                   </ul>
                   <ul class="navbar-nav ms-auto d-flex align-items-center">
                       <li class="nav-item">
                           <a class="nav-link" href="add_to_cart.php"><i class="fa-brands fa-opencart"></i></a>
                       </li>
                       <?php if (isset($_SESSION['userName'])): ?>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                               <i><?php echo $_SESSION['userName']; ?></i>
                           </a>
                           <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                               <li>
                                   <a class="dropdown-item d-flex align-items-center" href="#">
                                       <i class="fa-solid fa-user me-2"></i>
                                       <span><?php echo $_SESSION['userName']; ?></span>
                                   </a>
                               </li>
                               <li>
                                   <a class="dropdown-item d-flex align-items-center"
                                       href="profile.php?profile_id=<?php echo $_SESSION['userID']; ?>">
                                       <i class="fa-regular fa-pen-to-square me-2"></i>
                                       Chỉnh sửa trang cá nhân.
                                   </a>
                               </li>
                               <li>
                                   <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                       <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                                       Đăng xuất.
                                   </a>
                               </li>
                           </ul>
                       </li>
                       <?php else: ?>
                       <li class="nav-item">
                           <a class="nav-link" href="login.php">
                               <i class="fa-regular fa-user" id="demo"></i> Login
                           </a>
                       </li>
                       <?php endif; ?>
                   </ul>
               </div>
           </div>
       </nav>
       <hr>
   </div>