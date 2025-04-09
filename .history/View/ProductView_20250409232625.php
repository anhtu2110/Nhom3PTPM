<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/Nhom3PTPM/Controller/ProductController.php';
	$controller = new ProductController();
	$result = $controller->getProductController();
	$count = 0;
?>
<div class="showsanpham ">
    <div class="container">
        <!-- all product -->
        <div class="allProduct ">
            <div class="row">

                <?php foreach($result as $ProductItem):
          		if($count % 6 == 0 && $count != 0):
          			echo "<hr>";
          		endif;
          			?>
                <div class="col-md-2 wow fadeInUp ">
                    <img src="<?php echo $ProductItem['Image'];?>" alt="" class="product-image">
                    <h3 class="product-Title m-0"><?php echo $ProductItem['Title'];?></h3>
                    <a href="details.php?Product_Detail_id=<?php echo $ProductItem['IDDetail'];?>" class="p-0"
                        style="font-size:14px;">Xem chi tiết sản phẩm...</a>
                    <div class="giathanh d-flex justify-content-between">
                        <p class="product-price"><?php echo number_format($ProductItem['Price'], 0, '.', '.');?> VND</p>
                        <p class="product-cost"><?php echo number_format($ProductItem['OldPrice'], 0, '.', '.');?> VND
                        </p>
                    </div>
                </div>
                <?php
          $count++;
        endforeach;
          ?>
            </div>
        </div>
    </div>
</div>