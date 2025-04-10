<?php
    $DetailssID = $_GET['Product_Detail_id'];
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Controller/CommentController.php';
    $commentController = new CommentController();
    $result = $commentController->showComment($DetailssID);
?>

<div class="container">
    <?php foreach($result as $items):
        if($items['UserName'] == 'admin01'){
            $items['UserName'] = $items['UserName'].'<i class="fa-solid fa-circle-check" style="color:#00CCFF;margin-left: 2px"></i>';
        }
        ?>
    <div class="row mt-4">
        <div class="col-2 img_customer d-flex">
            <img src="<?php echo $items['Image'];?>" alt="">
            <h6 class="my-auto p-2"><?php echo $items['UserName'];?></h6>
        </div>
        <p class="text-secondary"><?php echo $items['Content'];?></p>
        <div class="cmt_danhgia d-flex">
            <?php for($i = 1; $i <= $items['Star']; $i++){
                echo '<i class="fa-solid fa-star"></i>';
                }
            ?>
        </div>
        <p class="text-secondary"><?php echo $items['Date'];?></p>
        <hr class="mt-3">
    </div>
    <?php endforeach;?>
</div>

<div class="col-2 img_customer d-flex mt-3">
    <img src="<?php echo $_SESSION['img'];?>" alt="">
    <h6 class="my-auto p-2">You : </h6>
</div>
<div class="container">
    <div class="form-group">
        <label for="rating">Đánh giá:</label>
        <select id="rating" class="form-control form_select" name="rating" required>
            <option value="5">5 - Xuất sắc</option>
            <option value="4">4 - Tốt</option>
            <option value="3">3 - Trung bình</option>
            <option value="2">2 - Kém</option>
            <option value="1">1 - Rất kém</option>
        </select>
        <p>Viết đánh giá: </p>
        <textarea id="textarea" class="form-control" placeholder="Viết đánh giá của bạn..."></textarea>
    </div>
    <button type="button" class="btn btn-primary mt-3" id="submit_comment">Gửi đánh giá</button>
</div>
<script>
document.getElementById('submit_comment').addEventListener('click', (e) => {
    e.preventDefault();

    let rating = document.getElementById('rating').value;
    let textarea = document.getElementById('textarea').value;
    let UserName = '<?php echo $_SESSION['userName'];?>';
    let Image = '<?php echo $_SESSION['img'];?>';
    let DetailsID = '<?php echo $_GET['Product_Detail_id'];?>';
    let Date = '<?php echo date('Y-m-d');?>';

    let formData = new FormData();
    formData.append('rating', rating);
    formData.append('textarea', textarea);
    formData.append('UserName', UserName);
    formData.append('Image', Image);
    formData.append('DetailsID', DetailsID);
    formData.append('Date', Date);

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://192.168.126.128:80/Nhom3PTPM/Controller/CommentController.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let result = JSON.parse(xhr.responseText);
            if (result === true) {
                Swal.fire({
                    title: 'Gửi đánh giá thành công',
                    text: 'Cảm ơn bạn đã đánh giá sản phẩm, vui lòng chờ quản trị viên duyệt đánh giá của bạn',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            } else {
                Swal.fire({
                    title: 'Gửi đánh giá thất bại',
                    text: 'Vui lòng thử lại sau',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    };
    xhr.send(formData);
});
</script>