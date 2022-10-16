<?php
    //* import library phpmailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require '../../model/PHPMailer-master/src/Exception.php';
    require '../../model/PHPMailer-master/src/PHPMailer.php';
    require '../../model/PHPMailer-master/src/SMTP.php';
    
    function paymentSuccess($title, $content, $email, $user_name){
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'nhutvichung@gmail.com'; 
            $mail->Password   = 'mpkbcccovycwqyqc';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom('nhutvichung@gmail.com', 'VICN');
            $mail->addAddress($email, $user_name);
            $mail->addAddress('nhutvichung@gmail.com'); 
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body    = $content;
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>