<?php
    session_start(); // Inicie a sessão

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php');
        exit();
    }
?>