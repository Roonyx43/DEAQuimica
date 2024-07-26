<?php
include 'config.php';

// Função para limpar dados de entrada
function cleanInput($data) {
    return stripslashes(trim($data));
}

// Capturar dados do formulário
$cnpj = !empty($_POST['cnpj']) ? cleanInput($_POST['cnpj']) : null;
$cpf = !empty($_POST['cpf']) ? cleanInput($_POST['cpf']) : null;
$rg = !empty($_POST['rg']) ? cleanInput($_POST['rg']) : null;
$razaoSocial = cleanInput($_POST['razaoSocial']);
$nomeFantasia = cleanInput($_POST['nomeFantasia']);
$ramo = cleanInput($_POST['ramo']);
$ie = cleanInput($_POST['ie']);
$cep = cleanInput($_POST['cep']);
$end = cleanInput($_POST['end']);
$num = cleanInput($_POST['num']);
$comp = !empty($_POST['comp']) ? cleanInput($_POST['comp']) : null;
$bairro = cleanInput($_POST['bairro']);
$municipio = cleanInput($_POST['municipio']);
$uf = cleanInput($_POST['uf']);

// Campos opcionais
$cep2 = !empty($_POST['cep2']) ? cleanInput($_POST['cep2']) : null;
$end2 = !empty($_POST['end2']) ? cleanInput($_POST['end2']) : null;
$num2 = !empty($_POST['num2']) ? cleanInput($_POST['num2']) : null;
$comp2 = !empty($_POST['comp2']) ? cleanInput($_POST['comp2']) : null;
$bairro2 = !empty($_POST['bairro2']) ? cleanInput($_POST['bairro2']) : null;
$municipio2 = !empty($_POST['municipio2']) ? cleanInput($_POST['municipio2']) : null;
$uf2 = !empty($_POST['uf2']) ? cleanInput($_POST['uf2']) : null;

// Definir variáveis opcionais não incluídas no seu exemplo
$contatoComercial = !empty($_POST['contatoComercial']) ? cleanInput($_POST['contatoComercial']) : null;
$telComercial = !empty($_POST['telComercial']) ? cleanInput($_POST['telComercial']) : null;
$emailComercial = !empty($_POST['emailComercial']) ? cleanInput($_POST['emailComercial']) : null;
$contatoFinanceiro = !empty($_POST['contatoFinanceiro']) ? cleanInput($_POST['contatoFinanceiro']) : null;
$telFinanceiro = !empty($_POST['telFinanceiro']) ? cleanInput($_POST['telFinanceiro']) : null;
$emailFinanceiro = !empty($_POST['emailFinanceiro']) ? cleanInput($_POST['emailFinanceiro']) : null;
$emailNF = !empty($_POST['emailNF']) ? cleanInput($_POST['emailNF']) : null;

// Obter a maior ID existente
$sql = "SELECT MAX(id) as last_id FROM clientes";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$last_id = $row['last_id'];

// Ajustar o próximo valor de AUTO_INCREMENT
$next_id = $last_id + 1;
$sql = "ALTER TABLE clientes AUTO_INCREMENT = $next_id";
$conn->query($sql);

// Inserir dados no banco de dados
$stmt = $conn->prepare("INSERT INTO clientes (cnpj, cpf, rg, razaoSocial, nomeFantasia, ramo, ie, cep, end, num, comp, bairro, municipio, uf, cep2, end2, num2, comp2, bairro2, municipio2, uf2, contatoComercial, telComercial, emailComercial, contatoFinanceiro, telFinanceiro, emailFinanceiro, emailNF) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

// Vincular parâmetros
$stmt->bind_param(
    'ssssssssssssssssssssssssssss',
    $cnpj, $cpf, $rg, $razaoSocial, $nomeFantasia, $ramo, $ie, $cep, $end, $num, $comp, $bairro, $municipio, $uf,
    $cep2, $end2, $num2, $comp2, $bairro2, $municipio2, $uf2,
    $contatoComercial, $telComercial, $emailComercial, $contatoFinanceiro, $telFinanceiro, $emailFinanceiro, $emailNF
);

if ($stmt->execute()) {
    header('Location: /gestao-cliente/index.html');
    exit();
} else {
    echo 'Não foi possível realizar o cadastro.';
}

$stmt->close();
$conn->close();
?>
