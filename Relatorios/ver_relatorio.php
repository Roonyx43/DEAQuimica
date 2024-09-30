<?php
// Inclua o arquivo de configuração para conectar ao banco de dados
include('../config.php');

// Verifique se o ID foi passado na URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare a consulta SQL
    $sql = "SELECT * FROM relatorio_clientes WHERE id = ?";
    
    // Prepare a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // "i" indica que o parâmetro é um inteiro
    $stmt->execute();
    
    // Obtenha o resultado
    $result = $stmt->get_result();
    
    // Verifique se algum dado foi retornado
    if($result->num_rows > 0) {
        // Recupere os dados como um array associativo
        $cliente = $result->fetch_assoc();
    } else {
        echo "Nenhum registro encontrado.";
        exit;
    }
} else {
    echo "ID não foi passado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&A Tools</title>
    <link rel="stylesheet" href="../gestao-cliente/style.css">
</head>
<body>
<header>
        <div class="imaged">
            <a href="../PaginaInicial/mainpage.php">
                <img src="../assets/logo.jpg" alt="D&A Tools">
            </a>
        </div>
    </header>
    <div class="container">
        <a class='volt' href="../Relatorios/index.php">Voltar</a>
        <h1>Gestão Clientes</h1>
        <form id="clienteForm" action="salvar_cliente.php" method="post">
            <input type="hidden" id="id" name="id">

            <input type="hidden" id="nomeFixo" name="nomeFixo" value="Taniele">

            <div class="form-row">
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" id="cnpj" name="cnpj" value="<?php echo $cliente['cnpj']; ?>">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" value="<?php echo $cliente['cpf']; ?>">
                </div>
                <div class="form-group">
                    <label for="rg">RG</label>
                    <input type="text" id="rg" name="rg" value="<?php echo $cliente['rg']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="razaoSocial">Razão Social</label>
                    <input type="text" id="razaoSocial" name="razaoSocial" value="<?php echo $cliente['razaoSocial']; ?>">
                </div>
                <div class="form-group">
                    <label for="nomeFantasia">Nome Fantasia</label>
                    <input type="text" id="nomeFantasia" name="nomeFantasia" value="<?php echo $cliente['nomeFantasia']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="ramo">Ramo de Atividade</label>
                    <input type="text" id="ramo" name="ramo" value="<?php echo $cliente['ramo']; ?>">
                </div>
                <div class="form-group">
                    <label for="ie">Inscrição Estadual</label>
                    <input type="text" id="ie" name="ie" value="<?php echo $cliente['ie']; ?>">
                </div>
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" value="<?php echo $cliente['cep']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="end">Endereço</label>
                    <input type="text" id="end" name="end" value="<?php echo $cliente['end']; ?>">
                </div>
                <div class="form-group">
                    <label for="num">Número</label>
                    <input type="text" id="num" name="num" value="<?php echo $cliente['num']; ?>">
                </div>
                <div class="form-group">
                    <label for="comp">Complemento</label>
                    <input type="text" id="comp" name="comp" value="<?php echo $cliente['comp']; ?>">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" value="<?php echo $cliente['bairro']; ?>">
                </div>
                <div class="form-group">
                    <label for="municipio">Município</label>
                    <input type="text" id="municipio" name="municipio" value="<?php echo $cliente['municipio']; ?>">
                </div>
                <div class="form-group">
                    <label for="uf">UF</label>
                    <input type="text" id="uf" name="uf" value="<?php echo $cliente['uf']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="end2">Endereço (Entrega)</label>
                    <input type="text" id="end2" name="end2" value="<?php echo $cliente['end2']; ?>">
                </div>
                <div class="form-group">
                    <label for="num2">Número (Entrega)</label>
                    <input type="text" id="num2" name="num2" value="<?php echo $cliente['num2']; ?>">
                </div>
                <div class="form-group">
                    <label for="comp2">Complemento (Entrega)</label>
                    <input type="text" id="comp2" name="comp2" value="<?php echo $cliente['comp2']; ?>">
                </div>
                <div class="form-group">
                    <label for="bairro2">Bairro (Entrega)</label>
                    <input type="text" id="bairro2" name="bairro2" value="<?php echo $cliente['bairro2']; ?>">
                </div>
                <div class="form-group">
                    <label for="municipio2">Município (Entrega)</label>
                    <input type="text" id="municipio2" name="municipio2" value="<?php echo $cliente['municipio2']; ?>">
                </div>
                <div class="form-group">
                    <label for="uf2" class="uf_ent">UF (Entrega)</label>
                    <input type="text" id="uf2" name="uf2" value="<?php echo $cliente['uf2']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="contatoComercial">Contato Comercial</label>
                    <input type="text" id="contatoComercial" name="contatoComercial" value="<?php echo $cliente['contatoComercial']; ?>">
                </div>
                <div class="form-group">
                    <label for="telComercial">Telefone Comercial</label>
                    <input type="text" id="telComercial" name="telComercial" value="<?php echo $cliente['telComercial']; ?>">
                </div>
                <div class="form-group">
                    <label for="emailComercial">Email Comercial</label>
                    <input type="text" id="emailComercial" name="emailComercial" value="<?php echo $cliente['emailComercial']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="contatoFinanceiro">Contato Financeiro</label>
                    <input type="text" id="contatoFinanceiro" name="contatoFinanceiro" value="<?php echo $cliente['contatoFinanceiro']; ?>">
                </div>
                <div class="form-group">
                    <label for="telFinanceiro">Telefone Financeiro</label>
                    <input type="text" id="telFinanceiro" name="telFinanceiro" value="<?php echo $cliente['telFinanceiro']; ?>">
                </div>
                <div class="form-group">
                    <label for="emailFinanceiro">Email Financeiro</label>
                    <input type="text" id="emailFinanceiro" name="emailFinanceiro" value="<?php echo $cliente['emailFinanceiro']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="emailNF">Email para Envio de NF</label>
                    <input type="text" id="emailNF" name="emailNF" value="<?php echo $cliente['emailNF']; ?>">
                </div>
            </div>
            <h1>Dados do Vendedor</h1>
            <div class="form-row">
                <div class="form-group">
                    <label for="vendedor">Vendedor</label>
                    <input type="text" id="vendedor" name="vendedor" required value="<?php echo $cliente['vendedor2']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="apelidoEmpresa">Identificação Empresa</label>
                    <input type="text" id="apelidoEmpresa" name="apelidoEmpresa" value="<?php echo $cliente['apelidoEmpresa']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="comodato">Comodato</label>
                    <input type="text" id="comodato" name="comodato" required value="<?php echo $cliente['comodato']; ?>">
                </div>
                <div class="form-group">
                    <label for="condicoesPagamento">Condições de Pagamento</label>
                    <input type="text" id="condicoesPagamento" name="condicoesPagamento" required value="<?php echo $cliente['condicoesPagamento']; ?>">
                </div>
                <div class="form-group">
                    <label for="volumeCompras">Volume de Compras</label>
                    <input type="text" id="volumeCompras" name="volumeCompras" value="<?php echo $cliente['volumeCompras']; ?>">
                </div>
            </div>
        </form>
    </div>
</body>
</html>