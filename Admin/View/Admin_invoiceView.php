<?php 
    require_once './Controller/Admin_VTA_Controller.php';
    $orderID = $_GET['id_order'];
    $controller = new Admin_VTA_Controller();
    $result = $controller->export_VTA($orderID);
    $row = $result->fetch_assoc();
    $count = 1;
    $UserCustomer = $row['UserCustomer'];
    $Information = $row['Information'];
    $title = $row['Title'];
    $price = $row['Price'];
    $quantity = $row['Quantity'];
    $total_price = $row['Total_Price'];
?>
<div class="invoice-container">
        <div class="header">
            <div class="logo">
                <img src="img/Black and White Minimalist Professional Initial Logo.png" alt="My House Decor">
            </div>
            <div class="title">
                <h1 class="text-danger">HÓA ĐƠN BÁN HÀNG</h1>
                <p class="text-danger">Liên 2: Giao người mua</p>
            </div>
        </div>
        <div class="info">
            <div class="left">
                <p class="text-danger">Mẫu số: 01GTKT3/001</p>
                <p class="text-danger">Ký hiệu: BM/11P</p>
                <p class="text-danger">Số: 3030</p>
            </div>
            <div class="right">
                <i><p class="date text-danger"></p></i>
            </div>
        </div>
        <div class="company-info">
            <p class="text-danger">Đơn vị bán hàng: <strong class="text-danger">My House Decor</strong></p>
            <p class="text-danger">Mã số thuế: 0303246281</p>
            <p class="text-danger">Địa chỉ: 247 Lê Duẩn,Thành Phố Vinh, Nghệ An.</p>
            <p class="text-danger">Điện thoại: (03) 47 425 997 - (03) 63 348 582</p>
            <p class="text-danger">Số TK: 9.2003.6868.888 MB BANK - CHI NHÁNH NGHỆ AN </p>
        </div>
        <div class="buyer-info">
            <p class="text-danger">Tài Khoản mua hàng: .........<?php echo $UserCustomer;?>.............</p>
            <p class="text-danger">Thông tin Địa chỉ: ..<?php echo $Information;?>...</p>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th class="text-danger">STT</th>
                    <th class="text-danger">Tên hàng hóa, dịch vụ</th>
                    <th class="text-danger">Đơn vị tính</th>
                    <th class="text-danger">Số lượng</th>
                    <th class="text-danger">Đơn giá</th>
                    <th class="text-danger">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-danger"><?php echo $count;?></td>
                    <td class="text-danger"><?php echo $title;?></td>
                    <td class="text-danger">Cái</td>
                    <td class="text-danger"><?php echo $quantity;?></td>
                    <td class="text-danger"><?php echo number_format($price,0,'.','.');?></td>
                    <td class="text-danger"><?php echo number_format($total_price,0,'.','.');?></td>
                </tr>
            </tbody>
        </table>
        <div class="total">
            <p class="text-danger">Cộng tiền hàng: ...........<?php echo number_format($total_price,0,'.','.');?>.VND.......</p>
            <p class="text-danger">Số lượng: ..........<?php echo $quantity;?>.........</p>
            <p class="text-danger">Tổng cộng tiền thanh toán: .......<?php echo number_format($total_price,0,'.','.');?>.VND......</p>
            <p class="text-danger">Số tiền viết bằng chữ: .......................................................</p>
        </div>
        <div class="signatures">
            <div class="left-signature">
                <p class="text-danger">Người mua hàng</p>
                <p class="text-danger">(Ký, ghi rõ họ tên)</p>
            </div>
            <div class="right-signature">
                <p class="text-danger">Người bán hàng</p>
                <p class="text-danger">(Ký, đóng dấu, ghi rõ họ tên)</p>
                <p class="text-center text-danger">My House Decor</p>
            </div>
        </div>
    </div>
    <div class="mx-auto mt-4 mb-4">
        <button class="btn btn-success"onclick="exportPDF()">In hóa đơn</button>
    </div>
    <script>
        let date = new Date();
        let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();
        if (day < 10) {
            day = '0' + day;
        }
        if (month < 10) {
            month = '0' + month;
        }
        document.querySelector('.date').textContent = `Ngày ..${day}.. tháng ..${month}.. năm ..${year}..`;

        document.addEventListener('DOMContentLoaded', function () {
        window.jsPDF = window.jspdf.jsPDF;
});

function exportPDF() {
    const invoiceElement = document.querySelector('.invoice-container');
    
    if (!invoiceElement) {
        console.error('Không tìm thấy phần tử invoice-container');
        return;
    }

    html2canvas(invoiceElement).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jsPDF('p', 'mm', 'a4');
        
        const imgWidth = 210;
        const pageHeight = 295;
        const imgHeight = canvas.height * imgWidth / canvas.width;
        let heightLeft = imgHeight;
        let position = 0;

        pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
        heightLeft -= pageHeight;

        while (heightLeft >= 0) {
            position = heightLeft - imgHeight;
            pdf.addPage();
            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;
        }

        pdf.save('invoice_VAT.pdf');
    }).catch(function (error) {
        console.error('Không thể tạo PDF', error);
    });
}
    </script>