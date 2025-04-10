<?php
require_once '../vendor/PHPMailer-master/src/PHPMailer.php';
require_once '../vendor/PHPMailer-master/src/SMTP.php';
require_once '../vendor/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Feedback_Controller
{
    public function Feedback()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $title = $_POST['title'];
            $message = $_POST['message'];
            $date = $_POST['date'];
            $ma_support = $_POST['ma_support'];
            $username = $_POST['username'];

            $mailContent = "
    <html>
    <head>
        <title>$title</title>
    </head>
    <body>
        <p>Xin chào $username!,</p>
        <p>Nhận được yêu cầu của bạn, My House Decor xin được trả lời:</p>
        <p><strong>Nội dung:</strong> $title</p>
        <p><strong>Tin nhắn:</strong> $message</p>
        <p>Cảm ơn bạn đã liên hệ với chúng tôi!</p>
        <p>Trân trọng!</p>
        <p>Người phản hồi: $fullname.</p>
        <p>Ngày phản hồi: $date</p>
    <hr> Đây là Email phản hồi 1 chiều, nghĩa là chúng tôi không phản hồi lại,
             vui lòng không trả lời Email này, mọi vấn đề xin gửi về thông tin:<br>
             Hỗ trợ mã: $ma_support,<br>
             Email: huydolcer@gmail.com,<br>
             Điện thoại: +84 347 425 997,<br>
             Địa chỉ: 43 Nguyễn Sơn,TP Vinh,Nghệ An.<br>
             Một lần nữa xin cảm ơn bạn đã đồng hành cùng My House Decor!
    </body>
    </html>
";

            if (empty($fullname) || empty($email) || empty($title) || empty($message)) {
                header('Content-type: application/json');
                echo json_encode(['check' => false, 'message' => 'Vui lòng điền đủ thông tin trước khi gửi!']);
                return;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Content-type: application/json');
                echo json_encode(['check' => false, 'message' => 'Email không hợp lệ!']);
                return;
            }
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp-mail.outlook.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'myhousedecor203@hotmail.com';
                $mail->Password = 'abcabc123@@';
                $mail->CharSet = 'UTF-8';
                $mail->isHTML(true);
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('myhousedecor203@hotmail.com', $fullname);
                $mail->addAddress($email);

                $mail->Subject = $title;
                $mail->Body = $mailContent;

                $mail->send();
                require_once '../Model/Admin_ContactModel.php';
                $model = new Admin_ContactModel();
                $result = $model->UpdateStatus($ma_support);
                if ($result) {
                    header('Content-type: application/json');
                    echo json_encode(['check' => true, 'message' => 'Bạn đã gửi phản hồi thành công!']);
                } else {
                    header('Content-type: application/json');
                    echo json_encode(['check' => false, 'message' => 'Không thể thay đổi Trạng thái!']);
                }
            } catch (Exception $e) {
                header('Content-type: application/json');
                echo json_encode(['check' => false, 'message' => 'Phản hồi thất bại! Mã lỗi: ' . $mail->ErrorInfo]);
            }
        }
    }
}
$feedbackController = new Feedback_Controller();
$feedbackController->Feedback();
