function getGioHang(){
    swal.fire(
        'Thông báo',
        'Sản phẩm đã được thêm vào giỏ hàng',
        'success'
    );
}
document.querySelector('.add_cart').addEventListener('click',getGioHang);
document.querySelector('.chuyen_add_to_cart').addEventListener('click',function(){
    window.location.href = 'add_to_cart.html';
}
);