<?php
// Conexão com o banco de dados
include '../config.php';

// Define o cabeçalho para retorno JSON
header('Content-Type: application/json');

// Obtém o ID do cliente enviado via POST
$clientId = $_POST['id'];

// Verifica se o ID foi enviado
if (!$clientId) {
    echo json_encode(['error' => 'ID do cliente não foi fornecido.']);
    exit;
}

// Utiliza prepared statements para evitar SQL injection
$query = $conn->prepare("SELECT razaoSocial, dataCriacao, dataModificacao FROM clientes WHERE id = ?");
$query->bind_param('i', $clientId);  // 'i' indica que o parâmetro é um inteiro
$query->execute();
$result = $query->get_result();

// Verifica se o cliente foi encontrado
if ($result && $result->num_rows > 0) {
    $cliente = $result->fetch_assoc();
    echo json_encode($cliente);
} else {
    echo json_encode(['error' => 'Cliente não encontrado.']);
}

// Fecha a conexão
$query->close();
$conn->close();
?>
