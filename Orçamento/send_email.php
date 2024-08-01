<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $budgetNumber = $_POST['budget-number'];
    $sellerName = $_POST['seller-name'];
    $documentField = $_POST['document'];

    if (!isset($_FILES['pdf'])) {
        die('PDF não enviado corretamente.');
    }

    $pdfPath = $_FILES['pdf']['tmp_name'];

    // Send email
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'matheusdloch@gmail.com';
        $mail->Password = 'bwms nlrm rvft bufr'; // Senha de aplicativo gerada
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('matheusdloch@gmail.com', 'Matheus Loch');
        $mail->addAddress('madarauchira726@gmail.com');
        $mail->addAddress('assistenciatecnica@deaquimica.com.br');
        

        // Attachments
        $mail->addAttachment($pdfPath, 'budget.pdf');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Novo Orcamento';
        $mail->Body    = "Nº Orçamento: $budgetNumber<br>Nome Vendedor: $sellerName<br>Documentos (RG ou CPF): $documentField";

        $mail->send();
        echo 'Email enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar o email. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
