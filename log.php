<?php
session_start(); // Inicie a sessão

if (isset($_POST['entrar']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
    include_once('config.php');   
    
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Prepare a consulta SQL
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        header('Location: index.php');
        exit();
    } else {
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $row['usuario']; // Armazene informações na sessão
        $_SESSION['id'] = $row['id'];
        $_SESSION['vendedor'] = $row['vendedor']; // Certifique-se de que o campo 'vendedor' exista na tabela de usuários
        header('Location: /PaginaInicial/mainpage.php');
        exit();
    }
}
?>