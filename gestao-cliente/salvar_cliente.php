<?php
// Inclua o arquivo de configuração do banco de dados
include '../config.php';

// Carregar classes do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carregar o autoload do PHPMailer se estiver usando Composer
require '../vendor/autoload.php'; // Caminho para o autoload do Composer

// Função para verificar se o campo está vazio e retornar NULL
function checkNull($value) {
    return empty($value) ? 'NULL' : "'" . mysqli_real_escape_string($GLOBALS['conn'], $value) . "'";
}

// Função para enviar email usando PHPMailer
function enviarEmail($razaoSocial) {
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP do Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'tideaquimica@gmail.com';  // Seu endereço de email do Gmail
        $mail->Password = 'xoja osrl nlch nglo';  // Sua senha do Gmail ou senha de app se você tiver 2FA ativado
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom('tideaquimica@gmail.com', 'Cadastro Pendente - D&A Tools');
        $mail->addAddress('ti@deaquimica.com.br');  // Destinatário

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Cliente Pendente';
        $mail->Body = "Cliente pendente: $razaoSocial";

        // Enviar o e-mail
        $mail->send();
        echo "<script>alert('E-mail enviado com sucesso.');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Falha ao enviar e-mail. Erro: {$mail->ErrorInfo}');</script>";
    }
}

// Verifique se a requisição é feita via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $cnpj = checkNull($_POST['cnpj']);
    $cpf = checkNull($_POST['cpf']);
    $rg = checkNull($_POST['rg']);
    $razaoSocial = mysqli_real_escape_string($conn, $_POST['razaoSocial']);  // Sem usar checkNull aqui
    $nomeFantasia = checkNull($_POST['nomeFantasia']);
    $ramo = checkNull($_POST['ramo']);
    $ie = checkNull($_POST['ie']);
    $cep = checkNull($_POST['cep']);
    $end = checkNull($_POST['end']);
    $num = checkNull($_POST['num']);
    $bairro = checkNull($_POST['bairro']);
    $municipio = checkNull($_POST['municipio']);
    $uf = checkNull($_POST['uf']);
    $end2 = checkNull($_POST['end2']);
    $num2 = checkNull($_POST['num2']);
    $bairro2 = checkNull($_POST['bairro2']);
    $municipio2 = checkNull($_POST['municipio2']);
    $uf2 = checkNull($_POST['uf2']);
    $contatoComercial = checkNull($_POST['contatoComercial']);
    $telComercial = checkNull($_POST['telComercial']);
    $emailComercial = checkNull($_POST['emailComercial']);
    $contatoFinanceiro = checkNull($_POST['contatoFinanceiro']);
    $telFinanceiro = checkNull($_POST['telFinanceiro']);
    $emailFinanceiro = checkNull($_POST['emailFinanceiro']);
    $emailNF = checkNull($_POST['emailNF']);
    $vendedor = mysqli_real_escape_string($conn, $_POST['vendedor']);  // Sem usar checkNull aqui
    $apelidoEmpresa = checkNull($_POST['apelidoEmpresa']);
    $comodato = checkNull($_POST['comodato']);
    $condicoesPagamento = checkNull($_POST['condicoesPagamento']);
    $volumeCompras = checkNull($_POST['volumeCompras']);

    // Prepare a consulta SQL para atualizar os dados
    $sql = "UPDATE clientes SET 
            cnpj = $cnpj, cpf = $cpf, rg = $rg, razaoSocial = '$razaoSocial', nomeFantasia = $nomeFantasia, 
            ramo = $ramo, ie = $ie, cep = $cep, end = $end, num = $num, bairro = $bairro, 
            municipio = $municipio, uf = $uf, end2 = $end2, num2 = $num2, bairro2 = $bairro2, 
            municipio2 = $municipio2, uf2 = $uf2, contatoComercial = $contatoComercial, telComercial = $telComercial, 
            emailComercial = $emailComercial, contatoFinanceiro = $contatoFinanceiro, telFinanceiro = $telFinanceiro, 
            emailFinanceiro = $emailFinanceiro, emailNF = $emailNF, vendedor = '$vendedor', apelidoEmpresa = $apelidoEmpresa, 
            comodato = $comodato, condicoesPagamento = $condicoesPagamento, data_modificacao = NOW() - INTERVAL 3 HOUR, volumeCompras = $volumeCompras
            WHERE id = '$id'";

    // Execute a consulta
    if (mysqli_query($conn, $sql)) {
        // Enviar email com a razão social do cliente
        enviarEmail($razaoSocial);

        // Atribua as variáveis PHP ao JavaScript dentro da string de echo
        echo "<script>
            var razaoSocial = '" . addslashes($razaoSocial) . "';
            var vendedor = '" . addslashes($vendedor) . "';
            alert('Cliente atualizado com sucesso.');
            window.location.href = '../PaginaInicial/mainpage.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro ao atualizar cliente: " . mysqli_error($conn) . "');
            window.location.href = '../PaginaInicial/mainpage.php';
        </script>";
    }

    // Feche a conexão
    mysqli_close($conn);
}

?>
