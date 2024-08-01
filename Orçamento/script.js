let signaturePad;
let generatedPDF = null;

window.onload = () => {
    const canvas = document.createElement('canvas');
    canvas.width = 300;
    canvas.height = 200;
    document.getElementById('signature-pad').appendChild(canvas);
    signaturePad = new SignaturePad(canvas);

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
};

function clearSignature() {
    signaturePad.clear();
}

function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const budgetNumber = document.getElementById('budget-number').value;
    const sellerName = document.getElementById('seller-name').value;
    const documentField = document.getElementById('document').value;
    const signatureDataURL = signaturePad.toDataURL();

    // Adicionar o PDF base como fundo
    if (window.backgroundImage) {
        doc.addImage(window.backgroundImage, 'PNG', 0, 0, 210, 297);
    }

    // Cabeçalho
    doc.setFontSize(26);
    doc.setTextColor('White')
    doc.setFont('helvetica', 'bold');
    doc.text('Orçamento', 105, 13, null, null, 'center');

    // Informação do orçamento
    doc.setFontSize(12);
    doc.setTextColor('black')
    doc.text(`Nº Orçamento: ${budgetNumber}`, 10, 40);
    doc.text(`Nome Vendedor: ${sellerName}`, 10, 50);
    doc.text(`Documentos (RG ou CPF): ${documentField}`, 10, 60);

    

    // Assinatura
    doc.setFontSize(18);
    doc.text('Assinatura', 105, 200, null, null, 'center');
    doc.addImage(signatureDataURL, 'PNG', 80, 205, 0, 30);

    // Linha horizontal
    doc.line(10, 235, 200, 235);

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

    const formData = new FormData(document.getElementById('budget-form'));
    formData.append('pdf', generatedPDF, 'budget.pdf');

    fetch('send_email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => alert(result))
    .catch(error => console.error('Error:', error));
}
