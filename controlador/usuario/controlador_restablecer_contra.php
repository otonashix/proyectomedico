<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
   
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require '../../modelo/modelo_usuario.php';
$MU = new modelo_usuario();
$email =htmlspecialchars($_POST['emailrestab'],ENT_QUOTES,'UTF-8');
$contraactual =htmlspecialchars($_POST['contrasena'],ENT_QUOTES,'UTF-8');
$contra =password_hash($_POST['contrasena'],PASSWORD_DEFAULT,["cost"=>10]);
$consulta = $MU->restablecer_contra($email,$contra);
if($consulta=="1"){

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username='juan.tobar@cun.edu.co';//este debe ir en el address?
        $mail->Password='cenenyangela';                            // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('juan.tobar@cun.edu.co');
        $mail->addAddress($email);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Nuevo Codigo de Acceso';
        $mail->Body    = 'Acontinuacion se le Asignara una nueva contraseña para el ingreso a la plataforma de servicio medico de Indeportes Tolima<br> Nueva Contraseña=<b>'.$contraactual.'<b>';

        $mail->send();
        echo '1';
    } catch (Exception $e) {
        echo $e;
    }
}else{
    echo '2';
}
?>