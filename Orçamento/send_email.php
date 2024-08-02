<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se os campos necessários estão definidos
    $requiredFields = ['budget-number', 'seller-name', 'seller-document', 'seller-email', 'client-email', 'client-name', 'client-document'];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field])) {
            die("O campo $field é necessário.");
        }
    }

    $budgetNumber = $_POST['budget-number'];
    $sellerName = $_POST['seller-name'];
    $documentField = $_POST['seller-document'];
    $sellerEmail = $_POST['seller-email'];
    $clientName = $_POST['client-name'];
    $clientDocument = $_POST['client-document'];
    $clientEmail = $_POST['client-email'];

    if (!isset($_FILES['pdf'])) {
        die('PDF não enviado corretamente.');
    }

    $pdfPath = $_FILES['pdf']['tmp_name'];

    // Enviar email
    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'orcamentoaloja@gmail.com';
        $mail->Password = 'ltks xfqs fnqd xzol'; // Senha de aplicativo gerada
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinatários
        $mail->setFrom('orcamentoaloja@gmail.com', 'Aloja');
        $mail->addAddress('almoxarifado@aloja.net.br');
        $mail->addAddress($sellerEmail);
        $mail->addAddress($clientEmail);

        // Anexos
        $mail->addAttachment($pdfPath, 'budget.pdf');

        // Conteúdo
        $mail->isHTML(true);
        $mail->Subject = 'Novo Orcamento';
        $mail->Body    = "Nº Orçamento: $budgetNumber<br>Nome Vendedor: $sellerName<br>Documentos (RG ou CPF): $documentField<br>Nome Cliente: $clientName<br>Documentos Cliente (RG ou CPF): $clientDocument<br>Email Cliente: $clientEmail";

        $mail->send();
        echo 'Email enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar o email. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
