<?php
require_once '../Model/EXCEL_Model.php';
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class Exec_Controller
{
    private $model = null;

    public function __construct()
    {
        $this->model = new get_ExcelModel();
    }

    public function exportExcel($request)
    {
        if (isset($request['export_customer'])) {
            $exportData = $this->model->get_ExcelCustomer();
            $file_name = 'export_customer.xlsx';
        }else if(isset($request['export_staff'])) {
            $exportData = $this->model->get_ExcelStaff();
            $file_name = 'export_staff.xlsx';
        }else {
            return false;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Họ tên');
        $sheet->setCellValue('C1', 'Tài khoản');
        $sheet->setCellValue('D1', 'Mật khẩu Mã Hóa');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Số điện thoại');
        $sheet->setCellValue('G1', 'Địa chỉ');
        $sheet->setCellValue('H1', 'Ngày đăng ký');
        $sheet->setCellValue('I1', 'Trạng thái');
        //$sheet->setCellValue('J1', 'Hình ảnh');

        $count = 2;
        foreach ($exportData as $item) {
            switch ($item['Status']) {
                case 1:
                    $status = "Hoạt động";
                    break;
                case 2:
                    $status = "Ngừng hoạt động";
                    break;
                case 3:
                    $status = "Đình chỉ";
                    break;
            }
            $sheet->setCellValue('A' . $count, $item['UserID']);
            $sheet->setCellValue('B' . $count, $item['Title']);
            $sheet->setCellValue('C' . $count, $item['UserName']);
            $sheet->setCellValue('D' . $count, md5($item['Password']));
            $sheet->setCellValue('E' . $count, $item['Email']);
            $sheet->setCellValue('F' . $count, $item['Phone_Number']);
            $sheet->setCellValue('G' . $count, $item['Address']);
            $sheet->setCellValue('H' . $count, $item['RegistrationDate']);
            $sheet->setCellValue('I' . $count, $status);

            // $drawing = new Drawing();
            // $drawing->setName('Image');
            // $drawing->setDescription('Image');
            // $drawing->setPath($_SERVER['DOCUMENT_ROOT'] . '/' . $item['Image']);
            // $drawing->setCoordinates('J' . $count);
            // $drawing->setHeight(30);
            // $drawing->setWorksheet($spreadsheet->getActiveSheet());

            $sheet->getColumnDimension('A')->setAutoSize(true);
            $count++;
        }

        $temp_file = tempnam(sys_get_temp_dir(), 'export_');
        $writer = new Xlsx($spreadsheet);
        $writer->save($temp_file);

        if (file_exists($temp_file)) {
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $file_name . '"');
            header('Cache-Control: max-age=0');
            readfile($temp_file);
            unlink($temp_file);
            return true;
        } else {
            return false;
        }
    }
}

if (isset($_POST['export_customer'])) {
    $request = $_POST;
    $export = new Exec_Controller();
    $result = $export->exportExcel($request);
    if (!$result) {
        header('Content-Type: application/json');
        echo json_encode(['check' => false]);
    }
}elseif (isset($_POST['export_staff'])) {
    $request = $_POST;
    $export = new Exec_Controller();
    $result = $export->exportExcel($request);
    if (!$result) {
        header('Content-Type: application/json');
        echo json_encode(['check' => false]);
    }
}
?>
