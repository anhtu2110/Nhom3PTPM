<form>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="title" class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề">
        </div>
        <div class="col-md-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea class="form-control" id="description" rows="3" placeholder="Nhập mô tả"></textarea>
        </div>
        <div class="col-md-3">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image">
        </div>
        <div class="col-md-3">
            <label for="oldPrice" class="form-label">Giá cũ:</label>
            <input type="number" class="form-control" id="oldPrice" placeholder="Nhập giá cũ">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="currentPrice" class="form-label">Giá hiện tại:</label>
            <input type="number" class="form-control" id="currentPrice" placeholder="Nhập giá hiện tại">
        </div>
        <div class="col-md-3">
            <label for="supplier" class="form-label">Nhà cung cấp:</label>
            <input type="text" class="form-control" id="supplier" placeholder="Nhập nhà cung cấp">
        </div>
        <div class="col-md-3">
            <label for="quantity" class="form-label">Số lượng:</label>
            <input type="number" class="form-control" id="quantity" placeholder="Nhập số lượng">
        </div>
        <div class="col-md-3">
            <label for="sold" class="form-label">Đã bán:</label>
            <input type="number" class="form-control" id="sold" placeholder="Nhập số đã bán">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="categoryID" class="form-label">ID Danh mục:</label>
            <select class="form-select" id="categoryID">
                <option value="1">Ghế Decor</option>
                <option value="2">Bàn làm việc</option>
                <option value="3">Đồ Decor</option>
                <option value="4">Kệ để đồ</option>
                <option value="5">Giường ngủ</option>
            </select>
        </div>

    </div>

</form>
<div class="row">
    <div class="col d-grid">
        <button type="submit" class="btn btn-primary"id="add_details">Thêm</button>
    </div>
</div>
<script>
    document.getElementById('add_details').addEventListener('click',(e)=>{
        e.preventDefault();

        let title = document.getElementById('title').value;
        let description = document.getElementById('description').value;
        let img = document.getElementById('image').files[0];
        let OldPrice = document.getElementById('oldPrice').value;
        let Price = document.getElementById('currentPrice').value;
        let supplier = document.getElementById('supplier').value;
        let quantity = document.getElementById('quantity').value;
        let sold = document.getElementById('sold').value;
        let categoryID = document.getElementById('categoryID').value;

        if(title === ''||description === '' || img === undefined || OldPrice === '' || Price === ''
            || supplier === '' || quantity === '' || sold === '' || categoryID === ''
        ){
            swal.fire(
                'Vui lòng nhập đầy đủ thông tin!',
                'Bạn đã nhập thiếu thông tin, nhập đủ để lưu.',
                'question'
            );
        }

        let formdata  = new FormData();
        formdata .append('Title',title);
        formdata .append('Describes',description);
        formdata .append('file',img);
        formdata .append('OldPrice',OldPrice);
        formdata .append('Price',Price);
        formdata .append('Supplier',supplier);
        formdata .append('Quantity',quantity);
        formdata .append('Sold',sold);
        formdata .append('CategoryID',categoryID);

        let xhr = new XMLHttpRequest();
        xhr.open('POST','./Controller/Add_DetailsController.php',true);
        xhr.onload =()=>{
            if(xhr.status === 200){
                let response = JSON.parse(xhr.responseText);
                if(response.check){
                    swal.fire({
                        title : 'Thành công!',
                        text : response.message,
                        icon: 'success'
                    }).then(()=>{
                        window.location.assign('add_product.php');
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
        xhr.send(formdata );

    })
</script>