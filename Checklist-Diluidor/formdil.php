<?php
    include ('../PaginaInicial/name.php');

        if (!isset($_SESSION['usuario'])) {
        header("Location: log.php");
        exit();
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&A Tools</title>
    <link rel="shortcut icon" href="../assets/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.2.0/exceljs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="nexpage.js"></script>
    <script src="script.js"></script>
    <script src="alert.js"></script>
    <script src="show.js"></script>
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
        <div class="display-main">
            <h1 class="title-lavand">Checklist para Diluidor</h1>
            <form id="formdil1" class="formulario">
                <h1 class="title-cliente">Dados do Cliente</h1>
                <input type="date" id="dateInput" placeholder="Data de instalação" class="data-style">
                <input type="time" placeholder="Horário" class="time-style">
                <input type="text" id="texto-sem-numeros" placeholder="Nome do Cliente" required>
                <input type="number" id="texto-com-numeros" placeholder="Código do Cliente">
                <input type="text" id="texto-sem-numeros2" placeholder="Vendedor" value="<?php echo htmlspecialchars($nome_usuario); ?>" required readonly>
                <input type="text" id="texto-sem-numeros3" placeholder="Contato na instalação" required>
                <textarea placeholder="Observação" class="obs"></textarea> 
                <div class="buttons">
                    <label class="title-tens">Cliente:</label>
                    <div class="clientetipo">
                        <input type="checkbox" name="option" id="opt1" value="1" required>Cliente Novo
                        <input type="checkbox" name="option" id="opt2" value="2" required>Cliente Existente
                    </div>
                </div>
                <div class="buttons-tens">
                    <label class="title-tens">Tensão da Tomada:</label>
                    <div class="tensaotomada">
                        <input type="checkbox" name="option2" id="opt3" value="3" required>110v
                        <input type="checkbox" name="option2" id="opt4" value="4" required>220v
                    </div>
                </div>
                <div class="buttons-press" id="pressorflux">
                    <input type="checkbox" name="optionNothing" id="optNothing" value="400">Sem motobomba
                    <input type="checkbox" name="optionPress" id="optPress" value="85">Pressostato
                    <input type="checkbox" name="optionFlux" id="optFlux" value="86">Fluxostato
                </div>
                <div class="distanciahidr">
                    <input type="text" id="disthidr" placeholder="Distancia da hidraulica à central (m):" inputmode="decimal" pattern="\d*,?\d*">
                </div>
                <div class="distanciaelet">
                    <input type="text" id="distelet" placeholder="Distancia do ponto elétrico à central (m):" inputmode="decimal" pattern="\d*,?\d*">
                </div>
                <input type="email" id="email" placeholder="Email para envio comodato" required>
                <div class="plano">
                    <p>Plano de Higiene</p>
                    <div class="radioPlano">
                        <label for="sim">Sim</label>
                        <input type="radio" name="plano" id="radiosim" >

                        <label for="sim">Não</label>
                        <input type="radio" name="plano" id="radionao">
                    </div>
                </div>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar"><a href="../PaginaInicial/mainpage.php">Voltar</a></button>
                    <button type="button" class="next-page">Próxima Página</button>
                </div>
            </form>


            <form id="formdil2" class="formulario hidden">
                <h1 class="title-cliente">Dados do Painel</h1>
                <div class="buttons">
                    <label class="title-tens">Painel Cabe?</label>
                    <input type="checkbox" name="option4" id="opt7" value="7" required>Sim
                    <input type="checkbox" name="option4" id="opt8" value="8" required>Não
                </div>
                <div class="buttons">
                        <label class="title-tens">Entrada de Água</label>
                        <input type="checkbox" name="option5" id="opt9" value="9" required>Direita
                        <input type="checkbox" name="option5" id="opt10" value="10" required>Esquerda
                    </div>
                    <div class="buttons">
                        <label class="title-tens">Entrada Elétrica</label>
                        <input type="checkbox" name="option6" id="opt11" value="11" required>Direita
                        <input type="checkbox" name="option6" id="opt12" value="12" required>Esquerda
                    </div>
                <div class="conditional-section">
                    <div class="med1">
                        <p>Medida da parede (m): <p>
                        <input type="text" class="med-painel" placeholder="Altura" id="medpar1" inputmode="decimal" pattern="\d*,?\d*" required></label>
                        <input type="text" class="med-painel" placeholder="Largura" id="medpar2" inputmode="decimal" pattern="\d*,?\d*" required></label>
                    </div>
                </div>
            
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar" onclick="voltarParaFormulario()">Voltar</button>
                    <button type="button" class="next-page2">Próxima Página</button>
                </div>
            </form>


            <form id="formdil3" class="formulario hidden">
                <h1 class="title-cliente">Dados dos Equipamentos</h1>
                <h2 class="title-diluidor">Opções de Equipamento 1</h2>
                <div class="buttons">
                    <input type="checkbox" name="option7" id="opt13" value="13" required>Diluidor
                    <input type="checkbox" name="option7" id="opt14" value="14" required>Protwin
                    <input type="checkbox" name="option7" id="opt15" value="15" required>Dosador
                </div>
                <div class="setor">
                    <input type="text" class="inp_setor" placeholder="Setor" id="set1" required>
                </div>
                <div class="produto">
                    <input type="text" class="inp_produto" placeholder="Produto" id="prodeq1" required>
                </div>
                <div id="prod-hid1">
                    <input type="text" class="inp_produto" placeholder="Produto 2" id="prodeq1_b">
                </div>
                <div class="buttons">
                    <p>Galão:</p>
                    <input type="checkbox" name="option8" id="opt16" value="16" required>5L
                    <input type="checkbox" name="option8" id="opt17" value="17" required>20L
                    <input type="checkbox" name="option8" id="opt18" value="18" required>50L
                </div>
                <div class="buttons" id="prod-hid1_b">
                    <p>Galão 2:</p>
                    <input type="checkbox" name="option8_b" id="opt16_b" value="16" >5L
                    <input type="checkbox" name="option8_b" id="opt17_b" value="17" >20L
                    <input type="checkbox" name="option8_b" id="opt18_b" value="18" >50L
                </div>
                <h4 class="title-diluidor2">Informações Comerciais</h4>
                <div class="qntdmes">
                    <input type="text" placeholder="Quantidade Por Mês" id="qtdm1" required>
                </div>
                <div class="qntdmes" id="prod-hid1_c">
                    <input type="text" placeholder="Quantidade Por Mês (2)" id="qtdm1_b">
                </div>
                <div class="desconto">
                    <input type="text" placeholder="Desconto" id="desconto1">
                </div>
                <div class="desconto" id="prod-hid1_d">
                    <input type="text" placeholder="Desconto (2)" id="desconto1_b">
                </div>
                <div class="diluicao">
                    <input type="text" placeholder="Diluição (ml/L)" id="dil1"
                    inputmode="decimal" pattern="\d*,?\d*" required>
                </div>
                <div class="diluicao" id="prod-hid1_e">
                    <input type="text" placeholder="Diluição 2 (ml/L)" id="dil1_b"
                    inputmode="decimal" pattern="\d*,?\d*">
                </div>
                <div class="buttons">
                    <p>Bitola Hidraulica:</p>
                    <input type="checkbox" name="option9" id="opt19" value="19" required>3/4
                    <input type="checkbox" name="option9" id="opt20" value="20" required>1/2
                </div>
                <div class="buttons hidden" id="mangueira1">
                    <p>Mangueira Saída:</p>
                    <input type="checkbox" name="option10" id="opt21" value="21">GRF
                    <input type="checkbox" name="option10" id="opt22" value="22">BDE
                </div>
                <div class="buttons">
                    <p>Suporte de Produto:</p>
                    <input type="checkbox" name="option11" id="opt23" value="23" required>Sim
                    <input type="checkbox" name="option11" id="opt24" value="24" required>Não
                </div>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar" onclick="voltarParaFormulario2()">Voltar</button>
                    <button type="submit" class="button-enviar">Enviar</button>
                    <button type="button" class="next-page3">Adicionar Equipamento</button>
                </div>
            </form>


            <form id="formdil4" class="formulario hidden">
                <h1 class="title-cliente">Dados dos Equipamentos</h1>
                <h2 class="title-diluidor">Opções de Equipamento 2</h2>
                <div class="buttons">
                    <input type="checkbox" name="option12" id="opt25" value="25">Diluidor
                    <input type="checkbox" name="option12" id="opt26" value="26">Protwin
                    <input type="checkbox" name="option12" id="opt27" value="27">Dosador
                </div>
                <div class="setor">
                    <input type="text" class="inp_setor" placeholder="Setor" id="set2">
                </div>
                <div class="produto">
                    <input type="text" class="inp_produto" placeholder="Produto" id="prodeq2">
                </div>
                <div id="prod-hid2">
                    <input type="text" class="inp_produto" placeholder="Produto 2"
                    id="prodeq2_b">
                </div>
                <div class="buttons">
                    <p>Galão:</p>
                    <input type="checkbox" name="option13" id="opt28" value="28">5L
                    <input type="checkbox" name="option13" id="opt29" value="29">20L
                    <input type="checkbox" name="option13" id="opt30" value="30">50L
                </div>
                <div class="buttons" id="prod-hid2_b">
                    <p>Galão 2:</p>
                    <input type="checkbox" name="option13_b" id="opt28_b" value="28" >5L
                    <input type="checkbox" name="option13_b" id="opt29_b" value="29" >20L
                    <input type="checkbox" name="option13_b" id="opt30_b" value="30" >50L
                </div>
                <h4 class="title-diluidor2">Informações Comerciais</h4>
                <div class="qntdmes">
                    <input type="text" placeholder="Quantidade Por Mês" id="qtdm2">
                </div>
                <div class="qntdmes" id="prod-hid2_c">
                    <input type="text" placeholder="Quantidade Por Mês (2)" id="qtdm2_b">
                </div>
                <div class="desconto">
                    <input type="text" placeholder="Desconto" id="desconto2">
                </div>
                <div class="desconto" id="prod-hid2_d">
                    <input type="text" placeholder="Desconto (2)" id="desconto2_b" >
                </div>
                <div class="diluicao">
                    <input type="text" placeholder="Diluição (ml/L)" id="dil2">
                </div>
                <div class="diluicao" id="prod-hid2_e">
                    <input type="text" placeholder="Diluição 2 (ml/L)" id="dil2_b"
                    inputmode="decimal" pattern="\d*,?\d*">
                </div>
                <div class="buttons">
                    <p>Bitola Hidraulica:</p>
                    <input type="checkbox" name="option14" id="opt31" value="31">3/4
                    <input type="checkbox" name="option14" id="opt32" value="32">1/2
                </div>
                <div class="buttons hidden" id="mangueira2">
                    <p>Mangueira Saída:</p>
                    <input type="checkbox" name="option15" id="opt33" value="33">GRF
                    <input type="checkbox" name="option15" id="opt34" value="34">BDE
                </div>
                <div class="buttons">
                    <p>Suporte de Produto:</p>
                    <input type="checkbox" name="option16" id="opt35" value="35">Sim
                    <input type="checkbox" name="option16" id="opt36" value="36">Não
                </div>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar" onclick="voltarParaFormulario3()">Voltar</button>
                    <button type="submit" class="button-enviar">Enviar</button>
                    <button type="button" class="next-page4">Adicionar Equipamento</button>
                </div>
            </form>

            <form id="formdil5" class="formulario hidden">
                <h1 class="title-cliente">Dados dos Equipamentos</h1>
                <h2 class="title-diluidor">Opções de Equipamento 3</h2>
                <div class="buttons">
                    <input type="checkbox" name="option17" id="opt37" value="37">Diluidor
                    <input type="checkbox" name="option17" id="opt38" value="38">Protwin
                    <input type="checkbox" name="option17" id="opt39" value="39">Dosador
                </div>
                <div class="setor">
                    <input type="text" class="inp_setor" placeholder="Setor" id="set3">
                </div>
                <div class="produto">
                    <input type="text" class="inp_produto" placeholder="Produto" id="prodeq3">
                </div>
                <div id="prod-hid3">
                    <input type="text" class="inp_produto" placeholder="Produto 2"
                    id="prodeq3_b">
                </div>

                <div class="buttons">
                    <p>Galão:</p>
                    <input type="checkbox" name="option18" id="opt40" value="40">5L
                    <input type="checkbox" name="option18" id="opt41" value="41">20L
                    <input type="checkbox" name="option18" id="opt42" value="42">50L
                </div>
                <div class="buttons" id="prod-hid3_b">
                    <p>Galão 2:</p>
                    <input type="checkbox" name="option18_b" id="opt40_b" value="40" >5L
                    <input type="checkbox" name="option18_b" id="opt41_b" value="41" >20L
                    <input type="checkbox" name="option18_b" id="opt42_b" value="42" >50L
                </div>
                <h4 class="title-diluidor2">Informações Comerciais</h4>
                <div class="qntdmes">
                    <input type="text" placeholder="Quantidade Por Mês" id="qtdm3">
                </div>
                <div class="qntdmes" id="prod-hid3_c">
                    <input type="text" placeholder="Quantidade Por Mês (2)" id="qtdm3_b">
                </div>
                <div class="desconto">
                    <input type="text" placeholder="Desconto" id="desconto3">
                </div>
                <div class="desconto" id="prod-hid3_d">
                    <input type="text" placeholder="Desconto (2)" id="desconto3_b" >
                </div>
                <div class="diluicao">
                    <input type="text" placeholder="Diluição (ml/L)" id="dil3">
                </div>
                <div class="diluicao" id="prod-hid3_e">
                    <input type="text" placeholder="Diluição 2 (ml/L)" id="dil3_b"
                    inputmode="decimal" pattern="\d*,?\d*">
                </div>
                <div class="buttons">
                    <p>Bitola Hidraulica:</p>
                    <input type="checkbox" name="option19" id="opt43" value="43">3/4
                    <input type="checkbox" name="option19" id="opt44" value="44">1/2
                </div>
                <div class="buttons hidden" id="mangueira3">
                    <p>Mangueira Saída:</p>
                    <input type="checkbox" name="option20" id="opt45" value="45">GRF
                    <input type="checkbox" name="option20" id="opt46" value="46">BDE
                </div>
                <div class="buttons">
                    <p>Suporte de Produto:</p>
                    <input type="checkbox" name="option21" id="opt47" value="47">Sim
                    <input type="checkbox" name="option21" id="opt48" value="48">Não
                </div>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar" onclick="voltarParaFormulario4()">Voltar</button>
                    <button type="submit" class="button-enviar">Enviar</button>
                    <button type="button" class="next-page5">Adicionar Equipamento</button>
                </div>
            </form>


            <form id="formdil6" class="formulario hidden">
                <h1 class="title-cliente">Dados dos Equipamentos</h1>
                <h2 class="title-diluidor">Opções de Equipamento 4</h2>
                <div class="buttons">
                    <input type="checkbox" name="option22" id="opt49" value="49">Diluidor
                    <input type="checkbox" name="option22" id="opt50" value="50">Protwin
                    <input type="checkbox" name="option22" id="opt51" value="51">Dosador
                </div>
                <div class="setor">
                    <input type="text" class="inp_setor" placeholder="Setor" id="set4">
                </div>
                <div class="produto">
                    <input type="text" class="inp_produto" placeholder="Produto" id="prodeq4">
                </div>
                <div id="prod-hid4">
                    <input type="text" class="inp_produto" placeholder="Produto 2"
                    id="prodeq4_b">
                </div>
                <div class="buttons">
                    <p>Galão:</p>
                    <input type="checkbox" name="option23" id="opt52" value="52">5L
                    <input type="checkbox" name="option23" id="opt53" value="53">20L
                    <input type="checkbox" name="option23" id="opt54" value="54">50L
                </div>
                <div class="buttons" id="prod-hid4_b">
                    <p>Galão 2:</p>
                    <input type="checkbox" name="option23_b" id="opt52_b" value="52" >5L
                    <input type="checkbox" name="option23_b" id="opt53_b" value="53" >20L
                    <input type="checkbox" name="option23_b" id="opt54_b" value="54" >50L
                </div>
                <h4 class="title-diluidor2">Informações Comerciais</h4>
                <div class="qntdmes">
                    <input type="text" placeholder="Quantidade Por Mês" id="qtdm4">
                </div>
                <div class="qntdmes" id="prod-hid4_c">
                    <input type="text" placeholder="Quantidade Por Mês (2)" id="qtdm4_b">
                </div>
                <div class="desconto">
                    <input type="text" placeholder="Desconto" id="desconto4">
                </div>
                <div class="desconto" id="prod-hid4_d">
                    <input type="text" placeholder="Desconto (2)" id="desconto4_b" >
                </div>
                <div class="diluicao">
                    <input type="text" placeholder="Diluição (ml/L)" id="dil4">
                </div>
                <div class="diluicao" id="prod-hid4_e">
                    <input type="text" placeholder="Diluição 2 (ml/L)" id="dil4_b"
                    inputmode="decimal" pattern="\d*,?\d*">
                </div>
                <div class="buttons">
                    <p>Bitola Hidraulica:</p>
                    <input type="checkbox" name="option24" id="opt55" value="55">3/4
                    <input type="checkbox" name="option24" id="opt56" value="56">1/2
                </div>
                <div class="buttons hidden" id="mangueira4">
                    <p>Mangueira Saída:</p>
                    <input type="checkbox" name="option25" id="opt57" value="57">GRF
                    <input type="checkbox" name="option25" id="opt58" value="58">BDE
                </div>
                <div class="buttons">
                    <p>Suporte de Produto:</p>
                    <input type="checkbox" name="option26" id="opt59" value="59">Sim
                    <input type="checkbox" name="option26" id="opt60" value="60">Não
                </div>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar" onclick="voltarParaFormulario5()">Voltar</button>
                    <button type="submit" class="button-enviar">Enviar</button>
                    <button type="button" class="next-page6">Adicionar Equipamento</button>
                </div>
            </form>

            
            <form id="formdil7" class="formulario hidden">
                <h1 class="title-cliente">Dados dos Equipamentos</h1>
                <h2 class="title-diluidor">Opções de Equipamento 5</h2>
                <div class="buttons">
                    <input type="checkbox" name="option27" id="opt61" value="61">Diluidor
                    <input type="checkbox" name="option27" id="opt62" value="62">Protwin
                    <input type="checkbox" name="option27" id="opt63" value="63">Dosador
                </div>
                <div class="setor">
                    <input type="text" class="inp_setor" placeholder="Setor" id="set5">
                </div>
                <div class="produto">
                    <input type="text" class="inp_produto" placeholder="Produto" id="prodeq5">
                </div>
                <div id="prod-hid5">
                    <input type="text" class="inp_produto" placeholder="Produto 2"
                    id="prodeq5_b">
                </div>
                <div class="buttons">
                    <p>Galão:</p>
                    <input type="checkbox" name="option28" id="opt64" value="64">5L
                    <input type="checkbox" name="option28" id="opt65" value="65">20L
                    <input type="checkbox" name="option28" id="opt66" value="66">50L
                </div>
                <div class="buttons" id="prod-hid5_b">
                    <p>Galão 2:</p>
                    <input type="checkbox" name="option28_b" id="opt64_b" value="64" >5L
                    <input type="checkbox" name="option28_b" id="opt65_b" value="65" >20L
                    <input type="checkbox" name="option28_b" id="opt66_b" value="66" >50L
                </div>
                <h4 class="title-diluidor2">Informações Comerciais</h4>
                <div class="qntdmes">
                    <input type="text" placeholder="Quantidade Por Mês" id="qtdm5">
                </div>
                <div class="qntdmes" id="prod-hid5_c">
                    <input type="text" placeholder="Quantidade Por Mês (2)" id="qtdm5_b">
                </div>
                <div class="desconto">
                    <input type="text" placeholder="Desconto" id="desconto5">
                </div>
                <div class="desconto" id="prod-hid5_d">
                    <input type="text" placeholder="Desconto (2)" id="desconto5_b" >
                </div>
                <div class="diluicao">
                    <input type="text" placeholder="Diluição (ml/L)" id="dil5">
                </div>
                <div class="diluicao" id="prod-hid5_e">
                    <input type="text" placeholder="Diluição 2 (ml/L)" id="dil5_b"
                    inputmode="decimal" pattern="\d*,?\d*">
                </div>
                <div class="buttons">
                    <p>Bitola Hidraulica:</p>
                    <input type="checkbox" name="option29" id="opt67" value="67">3/4
                    <input type="checkbox" name="option29" id="opt68" value="68">1/2
                </div>
                <div class="buttons hidden" id="mangueira5">
                    <p>Mangueira Saída:</p>
                    <input type="checkbox" name="option30" id="opt69" value="69">GRF
                    <input type="checkbox" name="option30" id="opt70" value="70">BDE
                </div>
                <div class="buttons">
                    <p>Suporte de Produto:</p>
                    <input type="checkbox" name="option31" id="opt71" value="71">Sim
                    <input type="checkbox" name="option31" id="opt72" value="72">Não
                </div>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar" onclick="voltarParaFormulario6()">Voltar</button>
                    <button type="submit" class="button-enviar">Enviar</button>
                    <button type="button" class="next-page7">Adicionar Equipamento</button>
                </div>
            </form>

            <form id="formdil8" class="formulario hidden">
                <h1 class="title-cliente">Dados dos Equipamentos</h1>
                <h2 class="title-diluidor">Opções de Equipamento 6</h2>
                <div class="buttons">
                    <input type="checkbox" name="option32" id="opt73" value="73">Diluidor
                    <input type="checkbox" name="option32" id="opt74" value="74">Protwin
                    <input type="checkbox" name="option32" id="opt75" value="75">Dosador
                </div>
                <div class="setor">
                    <input type="text" class="inp_setor" placeholder="Setor" id="set6">
                </div>
                <div class="produto">
                    <input type="text" class="inp_produto" placeholder="Produto" id="prodeq6">
                </div>
                <div id="prod-hid6">
                    <input type="text" class="inp_produto" placeholder="Produto 2"
                    id="prodeq6_b">
                </div>
                <div class="buttons">
                    <p>Galão:</p>
                    <input type="checkbox" name="option33" id="opt76" value="76">5L
                    <input type="checkbox" name="option33" id="opt77" value="77">20L
                    <input type="checkbox" name="option33" id="opt78" value="78">50L
                </div>
                <div class="buttons" id="prod-hid6_b">
                    <p>Galão 2:</p>
                    <input type="checkbox" name="option33_b" id="opt76_b" value="76" >5L
                    <input type="checkbox" name="option33_b" id="opt77_b" value="77" >20L
                    <input type="checkbox" name="option33_b" id="opt78_b" value="78" >50L
                </div>
                <h4 class="title-diluidor2">Informações Comerciais</h4>
                <div class="qntdmes">
                    <input type="text" placeholder="Quantidade Por Mês" id="qtdm6">
                </div>
                <div class="qntdmes" id="prod-hid6_c">
                    <input type="text" placeholder="Quantidade Por Mês (2)" id="qtdm6_b">
                </div>
                <div class="desconto">
                    <input type="text" placeholder="Desconto" id="desconto6">
                </div>
                <div class="desconto" id="prod-hid6_d">
                    <input type="text" placeholder="Desconto (2)" id="desconto6_b" >
                </div>
                <div class="diluicao">
                    <input type="text" placeholder="Diluição (ml/L)" id="dil6">
                </div>
                <div class="diluicao" id="prod-hid6_e">
                    <input type="text" placeholder="Diluição 2 (ml/L)" id="dil6_b"
                    inputmode="decimal" pattern="\d*,?\d*">
                </div>
                <div class="buttons">
                    <p>Bitola Hidraulica:</p>
                    <input type="checkbox" name="option34" id="opt79" value="79">3/4
                    <input type="checkbox" name="option34" id="opt80" value="80">1/2
                </div>
                <div class="buttons hidden" id="mangueira6">
                    <p>Mangueira Saída:</p>
                    <input type="checkbox" name="option35" id="opt81" value="81">GRF
                    <input type="checkbox" name="option35" id="opt82" value="82">BDE
                </div>
                <div class="buttons">
                    <p>Suporte de Produto:</p>
                    <input type="checkbox" name="option36" id="opt83" value="83">Sim
                    <input type="checkbox" name="option36" id="opt84" value="84">Não
                </div>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar2" onclick="voltarParaFormulario7()">Voltar</button>
                    <button type="submit" class="button-enviar">Enviar</button>
                </div>
            </form>
    
        </div>
    </main>
    <script src="checkbox.js"></script>
</body>
</html>