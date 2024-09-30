<?php
// Inclua o arquivo de configuração do banco de dados
include '../config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $vendedor = $_SESSION['vendedor'];

    $sql = "";
    $stmt = null;

    if ($campo == 'cnpj' || $campo == 'cpf') {
        $sql = "SELECT * FROM clientes WHERE $campo = ? AND vendedor = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $valor, $vendedor);
    } else {
        $sql = "SELECT * FROM clientes WHERE $campo LIKE ? AND vendedor = ?";
        $likeValor = '%' . $valor . '%';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $likeValor, $vendedor);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>
                <table>
                    <tr>
                        <th>Razão Social</th>
                        <th>CNPJ/CPF</th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>";
        while ($row = $result->fetch_assoc()) {
            $cnpj_cpf = !empty($row["cnpj"]) ? $row["cnpj"] : $row["cpf"];
            echo "<tr>
                    <td>" . htmlspecialchars($row["razaoSocial"]) . "</td>
                    <td>" . htmlspecialchars($cnpj_cpf) . "</td>
                    <td>" . htmlspecialchars($row["uf"]) . "</td>
                    <td><button class='edit-btn' data-id='" . htmlspecialchars($row["id"]) . "' style='background-color: green; color: white; padding: 5px; border: none; border-radius: 5px; cursor: pointer;'>Editar</button></td>
                  </tr>";
        }
        echo "</table></div>";
    } else {
        echo "<div class='container'><p>Nenhum cliente encontrado.</p></div>";
    }

    $stmt->close();
    $conn->close();
}

?>