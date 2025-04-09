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
$(document).ready(function(){
$(".owl-carousel").owlCarousel({
loop:true,
margin:10,
autoplay:true, // Tự động trượt
autoplayTimeout:4000, // Độ trễ giữa các lượt trượt (ms)
responsive:{
  0:{
      items:1
  },
  600:{
      items:3
  },
  1000:{
      items:5
  }
}
});
});
