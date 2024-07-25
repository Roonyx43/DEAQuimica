<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Clientes</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

</head>
<body>
    <header>
        
        <div class="imaged">
            <img src="/assets/logo.jpg" alt="D&A Tools">
        </div>
        <a class='volt' href="../gestao-cliente/index.php" >Voltar</a>

        </div>
    </header>
    <div class="container">
        <h1>Gestão Clientes</h1>
        <form id="clienteForm" action="salvar_cliente.php" method="post">
            <input type="hidden" id="id" name="id">
            <div class="form-row">
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" id="cnpj" name="cnpj">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf">
                </div>
                <div class="form-group">
                    <label for="rg">RG</label>
                    <input type="text" id="rg" name="rg">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="razaoSocial">Razão Social</label>
                    <input type="text" id="razaoSocial" name="razaoSocial">
                </div>
                <div class="form-group">
                    <label for="nomeFantasia">Nome Fantasia</label>
                    <input type="text" id="nomeFantasia" name="nomeFantasia">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="ramo">Ramo de Atividade</label>
                    <input type="text" id="ramo" name="ramo">
                </div>
                <div class="form-group">
                    <label for="ie">Inscrição Estadual</label>
                    <input type="text" id="ie" name="ie">
                </div>
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="end">Endereço</label>
                    <input type="text" id="end" name="end">
                </div>
                <div class="form-group">
                    <label for="num">Número</label>
                    <input type="text" id="num" name="num">
                </div>
                <div class="form-group">
                    <label for="comp">Complemento</label>
                    <input type="text" id="comp" name="comp">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro">
                </div>
                <div class="form-group">
                    <label for="municipio">Município</label>
                    <input type="text" id="municipio" name="municipio">
                </div>
                <div class="form-group">
                    <label for="uf">UF</label>
                    <input type="text" id="uf" name="uf">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="end2">Endereço (Entrega)</label>
                    <input type="text" id="end2" name="end2">
                </div>
                <div class="form-group">
                    <label for="num2">Número (Entrega)</label>
                    <input type="text" id="num2" name="num2">
                </div>
                <div class="form-group">
                    <label for="comp2">Complemento (Entrega)</label>
                    <input type="text" id="comp2" name="comp2">
                </div>
                <div class="form-group">
                    <label for="bairro2">Bairro (Entrega)</label>
                    <input type="text" id="bairro2" name="bairro2">
                </div>
                <div class="form-group">
                    <label for="municipio2">Município (Entrega)</label>
                    <input type="text" id="municipio2" name="municipio2">
                </div>
                <div class="form-group">
                    <label for="uf2">UF (Entrega)</label>
                    <input type="text" id="uf2" name="uf2">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="contatoComercial">Contato Comercial</label>
                    <input type="text" id="contatoComercial" name="contatoComercial">
                </div>
                <div class="form-group">
                    <label for="telComercial">Telefone Comercial</label>
                    <input type="text" id="telComercial" name="telComercial">
                </div>
                <div class="form-group">
                    <label for="emailComercial">Email Comercial</label>
                    <input type="text" id="emailComercial" name="emailComercial">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="contatoFinanceiro">Contato Financeiro</label>
                    <input type="text" id="contatoFinanceiro" name="contatoFinanceiro">
                </div>
                <div class="form-group">
                    <label for="telFinanceiro">Telefone Financeiro</label>
                    <input type="text" id="telFinanceiro" name="telFinanceiro">
                </div>
                <div class="form-group">
                    <label for="emailFinanceiro">Email Financeiro</label>
                    <input type="text" id="emailFinanceiro" name="emailFinanceiro">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="emailNF">Email para Envio de NF</label>
                    <input type="text" id="emailNF" name="emailNF">
                </div>
            </div>
            <h1>Dados do Vendedor</h1>
            <div class="form-row">
                <div class="form-group">
                    <label for="vendedor">Vendedor</label>
                    <input type="text" id="vendedor" name="vendedor">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="apelidoEmpresa">Apelido Empresa</label>
                    <input type="text" id="apelidoEmpresa" name="apelidoEmpresa">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="comodato">Comodato</label>
                    <input type="text" id="comodato" name="comodato">
                </div>
                <div class="form-group">
                    <label for="condicoesPagamento">Condições de Pagamento</label>
                    <input type="text" id="condicoesPagamento" name="condicoesPagamento">
                </div>
                <div class="form-group">
                    <label for="volumeCompras">Volume de Compras</label>
                    <input type="text" id="volumeCompras" name="volumeCompras">
                </div>
            </div>
            <div class="form-actions">
                <button type="button" onclick="generateReport()">Gerar Relatório</button>
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var urlParams = new URLSearchParams(window.location.search);
        var clientId = urlParams.get('id');

        if (clientId) {
            // Fazer requisição AJAX para buscar os dados do cliente
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'buscar_cliente.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var cliente = JSON.parse(xhr.responseText);

                    // Preencher os campos do formulário com os dados do cliente
                    for (var key in cliente) {
                        if (cliente.hasOwnProperty(key)) {
                            var element = document.getElementById(key);
                            if (element) {
                                element.value = decodeURIComponent(cliente[key]);
                            }
                        }
                    }
                } else {
                    console.error('Erro ao buscar os dados do cliente.');
                }
            };
            xhr.send('id=' + encodeURIComponent(clientId));
        }
    });

    function generateReport() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        const data = [
            ["CNPJ", document.getElementById("cnpj").value],
            ["CPF", document.getElementById("cpf").value],
            ["RG", document.getElementById("rg").value],
            ["Razão Social", document.getElementById("razaoSocial").value],
            ["Nome Fantasia", document.getElementById("nomeFantasia").value],
            ["Ramo de Atividade", document.getElementById("ramo").value],
            ["Inscrição Estadual", document.getElementById("ie").value],
            ["CEP", document.getElementById("cep").value],
            ["Endereço", document.getElementById("end").value],
            ["Número", document.getElementById("num").value],
            ["Bairro", document.getElementById("bairro").value],
            ["Município", document.getElementById("municipio").value],
            ["UF", document.getElementById("uf").value],
            ["Endereço (Entrega)", document.getElementById("end2").value],
            ["Número (Entrega)", document.getElementById("num2").value],
            ["Bairro (Entrega)", document.getElementById("bairro2").value],
            ["Município (Entrega)", document.getElementById("municipio2").value],
            ["UF (Entrega)", document.getElementById("uf2").value],
            ["Contato Comercial", document.getElementById("contatoComercial").value],
            ["Telefone Comercial", document.getElementById("telComercial").value],
            ["Email Comercial", document.getElementById("emailComercial").value],
            ["Contato Financeiro", document.getElementById("contatoFinanceiro").value],
            ["Telefone Financeiro", document.getElementById("telFinanceiro").value],
            ["Email Financeiro", document.getElementById("emailFinanceiro").value],
            ["Email para Envio de NF", document.getElementById("emailNF").value],
            ["Vendedor", document.getElementById("vendedor").value],
            ["Apelido Empresa", document.getElementById("apelidoEmpresa").value],
            ["Comodato", document.getElementById("comodato").value],
            ["Condições de Pagamento", document.getElementById("condicoesPagamento").value],
            ["Volume de Compras", document.getElementById("volumeCompras").value]
        ];

        doc.autoTable({
            head: [['Campo', 'Valor']],
            body: data,
            theme: 'striped'
        });

        doc.save('relatorio_cliente.pdf');
    }
    </script>
</body>
</html>
