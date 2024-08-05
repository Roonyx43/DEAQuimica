let signaturePad2;
let generatedPDF = null;
let vendorSignatureData = null;

window.onload = () => {

    const canvas2 = document.createElement('canvas');
    canvas2.width = 300;
    canvas2.height = 200;
    document.getElementById('signature-pad2').appendChild(canvas2);
    signaturePad2 = new SignaturePad(canvas2);

    // Carregar o PDF base
    fetch('/Orçamento/assets/Modelo_Orçamento.pdf')
        .then(response => response.arrayBuffer())
        .then(data => {
            const loadingTask = pdfjsLib.getDocument({data});
            loadingTask.promise.then(pdf => {
                pdf.getPage(1).then(page => {
                    const viewport = page.getViewport({scale: 1.0});
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext).promise.then(() => {
                        // Salvar a imagem renderizada
                        window.backgroundImage = canvas.toDataURL('image/png');
                    });
                });
            });
        });

    // Verificar URL para preencher formulário do cliente
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('budgetNumber') && urlParams.has('sellerName') && urlParams.has('document') && urlParams.has('email')) {
        showClientForm();
    }
};

function shortenUrl(longUrl, callback) {
    fetch(`https://tinyurl.com/api-create.php?url=${encodeURIComponent(longUrl)}`)
        .then(response => response.text())
        .then(shortUrl => {
            callback(shortUrl);
        })
        .catch(error => {
            console.error('Erro ao encurtar o link: ', error);
            callback(longUrl); // Caso ocorra um erro, retorna o link original
        });
}

function showClientForm() {
    const urlParams = new URLSearchParams(window.location.search);
    document.getElementById('budget-number').value = urlParams.get('budgetNumber');
    document.getElementById('seller-name').value = urlParams.get('sellerName');
    document.getElementById('seller-document').value = urlParams.get('document');
    document.getElementById('seller-email').value = urlParams.get('email');
    document.getElementById('client-form-container').style.display = 'flex';
    document.getElementById('vend-form').style.display= 'none';
}

function generateClientLink() {
    const budgetNumber = document.getElementById('budget-number').value;
    const sellerName = document.getElementById('seller-name').value;
    const documentValue = document.getElementById('seller-document').value;
    const emailValue = document.getElementById('seller-email').value;
    
    if (budgetNumber && sellerName && documentValue && emailValue) {
        const queryParams = `?budgetNumber=${encodeURIComponent(budgetNumber)}&sellerName=${encodeURIComponent(sellerName)}&document=${encodeURIComponent(documentValue)}&email=${encodeURIComponent(emailValue)}`;
        const clientFormLink = `${window.location.origin}${window.location.pathname}${queryParams}`;
        
        shortenUrl(clientFormLink, shortUrl => {
            const clientLinkContainer = document.getElementById('client-link');
            clientLinkContainer.innerHTML = '';
    
            const copyButton = document.createElement('button');
            copyButton.textContent = 'Copiar Link';
            copyButton.onclick = () => copyToClipboard(shortUrl);
            clientLinkContainer.appendChild(copyButton);
        });
    } else {
        alert("Por favor, preencha todos os campos e assine antes de gerar o link.");
    }
}

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Link copiado para a área de transferência!');
    }, (err) => {
        console.error('Erro ao copiar o link: ', err);
    });
}

function clearSignature() {
    signaturePad.clear();
}

function clearSignature2() {
    signaturePad2.clear();
}

function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const budgetNumber = document.getElementById('budget-number').value;
    const sellerName = document.getElementById('seller-name').value;
    const documentField = document.getElementById('seller-document').value;
    const emailValue = document.getElementById('seller-email').value;
    const clientSignatureData = signaturePad2.toDataURL();
    const sellerName2 = document.getElementById('client-name').value;
    const documentField2 = document.getElementById('client-document').value;
    const emailValue2 = document.getElementById('client-email').value;

    // Adicionar o PDF base como fundo
    if (window.backgroundImage) {
        doc.addImage(window.backgroundImage, 'PNG', 0, 0, 210, 297);
    }

    // Cabeçalho
    doc.setFontSize(22);
    doc.setTextColor('White');
    doc.setFont('helvetica', 'bold');
    doc.text('Declaração de Aprovação de Orçamento', 105, 13, null, null, 'center');

    // Informação do orçamento
    doc.setFontSize(24);
    doc.setTextColor('#7bc3cb');
    doc.text(`Dados do Vendedor`, 105, 40, 'center');
    doc.setFontSize(12);
    doc.setTextColor('white');
    doc.text(`Nº Orçamento: ${budgetNumber}`, 15, 26.5);
    doc.setTextColor('black');
    doc.setFontSize(18);
    doc.text(`Nome: ${sellerName}`, 105, 55, 'center');
    doc.text(`Documentos (RG ou CPF): ${documentField}`, 105, 65, 'center');
    doc.text(`Email: ${emailValue}`, 105, 75, 'center');
    doc.setLineWidth(0.5); // Define a espessura da linha
    doc.line(10, 132, 200, 132); // x1, y1, x2, y2
    doc.setFontSize(24);
    doc.setTextColor('#7bc3cb');
    doc.text(`Dados do Cliente`, 105, 145, 'center');
    doc.setFontSize(18);
    doc.setTextColor('black');
    doc.text(`Nome: ${sellerName2}`, 105, 155, 'center');
    doc.text(`Documentos (RG ou CPF): ${documentField2}`, 105, 165, 'center');
    doc.text(`Email: ${emailValue2}`, 105, 175, 'center');

    // Assinatura do vendedor
    if (vendorSignatureData) {
        doc.addImage(vendorSignatureData, 'PNG', 80, 90, 50, 25);
    }

    // Assinatura do cliente
    if (clientSignatureData) {
        doc.text('Assinatura do Cliente', 105, 230, null, null, 'center');
        doc.addImage(clientSignatureData, 'PNG', 80, 195, 50, 25);
    }

    generatedPDF = doc.output('blob');

    const pdfURL = URL.createObjectURL(generatedPDF);
    document.getElementById('pdf-frame').src = pdfURL;
    document.getElementById('pdf-preview').classList.remove('hidden');
}

function submitForm() {
    if (!generatedPDF) {
        alert('Por favor, gere o PDF primeiro.');
        return;
    }

    const sellerForm = document.getElementById('seller-form');
    const clientForm = document.getElementById('client-form');
    
    const formData = new FormData(sellerForm);
    
    // Adiciona os dados do formulário do cliente ao FormData
    const clientFormData = new FormData(clientForm);
    clientFormData.forEach((value, key) => {
        formData.append(key, value);
    });

    formData.append('pdf', generatedPDF, 'orcamento.pdf');

    fetch('send_email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => alert(result))
    .catch(error => console.error('Error:', error));
}
