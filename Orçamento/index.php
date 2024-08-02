<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Orçamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="imaged">
            <a href="../PaginaInicial/mainpage.php">
                <img src="../assets/logo.jpg" alt="D&A Tools">
            </a>
        </div>
    </header>
    <div class="container" id="vend-form" style="display: flex;">
        <a class="voltar" href="../PaginaInicial/mainpage.php">Voltar</a>
        <h1 class="orc">Orçamento</h1>
        <form id="seller-form" method="POST" action="send_email.php">
            <label for="budget-number">Nº Orçamento</label>
            <input type="text" id="budget-number" name="budget-number" required><br><br>
            
            <label for="seller-name">Nome Vendedor</label>
            <input type="text" id="seller-name" name="seller-name" required><br><br>
            
            <label for="seller-document">Documentos (RG ou CPF)</label>
            <input type="text" id="seller-document" name="seller-document" required><br><br>
        
            <label for="seller-email">Email do Vendedor</label>
            <input type="email" id="seller-email" name="seller-email" required><br><br>
            
            <label for="signature-pad">Assinatura Vendedor</label>
            <div id="signature-pad"></div><br>
            <button type="button" class="but-limp" onclick="clearSignature()">Limpar Assinatura</button><br><br>
            
            <button type="button" onclick="generateClientLink()">Informações Cliente</button>
        </form>
        
        <div id="client-link"></div>
    </div>

    <div class="container2" id="client-form-container" style="display: none;">
        <h1 class="orc">Formulário do Cliente</h1>
        <form id="client-form" method="POST" action="send_email.php">
            <label for="client-name">Nome do Cliente</label>
            <input type="text" id="client-name" name="client-name" required><br><br>
            
            <label for="client-document">Documentos do Cliente (RG ou CPF)</label>
            <input type="text" id="client-document" name="client-document" required><br><br>

            <label for="client-email">Email do Cliente</label>
            <input type="email" id="client-email" name="client-email" required><br><br>

            <label for="signature-pad2">Assinatura Cliente</label>
            <div id="signature-pad2"></div><br>
            <button type="button" class="but-limp2" onclick="clearSignature2()">Limpar Assinatura</button><br><br>

            <button type="button" onclick="generatePDF()">Gerar PDF</button>
            <div id="pdf-preview" class="hidden">
                <h2>Pré-visualização do PDF</h2>
                <iframe id="pdf-frame" style="width:100%; height:500px;"></iframe><br><br>
            </div>
            <button class="button-enviar" type="button" onclick="submitForm()">Enviar</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <script src="https://unpkg.com/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
