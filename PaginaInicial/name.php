<?php
    session_start(); // Adicionando caso não esteja presente
    include ('../config.php');
    
    // Recupera o ID do usuário da sessão
    if (!isset($_SESSION['id'])) {
        // Redireciona para a página de login se o usuário não estiver logado
        header("Location: ../login.php");
        exit();
    }

    $user_id = $_SESSION['id'];

    // Consulta para recuperar o nome e a imagem do usuário
    $sql = "SELECT nome, imagem FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome_usuario = $row['nome'];
        $imagem_usuario = $row['imagem'];
    } else {
        $nome_usuario = "Usuário"; // Caso o nome do usuário não seja encontrado
        $imagem_usuario = null; // Caso a imagem do usuário não seja encontrada
    }

    $stmt->close();
    $conn->close();
?>
