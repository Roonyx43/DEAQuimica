<?php
// check_session.php
session_start();

// Supondo que o nome do vendedor seja armazenado na sessão durante o login
if (!isset($_SESSION['usuario'])) {
    // Redireciona para a página de login se o vendedor não estiver logado
    header('Location: /log.php');
    exit();
}

// Obtém o nome do vendedor da sessão
$vendedorNome = $_SESSION['vendedor'];
?>