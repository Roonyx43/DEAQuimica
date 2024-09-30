<?php
session_start(); // Garante que a sessão esteja iniciada
include('../config.php'); // Inclui o arquivo de configuração com a conexão ao banco de dados

// Recupera o ID do usuário da sessão
if (!isset($_SESSION['id'])) {
    // Redireciona para a página de login se o usuário não estiver logado
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['id'];

// Consulta para recuperar o nome do usuário, o link e a categoria associada
$sql = "SELECT nome, link, categoria, vendedor FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome_usuario = $row['nome'];
    $user_link = $row['link']; // Adiciona o link ao name.php para reutilização
    $categoria_usuario = $row['categoria']; // Adiciona a categoria ao name.php para reutilização
    $vendedor_usuario = $row['vendedor']; // Adiciona a categoria ao name.php para reutilização
} else {
    $nome_usuario = "Usuário"; // Caso o nome do usuário não seja encontrado
    $user_link = "#"; // Caso o link do usuário não seja encontrado
    $categoria_usuario = ""; // Caso a categoria do usuário não seja encontrada
    $vendedor_usuario = ""; // Caso a categoria do usuário não seja encontrada
}

$stmt->close();
// Mantenha a conexão aberta para uso posterior no script principal
?>
