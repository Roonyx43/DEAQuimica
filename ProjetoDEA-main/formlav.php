<?php
session_start();
     if (!isset($_SESSION['usuario'])) {
        header("Location: log.php");
        exit();
        }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&A Tools</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.2.0/exceljs.min.js"></script>
    <script src="checkbox.js" defer></script>
    <script src="script.js"></script>
    <script src="next.js"></script>
    <script src="addfunc.js"></script>
    <script src="addeq.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="restnum.js" defer></script>
    <link rel="shortcut icon" href="../assets/logo.ico" type="image/x-icon">
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
            <h1 class="title-lavand">Checklist para Lavanderia</h1>
            <form id="myForm" class="formulario">
                <h1 class="title-cliente">Dados do Cliente</h1>
                <input type="date" placeholder="Data de instalação" class="data-style">
                <input type="time" placeholder="Horário" class="time-style">
                <input type="text" id="texto-sem-numeros" placeholder="Nome do Cliente" required>
                <input type="number" id="texto-com-numeros" placeholder="Código do Cliente" required>
                <input type="text" id="texto-sem-numeros2" placeholder="Vendedor" required>
                <input type="text" id="texto-sem-numeros3" placeholder="Contato na instalação" required>
                <textarea placeholder="Observação" class="obs"></textarea> 
                <div class="buttons">
                    <input type="checkbox" id="opt1" name="option" value="1" required>Cliente Novo
                    <input type="checkbox" id="opt2" name="option" value="2" required>Cliente Existente
                </div>
                <div class="buttons-tens">
                    <p class="title-tens">Tensão da Tomada:</p>
                    <input type="checkbox" id="opt3" name="option2" value="3" required>110v
                    <input type="checkbox" id="opt4" name="option2" value="4" required>220v
                </div>
                <div class="buttons-conex">
                    <label class="title-tens">Conexão:</label>
                    <input type="checkbox" id="opt5" name="option3" value="5" required>3/4
                    <input type="checkbox" id="opt6" name="option3" value="6" required>1/2
                </div>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar"><a href="../PaginaInicial/mainpage.php">Voltar</a></button>
                    <button type="button" class="next-page">Próxima Página</button>
                </div>
            </form>

            <form id="secondForm" class="fm2 hidden">
                <h1 class="title-cliente">Dados do Painel</h1>
                <div class="buttons-tens2">
                    <p>O painel cabe?</p>
                    <input type="checkbox" id="opt9" name="option5" value="9" required>Sim
                    <input type="checkbox" id="opt10" name="option5" value="10" required>Não
                </div>
                <div class="buttons">
                    <p>Posição CPU no Painel:</p>
                    <input type="checkbox" id="opt7" name="option4" value="7" required>Direita
                    <input type="checkbox" id="opt8" name="option4" value="8" required>Esquerda
                </div>
                <div class="med1">
                    <p>Medida do chão ao ponto inferior do painel: </p>
                        <input type="number" class="med-painel" placeholder="Ex: 0,0m" id="medpai1" required>
                </div>
                <div class="med1">
                    <p>Medida da parede: <p>
                    <label>Altura<input type="number" class="med-painel" placeholder="Ex: 0,0" id="medpar1" inputmode="decimal" pattern="\d*,?\d*" required></label>
                    <label>Largura<input type="number" class="med-painel" placeholder="Ex: 0,0" id="medpar2" inputmode="decimal" pattern="\d*,?\d*" required></label>
                </div>
                <div class="med1">
                    <p>Distancia ponto de água até central: </p>
                        <input type="number" class="med-painel" placeholder="Ex: 0,0" inputmode="decimal" pattern="\d*,?\d*" id="dist" required>
                </div>
                <div class="med1">
                    <p>Distancia tomada até central: </p>
                        <input type="number" class="med-painel" placeholder="Ex: 0,0" inputmode="decimal" pattern="\d*,?\d*" id="dist2" required>
                </div>
                <div class="buttons-conex2">
                    <label class="title-tens">Ponto de água cliente:</label>
                    <input type="checkbox" id="opt11" name="option6" value="11" required>Direita
                    <input type="checkbox" id="opt12" name="option6" value="12" required>Esquerda
                </div>
                <div class="buttons-conex2">
                    <label class="title-tens">Ponto elétrica cliente:</label>
                    <input type="checkbox" id="opt13" name="option7" value="13" required>Direita
                    <input type="checkbox" id="opt14" name="option7" value="14" required>Esquerda
                </div>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar" onclick="voltarParaFormulario()">Voltar</button>
                    <button type="button" class="next-page-2">Próxima Página</button>
                </div>
            </form>
            <form id="formBombas" class="fm3 hidden">
                <h1 class="title-cliente">Dados do Produto</h1>
                <div id="productsContainer"></div>
                <button type="button" id="addProductButton">+</button>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar" onclick="voltarParaFormulario2()">Voltar</button>
                    <button type="button" class="next-page-3">Próxima Página</button>
                </div>
            </form>
            <form id="formEq" class="fm4 hidden">
                <h1 class="title-cliente">Dados referentes aos equipamentos</h1>
                <div id="equipmentContainer"></div>
                <div class="button-equipment">
                    <button type="button" id="addEquipmentButton">+</button>
                </div>
                <div class="buttons-enviar">
                    <button type="button" class="button-voltar" onclick="voltarParaFormulario3()">Voltar</button>
                    <button type="submit" class="button-enviar">Enviar</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
