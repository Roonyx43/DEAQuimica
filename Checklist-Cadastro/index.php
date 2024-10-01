<?php
    include '../config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/assets/logo.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
    <script src="mask.js"></script>
    <script src="cep.js"></script>
    <script src="chose.js"></script>
    <script src="cnpj.js"></script>
    <script src="chose2.js"></script>
    <script src="chose3.js"></script>
</head>
<body>
    <header>
        <div class="imaged">
            <img src="/assets/logo.jpg" alt="D&A Tools">
        </div>
    </header>
    <main>
        <div class="display-main">
            <h1 class="title-lavand">Bem-Vindo</h1>
            <form id="formdil1" class="formulario" action="/insertData.php" method="POST" autocomplete="off">
                <h1 class="title-cliente">Dados do Cliente</h1>

                <div class="form-group">
                    <label>Tipo de Cadastro:</label>
                    <div class="form-group2">
                        <input type="radio" id="cnpjRadio" name="tipoDocumento" value="cnpj" checked>
                        <label for="cnpjRadio" class="labelCnpj">CNPJ</label>
                        <input type="radio" id="cpfRadio" name="tipoDocumento" value="cpf">
                        <label for="cpfRadio" class="labelCpf">CPF</label>
                    </div>
                </div>

                <hr>

                <div id="cnpjField" class="form-group hidden">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" id="cnpj" name="cnpj" onblur="buscarCNPJ()" placeholder="*">
                </div>

                <div id="cpfField" class="form-group hidden">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="*">
                </div>

                <div id="rgField" class="form-group hidden">
                    <label for="rg">RG:</label>
                    <input type="text" id="rg" name="rg">
                </div>

                <div class="form-group">
                    <label for="razaoSocial">Razão Social:</label>
                    <input type="text" id="razaoSocial" name="razaoSocial" required placeholder="*">
                </div>

                <div class="form-group">
                    <label for="nomeFantasia">Nome Fantasia:</label>
                    <input type="text" id="nomeFantasia" name="nomeFantasia">
                </div>

                <div class="form-group">
                    <label for="ramo">Ramo de Atividade:</label>
                    <input type="text" id="ramo" name="ramo" required placeholder="*">
                </div>

                <div class="ie">
                    <div class="insc_est">
                        <label for="ie">Inscrição Estadual:</label>
                        <input type="text" id="ie" name="ie" required>
                    </div>
                    <div class="isento">
                        <label for="isento" class="isento">Isento</label>
                        <input type="checkbox" name="isento" id="isento" class="isent" style="margin-top: 11px;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" required placeholder="*">
                <br>
                </div>

                <div class="form-group">
                    <label for="end">Endereço:</label>
                    <input type="text" id="end" name="end" required placeholder="*">
                </div>

                <div class="form-group">
                    <label for="num">Número:</label>
                    <input type="text" id="num" name="num" required placeholder="*">
                </div>

                <div class="form-group">
                    <label for="comp">Complemento:</label>
                    <input type="text" id="comp" name="comp">
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" required placeholder="*">
                </div>

                <div class="form-group">
                    <label for="municipio">Município:</label>
                    <input type="text" id="municipio" name="municipio" required placeholder="*">
                </div>

                <div class="form-group">
                    <label for="uf">UF:</label>
                    <input type="text" id="uf" name="uf" required placeholder="*">
                </div>

                <hr>

                <div class="form-group">
                    <label>Endereço de Entrega é o mesmo?</label>
                    <div class="form-group2">
                        <input type="radio" id="sim" name="endereco?" value="sim">
                        <label for="sim" class="labelCnpj">Sim</label>
                        <input type="radio" id="nao" name="endereco?" value="nao"checked>
                        <label for="nao" class="labelCpf">Não</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cep2">CEP (Entrega):</label>
                    <input type="text" id="cep2" name="cep2" required onblur="buscarCEP()" value="">
                <br>
                </div>

                
                <div class="form-group">
                    <label for="end2">Endereço (Entrega):</label>
                    <input type="text" id="end2" name="end2" value="">
                </div>

                <div class="form-group">
                    <label for="num2">Número (Entrega):</label>
                    <input type="text" id="num2" name="num2" value="">
                </div>

                <div class="form-group">
                    <label for="comp2">Complemento (Entrega):</label>
                    <input type="text" id="comp2" name="comp2" value="">
                </div>

                <div class="form-group">
                    <label for="bairro2">Bairro (Entrega):</label>
                    <input type="text" id="bairro2" name="bairro2" value="">
                </div>

                <div class="form-group">
                    <label for="municipio2">Município (Entrega):</label>
                    <input type="text" id="municipio2" name="municipio2" value="">
                </div>

                <div class="form-group">
                    <label for="uf2">UF (Entrega):</label>
                    <input type="text" id="uf2" name="uf2" value="" >
                </div>

                <hr>

                <div class="form-group">
                    <label for="contatoComercial">Contato Comercial:</label>
                    <input type="text" id="contatoComercial" name="contatoComercial" required placeholder="Nome">
                </div>

                <div class="form-group">
                    <label for="telComercial">Telefone/Celular Comercial:</label>
                    <input type="text" id="telComercial" name="telComercial" required placeholder="*">
                </div>

                <div class="form-group">
                    <label for="emailComercial">Email Comercial:</label>
                    <input type="email" id="emailComercial" name="emailComercial" required placeholder="*">
                </div>

                <hr>

                <div class="form-group">
                    <label>Os dados de contato financeiro são os mesmos que os de contato comercial?</label>
                    <div class="form-group2">
                        <input type="radio" id="dadosSim" name="dadosIguais" value="sim">
                        <label for="dadosSim" class="dadosSim">Sim</label>
                        <input type="radio" id="dadosNao" name="dadosIguais" value="nao" checked>
                        <label for="dadosNao" class="dadosNao">Não</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="contatoFinanceiro">Contato Financeiro:</label>
                    <input type="text" id="contatoFinanceiro" name="contatoFinanceiro" required placeholder="Nome">
                </div>

                <div class="form-group">
                    <label for="telFinanceiro">Telefone/Celular Financeiro:</label>
                    <input type="text" id="telFinanceiro" name="telFinanceiro" required placeholder="*">
                </div>

                <div class="form-group">
                    <label for="emailFinanceiro">Email Financeiro:</label>
                    <input type="email" id="emailFinanceiro" name="emailFinanceiro" required placeholder="*">
                </div>

                <hr>

                <div class="form-group">
                    <label for="emailNF">Email para envio de NF:</label>
                    <input type="email" id="emailNF" name="emailNF" required placeholder="*">
                </div>

                <input type="hidden" id="vendedorNome" name="vendedorNome" value="">

                <input type="hidden" id="vendedor2" name="vendedor2" value="">

                <button type="submit" id="validarForm">Cadastrar</button>

            </form>


            <script src="script.js"></script>
            <script>
                const urlParams = new URLSearchParams(window.location.search);
                const vendedorNome = urlParams.get('vendedor');
                const vendedor2 = urlParams.get('vendedor2');
                document.getElementById('vendedorNome').value = vendedorNome;
                document.getElementById('vendedor2').value = vendedor2;
            </script>
        </div>
    </main>
</body>
</html>
