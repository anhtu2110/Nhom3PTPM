<?php require_once './Controller/Index_Controller.php'; ?>
<div class="row">
    <div class="col-6 col-lg-6 col-xxl-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="card-title mb-0">Đơn hàng mới nhất</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>Tên User</th>
                        <th class="d-none d-xl-table-cell">Sản phẩm</th>
                        <th class="d-none d-xl-table-cell">Số lượng</th>
                        <th>Tổng giá</th>
                        <th class="d-none d-md-table-cell">Trạng Thái</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $controller = new Index_Controller();
                    $result = $controller->Display_New_Order();

                    foreach ($result as $item) :
                        switch ($item['status']) {
                            case 1:
                                $check = "<span class='badge bg-success'>Đã đặt hàng</span>";
                                break;
                            case 2:
                                $check = "<span class='badge bg-warning'>Hủy đơn,chưa duyệt</span>";
                                break;
                            case 3:
                                $check = "<span class='badge bg-danger'>Đã hủy</span>";
                                break;
                            case 4:
                                $check = "<span class='badge bg-info'>Đã duyệt</span>";
                                break;
                            case 5:
                                $check = "<span class='badge bg-primary'>Đang giao</span>";
                                break;
                            case 6:
                                $check = "<span class='badge bg-secondary'>Chưa Đặt</span>";
                                break;
                        }
                    ?>
                        <tr>
                            <td><?php echo $item['UserCustomer']; ?></td>
                            <td class="d-none d-xl-table-cell"><?php echo $item['Title']; ?></td>
                            <td class="d-none d-xl-table-cell"><?php echo $item['Quantity']; ?></td>
                            <td><?php echo number_format($item['Total_Price'], 0, '.', '.'); ?></td>
                            <td class="d-none d-md-table-cell"><?php echo $check; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xl-6 col-xxl-5 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Khách hàng</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $customer = $controller->getTotal_Customer();
                            $online = $controller->Check_Online();
                            ?>
                            <h1 class="mt-1 mb-3"><?php echo $customer; ?></h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> <?php echo $online; ?>% </span>
                                <span class="text-muted">Còn hoạt động</span>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Tổng doanh thu</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                            <?php $sum = $controller->set_Sum_Money(); ?>
                            <h1 class="mt-1 mb-3"><?php echo $sum; ?></h1>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Nhân Viên</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $staff = $controller->getTotal_Staff();
                            $onlines = $controller->Check_Onlines();
                            ?>
                            <h1 class="mt-1 mb-3"><?php echo $staff; ?></h1>
                            <div class="mb-0">
                                <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> </i> <?php echo $onlines; ?>% </span>
                                <span class="text-muted">Còn hoạt động</span>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Tổng số đơn hàng đã bán</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $count_order = $controller->Sum_Order();
                            ?>
                            <h1 class="mt-1 mb-3"><?php echo $count_order; ?></h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
