<?php require_once 'PHPMailer-master/PHPMailerAutoload.php';


function enviarEmail($nome,$destinatario,$mensagem,$assunto){
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
													  // To load the French version
$mail->setLanguage('br', '/language/directory/');
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.cooper-rubi.com.br';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ricardo@cooper-rubi.com.br';                 // SMTP username
$mail->Password = 'cqto2233';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'ricardo@cooper-rubi.com.br';
$mail->FromName = 'Cadastro de Produtos';
$mail->addAddress($destinatario, $nome);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $assunto;
$mail->Body    = $mensagem;


 $mail->send();
}