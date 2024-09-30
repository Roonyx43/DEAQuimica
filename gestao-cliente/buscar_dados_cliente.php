<?php
// Conexão com o banco de dados
include '../config.php';

$clientId = $_POST['id'];

// Busca os dados do cliente na tabela clientes
$query = "SELECT razaoSocial, dataCriacao, dataModificacao FROM clientes WHERE id = '$clientId'";
$result = mysqli_query($conn, $query);

if ($result) {
    $cliente = mysqli_fetch_assoc($result);
    echo json_encode($cliente);
} else {
    echo json_encode(['error' => 'Erro ao buscar os dados do cliente.']);
}
?>
