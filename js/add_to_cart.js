// doi mau menu khi scroll
window.addEventListener('scroll', function () {
    let start = this.document.querySelector('.start');
    if (window.scrollY > 100) {
        start.classList.add('active');
    } else {
        start.classList.remove('active');
    }
});

window.addEventListener('scroll', function () {
    let m = document.querySelector('.menu');
    if (m) {
        if (window.scrollY > 100) {
            m.classList.add('atv');
        }
        else {
            m.classList.remove('atv');
        }
    }
});

// tinh so don hang mua hang
let sum_item_cart = document.querySelectorAll('.cart-item');
let sum1 = sum_item_cart.length;
console.log(sum1);
document.getElementById('kq').innerHTML = sum1;
// input so luong san pham
function increment(id) {
    var input = document.getElementById(id);
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 1 : value;
    value++;
    input.value = value;
}

function decrement(id) {
    var input = document.getElementById(id);
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 1 : value;
    value = value <= 1 ? 1 : value - 1;
    input.value = value;
}
// tong tien
// let cartItems = document.querySelectorAll('.cart-item');
// let totalMoney = 0;
// function calculateTotal() {
//     totalMoney = 0;
//     cartItems.forEach(function(item) {
//         let priceString = item.querySelector('.giatien').textContent;
//         let price = parseFloat(priceString.replace(' VND', '').replace('.', '').replace(',', '.'));
//         let quantity = parseInt(item.querySelector('input[type="text"]').value);
//         let productTotal = price * quantity;
//         totalMoney += productTotal;
//     });
//     document.getElementById('total-money').innerHTML = totalMoney + ' VND';
//     document.getElementById('total-money1').innerHTML = totalMoney + ' VND';
// }
function increment(inputId) {
    let input = document.getElementById(inputId);
    let currentValue = parseInt(input.value);
    input.value = currentValue + 1;
    calculateTotal();
}
function decrement(inputId) {
    let input = document.getElementById(inputId);
    let currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
        calculateTotal();
    }
}
calculateTotal();

