<?php
include_once '../assets/bootstrap.php';
require_once 'lib/PHPMailer/PHPMailer.php';
require_once 'lib/PHPMailer/SMTP.php';
require_once 'lib/PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$remetente = $_POST['remetente'];
$senha = $_POST['senha'];
$destinatario = $_POST['destinatario'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

if(empty($_POST) == false){
    try {
        /**
         * $mail->SMTPDebug = SMTP::DEBUG_OFF; -> consulte as opções do atributo para mais informações.
         * $mail->isSMTP(); -> enviar mensagens usando o protocolo SMTP
         * $mail->Host = 'smtp.gmail.com'; -> Host que utiliza o protocolo SMTP, no caso estou utilizando o gmail
         * $mail->SMTPAuth = true; -> Habilitar a autenticação do protocolo
         * $mail->Username = 'seuemail@gmail.com'; -> E-mail
         * $mail->Password = '123'; -> senha do E-mail
         * $mail->Port = 587; -> Porta para conexão
         */
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $remetente;
        $mail->Password = $senha;
        $mail->Port = 587;
    
        /**
         * $mail->setFrom('seu email');
         * $mail->addAddress('email do remetente');
         */
        $mail->setFrom($remetente);
        $mail->addAddress($destinatario);
    
        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $mail->Body = $mensagem;
        $mail->AltBody = strip_tags($mensagem);
    
        if($mail->send()){
            echo '<h1 class="text-success">Mensagem enviada!</h1>';
            include_once 'saveData.php';
            $up = new saveData($remetente, $destinatario, $assunto, $mensagem);
            unset($_SESSION, $_COOKIE, $remetente, $destinatario, $assunto, $mensagem, $_POST);
        } else {
            echo '<h1 class="text-danger">Mensagem não enviada!</h1>';
        }
    
    } catch (Exception $e) {
        echo "<h1 class='text-danger'>Erro ao enviar Mensagem: {$mail->ErrorInfo}</h1>
        <p>Vá na aba 'Configurações' para tentar resolver seu problema!</p>";
    }
}else{
    header('location:../index.php');
}

?>

<a href="../index.php" class="btn btn-primary mx-auto">VOLTAR A PÁGINA INICIAL</a>