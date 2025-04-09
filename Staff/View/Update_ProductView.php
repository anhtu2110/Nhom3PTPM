
<?php require_once './Controller/Admin_ProductController.php';
if($_GET['product_id']){
    $ProductID = $_GET['product_id'];

    $controller = new Admin_Product_Controller();
    $result = $controller->Display_ProductUpdate($ProductID);
}
?>
<form>
    <?php
        foreach($result as $item):
    ?>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="productName" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" value="<?php echo $item['Title'];?>" id="productName" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="col-md-4">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image">
        </div>
        <div class="col-md-4">
            <label for="oldPrice" class="form-label">Giá cũ:</label>
            <input type="number" min="1" class="form-control" value="<?php echo $item['OldPrice'];?>" id="oldPrice" placeholder="Nhập giá cũ">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="currentPrice" class="form-label">Giá hiện tại:</label>
            <input type="number" min="1" class="form-control" value="<?php echo $item['Price'];?>" id="currentPrice" placeholder="Nhập giá hiện tại">
        </div>
        <div class="col-md-4">
            <label for="bestSeller" class="form-label">Bán chạy:</label>
            <select class="form-select" value="<?php echo $item['IsBestSeller'];?>" id="bestSeller">
                <option value="1">Có</option>
                <option value="0">Không</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="entryDate" class="form-label">Ngày nhập:</label>
            <input type="date" class="form-control" value="<?php echo $item['ExtraTime'];?>" id="entryDate">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="detailID" class="form-label">ID Chi tiết:</label>
            <input type="text" class="form-control" value="<?php echo $item['IDDetail'];?>" id="detailID" placeholder="Nhập ID chi tiết" readonly>
        </div>
    </div>
            <?php endforeach;?>
</form>
<div class="row">
    <div class="col d-grid">
        <button type="submit" class="btn btn-primary" id = 'update_product'>Sửa</button>
    </div>
</div>
<script>
    document.getElementById('update_product').addEventListener('click',(e)=>{
        e.preventDefault();

        let title = document.getElementById('productName').value;
        if(document.getElementById('image').files[0]){
            var image = document.getElementById('image').files[0];
        }else{
            var image = '<?php echo $item['Image'];?>';
        }
        let oldPrice = document.getElementById('oldPrice').value;
        let currentPrice = document.getElementById('currentPrice').value;
        let bestSeller = document.getElementById('bestSeller').value;
        let entryDate = document.getElementById('entryDate').value;
        let detailID = document.getElementById('detailID').value;

        let formData = new FormData();
        formData.append('product_id','<?php echo $_GET['product_id'];?>');
        formData.append('title',title);
        formData.append('image',image);
        formData.append('oldPrice',oldPrice);
        formData.append('currentPrice',currentPrice);
        formData.append('bestSeller',bestSeller);
        formData.append('entryDate',entryDate);
        formData.append('detailID',detailID);
       

        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/Update_ProductController.php');
        xhr.onload = ()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.response);
                if(response.check){
                    swal.fire({
                        title: 'Thành công!',
                        text: response.message,
                        icon: 'success'
                    }).then(()=>{
                        window.location.assign('admin_product.php');
                    });
                }else{
                    swal.fire({
                        title: 'Thất bại!',
                        text: response.message,
                        icon: 'error'
                    }); 
                }
            }else{
                swal.fire({
                        title: 'Thất bại!',
                        text: response.message,
                        icon: 'error'
                    });
            }
        };
        xhr.send(formData);
    })
</script>