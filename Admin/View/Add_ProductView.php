
<?php require_once './Controller/Admin_ProductController.php';
    $controller = new Admin_Product_Controller();
    $show = $controller->DisPlay_ProductID();
?>
<form>
    <?php foreach ($show as $item):?>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="productName" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" value='<?php echo $item['Title'];?>' id="productName" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="col-md-4">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="text" class="form-control" value='<?php echo $item['Image'];?>' id="image" readonly>
        </div>
        <div class="col-md-4">
            <label for="oldPrice" class="form-label">Giá cũ:</label>
            <input type="number" class="form-control" value='<?php echo $item['OldPrice'];?>' id="oldPrice" placeholder="Nhập giá cũ">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="currentPrice" class="form-label">Giá hiện tại:</label>
            <input type="number" class="form-control" value='<?php echo $item['Price'];?>' id="currentPrice" placeholder="Nhập giá hiện tại">
        </div>
        <div class="col-md-4">
            <label for="bestSeller" class="form-label">Bán chạy:</label>
            <select class="form-select" id="bestSeller">
                <option value="1">Có</option>
                <option value="0">Không</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="entryDate" class="form-label">Ngày nhập:</label>
            <input type="date" class="form-control" value='<?php echo date('Y-m-d');?>' id="entryDate"readonly>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="detailID" class="form-label">ID Chi tiết:</label>
            <input type="text" class="form-control" value='<?php echo $item['IDDetail'];?>' id="detailID" placeholder="Nhập ID chi tiết"readonly>
        </div>
    </div>
   <?php endforeach;?>
</form>
<div class="row">
        <div class="col d-grid">
            <button type="submit" class="btn btn-primary"id="add_product">Thêm</button>
        </div>
    </div>
<script>
    document.getElementById('add_product').addEventListener('click',(e)=>{
        e.preventDefault();

        let title = document.getElementById('productName').value;
        let img = document.getElementById('image').value;
        let oldprice =document.getElementById('oldPrice').value;
        let price = document.getElementById('currentPrice').value;
        let IsBestSeller = document.getElementById('bestSeller').value;
        let Date = document.getElementById('entryDate').value;
        let IdDetail = document.getElementById('detailID').value;

        if(title === '' || img === undefined || oldprice ==='' || price === '' || IsBestSeller === '' || Date === '' || IdDetail === ''){
            swal.fire(
                'Vui lòng nhập đầy đủ thông tin!',
                'Bạn đã nhập thiếu thông tin, nhập đủ để lưu.',
                'question'
            );
        }

        let FormDatas = new FormData();
        FormDatas.append('Title',title);
        FormDatas.append('file',img);
        FormDatas.append('OldPrice',oldprice);
        FormDatas.append('Price',price);
        FormDatas.append('IsBestSeller',IsBestSeller);
        FormDatas.append('ExtraTime',Date);
        FormDatas.append('IDDetail',IdDetail);

        

        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/Add_ProductController.php',true);
        xhr.onload =()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.responseText);
                if(response.check){
                    swal.fire({
                        title : 'Thành công!',
                        text : response.message,
                        icon: 'success'
                    }).then(()=>{
                        window.location.assign('Admin_product.php');
                    })
                }else{
                    swal.fire({
                        title : 'Thất bại!',
                        text : response.message,
                        icon: 'error'
                    });
                }
            }else{
                swal.fire({
                        title : 'Yêu cầu từ SEVER lỗi!',
                        text : response.message,
                        icon: 'error'
                    });
            }
        }
        xhr.send(FormDatas);

    })
</script>