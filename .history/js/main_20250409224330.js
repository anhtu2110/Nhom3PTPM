function setSwal(){
    Swal.fire({
        title: 'Chúc mừng bạn đã đăng nhập thành công!',
        text: 'Hãy bắt đầu một ngày mới với nhiều năng lượng tích cực nhé!',
        icon: 'success',
    });
}
function setEmail(){
    Swal.fire({
        title: 'Thành công!',
        text: 'Vui lòng kiểm tra email để xác nhận tài khoản!',
        icon: 'success',
    });

}
function setSwalError(){
    Swal.fire({
        title: 'Đăng nhập không thành công!',
        text: 'Vui lòng kiểm tra lại thông tin đăng nhập!',
        icon: 'error',
    });
}
document.getElementById('check-login').addEventListener('click', function(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if(!(username == '' && password == '')){
        setSwal();
        setTimeout(function(){
            window.location.href = 'index.html';
        }, 2000);
    } else {
        setSwalError();
    }
});