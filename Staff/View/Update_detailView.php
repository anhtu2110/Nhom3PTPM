<form>
    <?php  
    require_once './Controller/Admin_DetailController.php';
    $controller = new Admin_DetailController();
    $DetailID = $_GET['details_id'];
    $result = $controller->showDetail_update($DetailID);
       foreach($result as $item):
    ?>
        <div class="row mb-3">
        <div class="col-md-3">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" value="<?php echo $item['Title'];?>" id="title" placeholder="Nhập tiêu đề">
        </div>
        <div class="col-md-3">
            <label for="categoryID" class="form-label">ID Danh mục:</label>
            <input type="text" class="form-control"value="<?php echo $item['CategoryID'];?>" id="categoryID" placeholder="Nhập ID danh mục">
        </div>
        <div class="col-md-3">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image">
        </div>
        <div class="col-md-3">
            <label for="oldPrice" class="form-label">Giá cũ:</label>
            <input type="number" class="form-control"value="<?php echo $item['OldPrice'];?>" id="oldPrice" placeholder="Nhập giá cũ">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="currentPrice" class="form-label">Giá hiện tại:</label>
            <input type="number" class="form-control"value="<?php echo $item['Price'];?>" id="currentPrice" placeholder="Nhập giá hiện tại">
        </div>
        <div class="col-md-3">
            <label for="supplier" class="form-label">Nhà cung cấp:</label>
            <input type="text" class="form-control"value="<?php echo $item['Supplier'];?>" id="supplier" placeholder="Nhập nhà cung cấp">
        </div>
        <div class="col-md-3">
            <label for="quantity" class="form-label">Số lượng:</label>
            <input type="number" class="form-control"value="<?php echo $item['Quantity'];?>" id="quantity" placeholder="Nhập số lượng">
        </div>
        <div class="col-md-3">
            <label for="sold" class="form-label">Đã bán:</label>
            <input type="number" class="form-control" id="sold" value="<?php echo $item['Sold'];?>"placeholder="Nhập số đã bán">
        </div>
    </div>
    <div class="col-md-12 mb-5">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea class="form-control"  id="description" rows="3" placeholder="Nhập mô tả"><?php echo $item['Describes'];?></textarea>
        </div>
<?php endforeach;?>
</form>
<div class="row">
    <div class="col d-grid">
        <button type="submit" class="btn btn-primary" id="update_detail">Sửa</button>
    </div>
</div>
<script>
    document.getElementById('update_detail').addEventListener('click',function(){

        var title = document.getElementById('title').value;
        var categoryID = document.getElementById('categoryID').value;
        
        if(document.getElementById('image').files[0]){
            var image = document.getElementById('image').files[0];
        }else{
            var image = '<?php echo $item['Image'];?>';
        }
        var oldPrice = document.getElementById('oldPrice').value;
        var currentPrice = document.getElementById('currentPrice').value;
        var supplier = document.getElementById('supplier').value;
        var quantity = document.getElementById('quantity').value;
        var sold = document.getElementById('sold').value;
        var description = document.getElementById('description').value;
        var DetailID = <?php echo $DetailID;?>;
       
        let FormDatas = new FormData();
        FormDatas.append('title',title);
        FormDatas.append('categoryID',categoryID);
        FormDatas.append('image',image);
        FormDatas.append('oldPrice',oldPrice);
        FormDatas.append('currentPrice',currentPrice);
        FormDatas.append('supplier',supplier);
        FormDatas.append('quantity',quantity);
        FormDatas.append('sold',sold);
        FormDatas.append('description',description);
        FormDatas.append('DetailID',DetailID);

        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/UpDate_DetailController.php',true);
        xhr.onload = ()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.responseText);
                if(response.check){
                    swal.fire({
                        title : 'Thành công!',
                        text : response.message,
                        icon : 'success'
                    }).then(()=>{
                        window.location.assign('Admin_details.php');
                    });
                }else{
                    swal.fire({
                        title: 'Thất bại!',
                        text : response.message,
                        icon : 'error'
                    });
                }
            }else{
                    swal.fire({
                        title: 'Thất bại!',
                        text : response.message,
                        icon : 'error'
                    });
                }
        }
        xhr.send(FormDatas);
       });
    
</script>