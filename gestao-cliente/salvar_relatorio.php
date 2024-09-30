<?php
// Conexão com o banco de dados
include '../config.php';

$razaoSocial = $_POST['razaoSocial'];
$dataCriacao = $_POST['dataCriacao'];
$dataModificacao = $_POST['dataModificacao'];

// Insere os dados na tabela relatorios
$query = "INSERT INTO relatorios (razaoSocial, dataCriacao, dataModificacao) VALUES ('$razaoSocial', '$dataCriacao', '$dataModificacao')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Relatório salvo com sucesso.";
} else {
    echo "Erro ao salvar o relatório: " . mysqli_error($conn);
}
?>
