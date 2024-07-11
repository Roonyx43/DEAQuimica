<?php
    include('name.php'); // Inclui o name.php que agora contém a URL da imagem
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&A Tools</title>
    <link rel="shortcut icon" href="../assets/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="fotoperf.js"></script>
    <link rel="stylesheet" href="stylechecklist.css">
</head>
<body>
    <header>
        <div class="imaged">
            <a href="../PaginaInicial/mainpage.php">
                <img src="../assets/logo.jpg" alt="D&A Tools">
            </a>
        </div>
    </header>
    <main>
        <div class="main-page">
            <div class="cabecalho-main">
                <div class="fotoperf">
                    <label class="picture" for="picture__input" tabIndex="0">
                        <img src="../assets/logo.jpg" alt="" style="width: 100%;">
                    </label>
                    
                </div>
                <h1 class="title-mainpage">Olá,<break>
                    <h1 class="title-mainpage2"> 
                        <?php echo htmlspecialchars($nome_usuario); ?>!
                    </h1>
                </h1>
                <div class="logout">
                    <a href="../logout.php" class="logout-but">SAIR</a>
                </div>
            </div>
            <hr>
            <div class="checkboxlist-list">
                <ul>
                    <h2 class="title-checklists">Checklists</h2>
                    <hr class="divisoria-checklist">
                    <li class="checklist-lavanderia"><a href="../ProjetoDEA-main/formlav.php" class="checklist-a">Lavanderia</a></li>
                    <li class="checklist-diluidor"></li>
                </ul>
            </div>
        </div>
    </main>
</body>
</html>
