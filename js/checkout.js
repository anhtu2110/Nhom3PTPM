document.querySelector('.btn-chuyen').addEventListener('click', function() {
    let m1 = document.getElementById('name').value;
    let m2 = document.getElementById('eEmail').value;
    let m3 = document.getElementById('address').value;
    let m4 = document.getElementById('card-number').value;
    let m5 = document.getElementById('expiry').value;
    // ngăn sự kiện load lại trang
    event.preventDefault();

    if (m1 == "" || m2 == "" || m3 == "" || m4 == "" || m5 == "") {
        swal.fire(
            'Thông báo',
            'Vui lòng nhập đầy đủ thông tin',
            'error'
        );
    } else {
        swal.fire(
            'Thông báo',
            'Chuyển đến trang thanh toán',
            'success'
        );
       setTimeout(function() {
            window.location.href = "checkdon.html";
        }, 2000);
    }
});
