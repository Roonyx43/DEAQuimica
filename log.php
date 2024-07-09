<?php
    if(isset($_POST['entrar']) && !empty($_POST['usuario']) && !empty($_POST['senha'])){

        include_once('config.php');    
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];


       $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";


        $result = $conn->query($sql);


        if(mysqli_num_rows($result) < 1){
            header('Location: index.php');
        } else {
            header('Location: /ProjetoDEA-main/index.html');
        }
    }

?>