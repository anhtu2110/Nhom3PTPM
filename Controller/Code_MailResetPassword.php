<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/MyHouseDecorModel/ResetPasswordModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/MyHouseDecorAdmin/vendor/PHPMailer-master/src/PHPMailer.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/MyHouseDecorAdmin/vendor/PHPMailer-master/src/SMTP.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/MyHouseDecorAdmin/vendor/PHPMailer-master/src/Exception.php';


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    class Code_ChangePassword
    {
        private $model = null;

        public function __construct()
        {
            $this->model = new ResetPasswordModel();
        }
        public function SetPassword(){
            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = $_POST['email'];
                $email_cookie_name = 'user_' . md5($email);
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('Y-m-d H:i:s');
                $code_random = str_pad(mt_rand(0, 999999), 8, '0', STR_PAD_LEFT);
                setcookie($email_cookie_name,$code_random,time() + 70,'/');
                
                $mailConten = "<html>
                <title>Xin chào $email</title>
                <body>
                    <p>Chúng tôi đã nhận được yêu cầu thay đổi mật khẩu từ bạn,</p><br>
                    <p>Vui lòng không cung cấp mã này cho bất kì ai để tránh mất tài khoản!</p><br>
                    <p>Mã xác nhận của bạn là: <strong>$code_random</strong></p><br>
                    <hr>
                    <p>Ngày gửi: $date </p>
                     Đây là Email phản hồi 1 chiều, nghĩa là chúng tôi không phản hồi lại,
                         vui lòng không trả lời Email này, mọi vấn đề xin gửi về thông tin:<br>
                         Email: huydolcer@gmail.com,<br>
                         Điện thoại: +84 347 425 997,<br>
                         Địa chỉ: 43 Nguyễn Sơn,TP Vinh,Nghệ An.<br>
                         Một lần nữa xin cảm ơn bạn đã đồng hành cùng My House Decor!
                </body>
            </html>";

            $mail = new PHPMailer(true);
            try{
                $mail->isSMTP();
                $mail->Host ='smtp-mail.outlook.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'myhousedecor203@hotmail.com';
                $mail->Password = 'abcabc123@@';
                $mail->CharSet = 'UTF-8';
                $mail->isHTML(true);
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->setFrom('myhousedecor203@hotmail.com','Hỗ trợ My House Decor');
                $mail->addAddress($email);

                $mail->Subject = 'Mã xác nhận thay đổi mật khẩu';
                $mail->Body = $mailConten;

                $mail->send();
            }catch(Exception $ex){
                header('Content-type: application/json');
                echo json_encode(['check' => false, 'message' => 'Phản hồi thất bại! Mã lỗi: ' . $mail->ErrorInfo]);
            }
            }
        }
    }
    $feetBack_SupportPassword = new Code_ChangePassword();
    $feetBack_SupportPassword->SetPassword();
?>