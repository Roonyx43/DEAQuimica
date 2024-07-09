<?php

    if(isset($_POST['entrar'])){
        print_r($_POST['usuario']);
        print_r($_POST['senha']);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&A Tools</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleformlogin.css">
    <link rel="shortcut icon" type="imagex/png" href="./assets/logo.ico">
<body>
    <header>
        <img src="assets/logo.jpg" alt="Logo">
    </header>

    <main>
        <div class="wrapper fadeInDown">
            <div class="content-login">
                <h2 class="active"> Login </h2>
                <form class="box-login" method="POST" action="log.php">
                    <input type="text" id="usuario" class="campo" name="usuario" placeholder="Usuário" required>
                    <input type="password" id="password" class="campo" name="senha" placeholder="Senha" required>
                    <input type="submit" class="botao" name="entrar" id="entrar" value="Entrar">
                </form>
                <div class="box-lembrar-senha">  
                    <a class="link" href="#">Lembrar Senha?</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
