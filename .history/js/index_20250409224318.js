// doi mau menu khi scroll
window.addEventListener('scroll',function(){
    let start = this.document.querySelector('.start');
    if(window.scrollY > 100){
        start.classList.add('active');
    } else{
        start.classList.remove('active');
    }
});

window.addEventListener('scroll', function(){
    let m = document.querySelector('.menu');
    if (m) {
        if(window.scrollY > 100){
            m.classList.add('atv');
        }
        else{
            m.classList.remove('atv');
        }
    }
});

// show list o show1 trang index
var list =[
    "Kỹ thuật cao cùng với tâm huyết và sự đam mê trong thiết kế nội thất",
    "Tạo ra những không gian sống độc đáo và tinh tế, kết hợp sự sáng tạo và kiến ​​thức",
    "My House Decor - nơi sẵn lòng chia sẻ và hỗ trợ bạn trong mọi khía cạnh của quy trình thiết kế.",
    "My House Decor - nơi mà mọi ý tưởng độc đáo và phong cách sẽ được biến thành hiện thực",
    "Với My House Decor, bạn sẽ tìm thấy không gian sống mơ ước của mình.",
    "Bằng cách tạo ra những không gian sống ấm áp và đáng sống nhất.",
    "Tại My House Decor, chúng tôi tôn trọng và hiểu biết sâu sắc về cá nhân hóa và phong cách."
];

var result = document.getElementById("show1");
var currentIndex = 0;
function displayNextHeading(){
   result.textContent = list[currentIndex];
    currentIndex = (currentIndex + 1) % list.length;
    setTimeout(displayNextHeading, 9000);
}
displayNextHeading();
// button chuyen index => hotdecor
let chuyenhtml1 = document.querySelector('.chuyenhtml');
chuyenhtml1.addEventListener('click', function(){
    window.location.href = "decor.html";
});


