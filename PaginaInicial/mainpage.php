<?php
    include('name.php'); // Inclui o name.php que agora contém a URL da imagem
    $user_id = $_SESSION['id'];

    // Consulta para buscar o link do banco de dados baseado no usuário logado
    $query = "SELECT link FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se encontrou um resultado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userLink = $row['link']; // Link do cliente
    } else {
        $userLink = ''; // Caso não encontre o link, pode deixar vazio
    }
 
    $stmt->close();
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&A Tools</title>
    <link rel="shortcut icon" href="../assets/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylechecklist.css">
    <script src="https://api.hgbrasil.com/weather?key=e78020af"></script>
</head>
<body>
    <?php
    include('../config.php');

    if (isset($nome_usuario)) {
        // Prepara a query para contar o número de clientes atribuídos ao vendedor logado
        $query = "SELECT COUNT(*) as total FROM clientes WHERE vendedor = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $vendedor_usuario); // Bind o nome do vendedor (logado) à query
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Armazena o número de clientes
        $totalClientes = 0;
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalClientes = $row['total'];
        }
    
        $stmt->close();
    } else {
        // Caso o nome do usuário não esteja disponível na sessão, ou algum erro ocorra
        $totalClientes = 0;
    }
    
    $conn->close();
    ?>
    
    <header>
        <div class="imaged">
            <a href="../PaginaInicial/mainpage.html">
                <img src="../assets/logo.jpg" alt="D&A Tools">
            </a>
        </div>
    </header>
    <main>
        <div class="main-page">
            <div class="cabecalho-main">
                <div class="fotoperf">
                    <label class="picture" for="picture__input" tabIndex="0">
                        <img src="../assets/Logo2.jpg" alt="" style="width: 100%;">
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
            <div class="checks">
                <div class="checkboxlist-list" style="width: 80%;">
                    <ul>
                        <h2 class="title-checklists">Checklists</h2>
                        <hr class="divisoria-checklist">
                        <li class="checklist-lavanderia"><a href="../ProjetoDEA-main/formlav.php" class="checklist-a">Lavanderia</a></li>
                        <li class="checklist-lavanderia2"><a href="../Checklist-Diluidor/formdil.php" class="checklist-b">Diluidor</a></li>
                    </ul>
                </div>
                     <div class="checkboxlist-list" style="width: 80%;">
                        <ul>
                                
                            <h2 class="title-checklists">Clientes</h2>
                            <hr class="divisoria-checklist">
                            <li class="checklist-lavanderia">
                                <div class="clientes">
                                    <a href="../gestao-cliente/index.php" class="checklist-a">Gestão</a>
                                    <?php if ($totalClientes > 0): ?>
                                        <span class="notification-bubble"><?php echo $totalClientes; ?></span>
                                    <?php endif; ?>
                                </div>
                        </li>
                        <li class="checklist-lavanderia"><a href="<?php echo htmlspecialchars($userLink); ?>" class="checklist-a">Cadastro</a></li>
                        <li class="checklist-lavanderia"><a onclick="copyToClipboard()" class="checklist-a" id="but_cop">Link</a></li>
                        <input type="hidden" id="userLink" value="<?php echo htmlspecialchars($userLink); ?>">
                    </ul>
                </div>
                <?php if ($categoria_usuario === 'Diretoria'): ?>
                    <div class="checkboxlist-list" style="width: 80%;">
                        <ul>
                            <h2 class="title-checklists">Relatórios</h2>
                            <hr class="divisoria-checklist">
                            <li class="checklist-lavanderia"><a href="../Relatorios/index.php" class="checklist-a">Clientes</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
                    
            </div>
        </div>
    </main>
    <script>
        function copyToClipboard() {
            // Obtém o valor do link do campo oculto
            var userLink = document.getElementById('userLink').value;

            // Cria um campo temporário para copiar o texto
            var tempInput = document.createElement('input');
            tempInput.style.position = 'absolute';
            tempInput.style.left = '-9999px';
            tempInput.value = userLink;
            document.body.appendChild(tempInput);

            // Seleciona e copia o texto
            tempInput.select();
            document.execCommand('copy');

            // Remove o campo temporário
            document.body.removeChild(tempInput);

            // Alerta o usuário que o link foi copiado
            alert('Link copiado para a área de transferência!');
        }
    </script>
</body>
</html>
