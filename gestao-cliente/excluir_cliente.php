<?php
include('../config.php');

// Pega o ID do cliente
$clientId = $_POST['id'];

// Consulta para buscar as informações do cliente
$sql = "SELECT razaoSocial, cnpj, vendedor2, data_criacao, data_modificacao, cpf, rg, nomeFantasia, ramo, ie, cep, end, num, comp, bairro, municipio, uf, end2, num2, comp2, bairro2, municipio2, uf2, contatoComercial, telComercial, emailComercial, contatoFinanceiro, telFinanceiro, emailFinanceiro, emailNF, vendedor, apelidoEmpresa, comodato, condicoesPagamento, volumeCompras FROM clientes WHERE id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $clientId);
$stmt->execute();
$result = $stmt->get_result();
$cliente = $result->fetch_assoc();

// Se o cliente foi encontrado
if ($cliente) {
    // Extrai os dados do cliente
    $razaoSocial = $cliente['razaoSocial'];
    $cnpj = $cliente['cnpj'];
    $cpf = $cliente['cpf'];
    $rg = $cliente['rg'];
    $nomeFantasia = $cliente['nomeFantasia'];
    $ramo = $cliente['ramo'];
    $ie = $cliente['ie'];
    $cep = $cliente['cep'];
    $end = $cliente['end'];
    $num = $cliente['num'];
    $comp = $cliente['comp'];
    $bairro = $cliente['bairro'];
    $municipio = $cliente['municipio'];
    $uf = $cliente['uf'];
    $end2 = $cliente['end2'];
    $num2 = $cliente['num2'];
    $comp2 = $cliente['comp2'];
    $bairro2 = $cliente['bairro2'];
    $municipio2 = $cliente['municipio2'];
    $uf2 = $cliente['uf2'];
    $contatoComercial = $cliente['contatoComercial'];
    $telComercial = $cliente['telComercial'];
    $emailComercial = $cliente['emailComercial'];
    $contatoFinanceiro = $cliente['contatoFinanceiro'];
    $telFinanceiro = $cliente['telFinanceiro'];
    $emailFinanceiro = $cliente['emailFinanceiro'];
    $emailNF = $cliente['emailNF'];
    $vendedor = $cliente['vendedor'];
    $apelidoEmpresa = $cliente['apelidoEmpresa'];
    $comodato = $cliente['comodato'];
    $condicoesPagamento = $cliente['condicoesPagamento'];
    $volumeCompras = $cliente['volumeCompras'];
    $vendedor2 = $cliente['vendedor2'];
    $dataCriacao = $cliente['data_criacao'];
    $dataModificacao = $cliente['data_modificacao'];

    // Verifica a menor ID disponível antes de inserir uma nova linha
    $query = "SELECT id FROM relatorios ORDER BY id ASC";
    $resultId = $conn->query($query);
    $availableId = 1;

    while ($row = $resultId->fetch_assoc()) {
        if ($row['id'] != $availableId) {
            break;
        }
        $availableId++;
    }

    // Insere os dados na tabela "relatorios"
    $sqlInsert = "INSERT INTO relatorios (id, empresa, vendedor2, data, data_modificação, data_finalização) 
                  VALUES (?, ?, ?, ?, ?, NOW())";
    $stmtInsert = $conn->prepare($sqlInsert);
    $stmtInsert->bind_param("issss", $availableId, $razaoSocial, $vendedor2, $dataCriacao, $dataModificacao);
    $stmtInsert->execute();

    // Verifica se a inserção no relatorio foi bem-sucedida
    if ($stmtInsert->affected_rows > 0) {
        // Recebe os dados do formulári

        // Consulta SQL para inserir as informações na tabela relatorio_clientes
        $sqlInsertForm = "INSERT INTO relatorio_clientes (
            id ,cnpj, cpf, rg, razaoSocial, nomeFantasia, ramo, ie, cep, `end` , num, comp, bairro, municipio, uf, 
            end2, num2, comp2, bairro2, municipio2, uf2, contatoComercial, telComercial, emailComercial, 
            contatoFinanceiro, telFinanceiro, emailFinanceiro, emailNF, vendedor, apelidoEmpresa, comodato, condicoesPagamento, volumeCompras, vendedor2
        ) VALUES (? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        


        $stmtInsertForm = $conn->prepare($sqlInsertForm);
        $stmtInsertForm->bind_param("isssssssssssssssssssssssssssssssss",
            $availableId, $cnpj, $cpf, $rg, $razaoSocial, $nomeFantasia, $ramo, $ie, $cep, $end, $num, $comp, $bairro, $municipio, $uf,
            $end2, $num2, $comp2, $bairro2, $municipio2, $uf2, $contatoComercial, $telComercial, $emailComercial,
            $contatoFinanceiro, $telFinanceiro, $emailFinanceiro, $emailNF, $vendedor, $apelidoEmpresa, $comodato, $condicoesPagamento, $volumeCompras, $vendedor2);

        if ($stmtInsertForm->execute()) {
            // Exclui o cliente
            $sqlDelete = "DELETE FROM clientes WHERE id = ?";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bind_param("i", $clientId);
            $stmtDelete->execute();

            if ($stmtDelete->affected_rows > 0) {
                echo "Cadastro excluído com sucesso!";
            } else {
                echo "Erro ao excluir o cliente.";
            }
        } else {
            echo "Erro ao inserir os dados do formulário." . $stmtDelete->error;
        }
    } else {
        echo "Erro ao inserir no relatório.";
    }
} else {
    echo "Cliente não encontrado.";
}

// Fecha a conexão
$conn->close();
?>
