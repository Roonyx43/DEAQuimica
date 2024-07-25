<?php
// Inclua o arquivo de configuração do banco de dados
include '../config.php';

// Verifique se a requisição é feita via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Proteja contra injeção de SQL
    $id = mysqli_real_escape_string($conn, $id);

    // Faça a consulta para buscar os dados do cliente
    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    // Verifique se há resultados
    if (mysqli_num_rows($result) > 0) {
        $cliente = mysqli_fetch_assoc($result);

        // Substituir valores null por strings vazias
        array_walk($cliente, function(&$value) {
            if (is_null($value)) {
                $value = '';
            }
        });

        // Codificar os dados em JSON
        echo json_encode($cliente, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode([]);
    }

    // Feche a conexão
    mysqli_close($conn);
}
?>
