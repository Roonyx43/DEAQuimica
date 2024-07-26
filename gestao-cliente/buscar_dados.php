<?php
// Inclua o arquivo de configuração do banco de dados
include '../config.php';

// Verifique se a requisição é feita via AJAX
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];

    // Proteja contra injeção de SQL
    $campo = mysqli_real_escape_string($conn, $campo);
    $valor = mysqli_real_escape_string($conn, $valor);

    // Modifique a consulta SQL com base no campo de busca selecionado
    if ($campo == 'cnpj' || $campo == 'cpf') {
        // Para CNPJ e CPF, a busca deve ser exata
        $sql = "SELECT * FROM clientes WHERE $campo = '$valor'";
    } else {
        // Para Nome Fantasia e Razão Social, use LIKE para busca parcial
        $sql = "SELECT * FROM clientes WHERE $campo LIKE '%$valor%'";
    }

    // Execute a consulta
    $result = mysqli_query($conn, $sql);

    // Verifique se há resultados
    if (mysqli_num_rows($result) > 0) {
        // Exiba os resultados
        echo "<div class='table-container'>
                <table>
                    <tr>
                        <th>Razão Social</th>
                        <th>CNPJ/CPF</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            // Exiba CNPJ se disponível, senão exiba CPF
            $cnpj_cpf = !empty($row["cnpj"]) ? $row["cnpj"] : $row["cpf"];
            echo "<tr>
                    <td>" . $row["razaoSocial"] . "</td>
                    <td>" . $cnpj_cpf . "</td>
                    <td>" . $row["uf"] . "</td>
                    <td><button class='edit-btn' data-id='" . $row["id"] . "' style='background-color: green; color: white; padding: 5px; border: none; border-radius: 5px; cursor: pointer;'>Editar</button></td>
                  </tr>";
        }
        echo "</table></div>";
    } else {
        echo "<div class='container'><p>Nenhum cliente encontrado.</p></div>";
    }

    // Feche a conexão
    mysqli_close($conn);
}
?>
