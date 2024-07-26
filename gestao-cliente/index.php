<?php
    include('../check_session.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>  
        <div class="imaged">
            <img src="/assets/logo.jpg" alt="D&A Tools">
        </div>
    </header>
    <main>
        <div class="container-busca">
            <a class='volt' href="../PaginaInicial/mainpage.php" >Voltar</a>
            <form id="buscarForm">
                <label for="campo">Filtro:</label>
                <select name="campo" id="campo">
                    <option value="cnpj">CNPJ</option>
                    <option value="cpf">CPF</option>
                    <option value="razaoSocial">Razão Social</option>
                    <option value="nomeFantasia">Nome Fantasia</option>
                </select>
                <label for="valor">Pesquisa:</label>
                <input type="text" name="valor" id="valor" required>
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div id="resultados" class="container">
            <H1>Clientes</H1>
        </div>
    </main>
    

    <script>
        document.getElementById('buscarForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Crie um objeto FormData com os dados do formulário
            var formData = new FormData(this);

            // Envie a requisição AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'buscar_dados.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Atualize a div de resultados com a resposta do servidor
                    document.getElementById('resultados').innerHTML = xhr.responseText;
                    addEditButtonsEvent();
                } else {
                    console.error('Erro ao buscar os dados.');
                }
            };
            xhr.send(formData);
        });

        function addEditButtonsEvent() {
            var editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var clientId = this.getAttribute('data-id');
                    
                    // Faça uma requisição AJAX para buscar os dados do cliente
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'buscar_cliente.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            var cliente = JSON.parse(xhr.responseText);
                            var params = new URLSearchParams(cliente).toString();
                            window.location.href = 'editar_cliente.php?' + params;
                        } else {
                            console.error('Erro ao buscar os dados do cliente.');
                        }
                    };
                    xhr.send('id=' + clientId);
                });
            });
        }
    </script>
</body>
</html>
