<?php
include('../check_session.php');
include('../config.php'); // Inclua a configuração do banco de dados

// Capture o nome do vendedor logado da sessão
$vendedorNome = $_SESSION['vendedor'];

// Consulta para obter todos os clientes cadastrados pelo vendedor logado
$sql = "SELECT * FROM clientes WHERE vendedor = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $vendedorNome);
$stmt->execute();
$result = $stmt->get_result();
$clientes = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Cliente</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
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
        <div class="container-busca">
            <a class='volt' href="../PaginaInicial/mainpage.php">Voltar</a>
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
                <input type="hidden" name="vendedor" value="<?php echo htmlspecialchars($vendedorNome); ?>">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div id="resultados" class="container">
            <h1>Clientes</h1>
            <div class='table-container'>
                <table>
                    <thead>
                        <tr>
                            <th>Razão Social</th>
                            <th>CNPJ/CPF</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="clienteTableBody">
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($cliente['razaoSocial']); ?></td>
                                <td><?php echo htmlspecialchars(!empty($cliente['cnpj']) ? $cliente['cnpj'] : $cliente['cpf']); ?></td>
                                <td><?php echo htmlspecialchars($cliente['uf']); ?></td>
                                <td><button class='edit-btn' data-id='<?php echo htmlspecialchars($cliente['id']); ?>' style='background-color: green; color: white; padding: 5px; border: none; border-radius: 5px; cursor: pointer;'>Editar</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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
                    // Atualize apenas o corpo da tabela com os resultados da pesquisa
                    document.getElementById('clienteTableBody').innerHTML = xhr.responseText;
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

        document.getElementById('campo').addEventListener('change', function() {
            const valorInput = document.getElementById('valor');
            const selectedOption = this.value;

            if (selectedOption === 'cnpj') {
                valorInput.id = 'cnpjField2';
            } else if (selectedOption === 'cpf') {
                valorInput.id = 'cpfField2';
            } else {
                valorInput.id = 'valor';  // ID padrão
            }
        });

        // Adicione o evento para os botões de edição após carregar a página
        document.addEventListener('DOMContentLoaded', function() {
            addEditButtonsEvent();
        });
    </script>
    <script src="../Checklist-Cadastro/mask.js"></script>
</body>
</html>
