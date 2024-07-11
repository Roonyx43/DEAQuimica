<?php
    session_start(); // Inicie a sessão

    if(isset($_POST['entrar']) && !empty($_POST['usuario']) && !empty($_POST['senha'])){

        include_once('config.php');   
        $id = $_POST['id']; 
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

        $result = $conn->query($sql);

        if(mysqli_num_rows($result) < 1){
            header('Location: index.php');
            
        } else {
            $row = $result->fetch_assoc();
            $_SESSION['usuario'] = $row['usuario']; // Armazene informações na session
            $_SESSION['id'] = $row['id'];
            header('Location: /PaginaInicial/mainpage.php');
        }
    }
?>
