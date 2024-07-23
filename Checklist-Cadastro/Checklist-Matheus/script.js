document.addEventListener('DOMContentLoaded', function() {
    $('#cnpj').mask('99.999.999/9999-99');
    $('#cpf').mask('999.999.999-99');
    $('#ie').mask('999.999.999.999');
    $('#rg').mask('99.999.999-9');
});

function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const razaoSocial = document.getElementById('razaoSocial').value;
    const nomeFantasia = document.getElementById('nomeFantasia').value;
    const cnpj = document.getElementById('cnpj').value;
    const ie = document.getElementById('ie').value;
    const cpf = document.getElementById('cpf').value;
    const rg = document.getElementById('rg').value;
    // Pegar os demais valores dos inputs

    const data = [
        ['Razão Social', razaoSocial],
        ['Nome Fantasia', nomeFantasia],
        ['CNPJ', cnpj],
        ['IE', ie],
        ['CPF', cpf],
        ['RG', rg]
        // Adicione os demais campos aqui
    ];

    doc.autoTable({
        head: [['CHECKLIST CADASTRO', '']],
        body: data,
        theme: 'plain',
        styles: { fillColor: [255, 255, 255] },
        columnStyles: {
            0: { cellWidth: 50 },
            1: { cellWidth: 140 }
        },
        margin: { top: 20 }
    });

    doc.save('checklist_cadastro.pdf');
}
