<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Nhom3PTPM/Controller/BestSellerController.php';
$getdata = new BestSellerController();
$getItems = $getdata->DisplayBestSeller();
?>

<div class="row wow fadeInUp">
    <?php
  $count = 1;
  foreach ($getItems as $getItem): 
 ?>
    <div class="col-md-3 mb-3 besller_hover pt-2">
        <img src="<?php echo $getItem['Image']; ?>" alt="" class="w-100 img_xinhh">
        <div class="price">
            <div class="row mt-2">
                <div class="col-md-9">
                    <h6><?php echo $getItem['Title']; ?></h6>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <p class="mx-end" style="font-size:25px"><i class="fa-regular fa-heart"></i></p>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <p><?php echo number_format($getItem['Price'], 0, ',', ','); ?>₫</p>
                <!-- <p class="gach1 p-0 ms-auto"><?php //echo number_format($getItem['OldPrice'], 0, '.', '.');
                                            ?> VND</p> -->
            </div>
        </div>
        <div class="btn_click">
            <div class="d-flex">
                <button class="mx-auto mb-2 btn_seller"><a
                        href="details.php?Product_Detail_id=<?php echo $getItem['IDDetail']; ?>"
                        style="padding: 3px;color:aliceblue">
                        XEM THÊM</a></button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<script>
document.querySelectorAll('.mx-end').forEach(item => {
    item.addEventListener('click', (e) => {
        e.target.classList.add('text-danger');
    });
});
</script>