<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function EnviarEmail($asunto,$correo,$body){
  //resultado por defecto
  $resultadoEmail = true;
  // La instanciación y el paso de `true` habilita excepciones 
  $mail = new PHPMailer(true);
  
  try { 
    $mail->SMTPDebug = 0;
    $mail->isSMTP(); // Enviar usando SMTP 
    $mail->Host       = "smtp.gmail.com "; // Configure el servidor SMTP para enviar a través de 
    $mail->SMTPAuth   = true; // Habilita la autenticación SMTP 
    $mail->Username   = 'notariesdigital@gmail.com'; // Nombre 
    $mail->Password   = 'Zvbbqg345'; // Contraseña SMTP 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilite el cifrado TLS; `PHPMailer :: ENCRYPTION_SMTPS` alentó encouraged
    $mail->Port = 587; // Puerto TCP para conectarse, use 465 para `PHPMailer :: ENCRYPTION_SMTPS` arriba

    // Destinatarios
    $mail->setFrom('notariesdigital@gmail.com', 'NOTARIES DIGITAL');
    $mail->addAddress($correo); // Agregar un destinatario 
    
    // Content
    $mail->isHTML(true); // Establecer el formato de correo electrónico en HTML 
    $mail->Subject = $asunto;
    $mail->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
      $resultadoEmail = false;
    }
    
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

  return $resultadoEmail;
}

?>