<?php
include '../config.php';

// Escreva a consulta SQL para selecionar todos os dados da tabela `relatorios`
$sql = "SELECT * FROM relatorios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Empresa</th><th>Vendedor</th><th>Data de Cadastro</th><th>Data de Modificação</th><th>Data de Finalização</th><th>Ação</th></tr>";
    // Iterar sobre os resultados e exibi-los na tabela
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["empresa"] . "</td>";
        echo "<td>" . $row["vendedor2"] . "</td>";
        echo "<td>" . $row["data"] . "</td>";
        echo "<td>" . $row["data_modificação"] . "</td>";
        echo "<td>" . $row["data_finalização"] . "</td>";
        echo "<td><a href='ver_relatorio.php?id=" . $row["id"] . "'><img src='https://img.icons8.com/?size=100&id=1395&format=png&color=0099FF'></img></a></td>";
        echo "</tr>";
    }
    echo "</div>";
} else {
    echo "<p>Nenhum registro encontrado.</p>";
}

$conn->close();
?>
