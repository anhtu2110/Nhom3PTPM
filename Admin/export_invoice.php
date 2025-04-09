<?php require_once './Controller/auth.php';?>
<?php require_once './IncludeAdmin/header.php';?>
<style>
    body {
    font-family: Arial, sans-serif;
    color: red;
}
.invoice-container {
            width: 210mm;
            padding: 20mm;
            margin: 0 auto;
            background: white;
            font-family: Arial, sans-serif;
        }
        .header {
            display: flex;
            justify-content: space-between;
        }
        .logo img {
            max-width: 100px;
        }
        .title h1, .title p {
            text-align: center;
        }
        .info, .company-info, .buyer-info, .total, .signatures {
            margin-bottom: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .signatures div {
            display: inline-block;
            width: 45%;
            text-align: center;
        }

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
}

.logo img {
    max-width: 90px;
}

.title {
    text-align: center;
}

.title h1 {
    margin: 0;
    font-size: 24px;
}

.title p {
    margin: 0;
}

.info {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.company-info, .buyer-info {
    margin-top: 10px;
}

.invoice-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.invoice-table th, .invoice-table td {
    border: solid 1px red;;
    padding: 8px;
    text-align: left;
}

.total {
    margin-top: 10px;
}

.signatures {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.signatures p {
    text-align: center;
}
</style>
<?php require_once './View/Admin_invoiceView.php';?>
<?php
    require_once './IncludeAdmin/footer.php';
    ?>
