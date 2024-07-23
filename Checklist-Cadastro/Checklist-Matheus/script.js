document.addEventListener('DOMContentLoaded', function() {
    $('#cnpj').mask('99.999.999/9999-99');
    $('#cpf').mask('999.999.999-99');
    $('#ie').mask('999.999.999.999');
    $('#rg').mask('99.999.999-9');
    $('#cep').mask('99.999-999');
    $('#telComercial').mask('(99) 9 9999-9999');
    $('#telFinanceiro').mask('(99) 9 9999-9999');
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
    const ramo = document.getElementById('ramo').value;
    const cep = document.getElementById('cep').value;
    const end = document.getElementById('end').value;
    const endEntrega = document.getElementById('endEntrega').value;
    const bairro = document.getElementById('bairro').value;
    const municipio = document.getElementById('municipio').value;
    const uf = document.getElementById('uf').value;
    const contatoComercial = document.getElementById('contatoComercial').value;
    const telComercial = document.getElementById('telComercial').value;
    const emailComercial = document.getElementById('emailComercial').value;
    const contatoFinanceiro = document.getElementById('contatoFinanceiro').value;
    const telFinanceiro = document.getElementById('telFinanceiro').value;
    const emailFinanceiro = document.getElementById('emailFinanceiro').value;
    const emailNF = document.getElementById('emailNF').value;
    const condicoesPagamento = document.getElementById('condicoesPagamento').value;
    const comodato = document.getElementById('comodato').value;
    const volumeCompras = document.getElementById('volumeCompras').value;

    const data = [
        ['Razão Social', razaoSocial],
        ['Nome Fantasia', nomeFantasia],
        ['CNPJ', cnpj],
        ['IE', ie],
        ['CPF', cpf],
        ['RG', rg],
        ['Ramo da Atividade', ramo],
        ['CEP', cep],
        ['Endereço', end],
        ['Endereço de Entrega', endEntrega],
        ['Bairro', bairro],
        ['Município', municipio],
        ['UF', uf],
        ['Contato Comercial', contatoComercial],
        ['Telefone/Celular Comercial', telComercial],
        ['Email Comercial', emailComercial],
        ['Contato Financeiro', contatoFinanceiro],
        ['Telefone/Celular Financeiro', telFinanceiro],
        ['Email Financeiro', emailFinanceiro],
        ['Email para envio de NF', emailNF],
        ['Condições de pagamento (Mensal ou Quinzenal)', condicoesPagamento],
        ['Comodato', comodato],
        ['Volume de compras', volumeCompras]
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
