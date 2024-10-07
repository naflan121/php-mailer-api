<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require __DIR__ . '/../vendor/autoload.php';




function sendEmail($data)
{
    $mail = new PHPMailer(true);

  

    try {
        // Server settings (adjust based on your mail server)
        $mail->isSMTP();
        $mail->Host = 'smtp_host';        // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'username'; // SMTP username
        $mail->Password = 'password';    // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('send_from_email', 'Backup System');
        $mail->addAddress('send_to_email');   // Add a recipient

        // Subject

        if($data['success']){

            $subject = $data['backup_name'] . " Backup Successful  ". $data['start_time'];
        }else {
            $subject = $data['backup_name'] . " Backup Failed  " . $data['start_time'];
        }

        $mail->Subject = $subject;

        $template = populateTemplate($data);  

        // Set the email body as HTML
        $mail->isHTML(true);
        $mail->Body = $template;

        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function populateTemplate($data)
{

    if ($data['success']){
       

        $template = file_get_contents(__DIR__ . '/success.html');
    } else {
        $template = file_get_contents(__DIR__ . '/failed.html');
    }

    foreach ($data as $key => $value) {
        $template = str_replace('{{' . $key . '}}', $value, $template);
    }



     return $template;
}