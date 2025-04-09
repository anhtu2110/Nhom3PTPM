<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/Nhom3PTPM/Controller/DecorController.php';
?>
<div class="lop02 wow fadeInUp">
    <div class="container">
        <div class="row">
            <?php 
                	$controller = new DecorController();
                	$result = $controller->DecorController_FISRT();
                	$count = 0;
                	?>
            <?php foreach ($result as $FisrtItem): 
                		if($count % 2 == 0 && $count !== 0):
                			echo '<br>';
                		endif;
                		?>
            <div class="col-md-6">
                <img src="<?php echo $FisrtItem['Image'];?>" alt="" class="w-100">
                <div class="noidung text-center">
                    <h3><?php echo $FisrtItem['Title'];?></h3>
                    <p><?php echo $FisrtItem['Content'];?></p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<br>
<br>
<!-- lop 04 -->
<div class="lop04 wow fadeInUp">
    <div class="container">
        <div class="row">
            <?php 
                  $controller2 = new DecorController();
                  $result2 = $controller2->DecorController_LAST();

                  foreach($result2 as $LastItem):
                  ?>
            <div class="col-md-4">
                <img src="<?php echo $LastItem['Image'];?>" alt="" class="w-100">
                <div class="noidung text-center">
                    <h3><?php echo $LastItem['Title'];?></h3>
                    <p><?php echo $LastItem['Content'];?></p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>