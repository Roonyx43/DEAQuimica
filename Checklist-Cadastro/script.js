function validateForms() {
    const formCliente = document.getElementById('formdil1');
    const formVendedor = document.getElementById('formdil2');

    if (!formCliente.checkValidity()) {
        formCliente.reportValidity();
        return;
    }

    if (!formVendedor.checkValidity()) {
        formVendedor.reportValidity();
        return;
    }

    generatePDF();
}

function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Define o tamanho da fonte
    doc.setFontSize(10);

    // Coletando dados do primeiro formulário
    const formCliente = document.getElementById('formdil1');
    const formDataCliente = new FormData(formCliente);

    const dataCliente = {
        cnpj: formDataCliente.get('cnpj'),
        razaoSocial: formDataCliente.get('razaoSocial'),
        nomeFantasia: formDataCliente.get('nomeFantasia'),
        ramo: formDataCliente.get('ramo'),
        ie: formDataCliente.get('ie'),
        cep: formDataCliente.get('cep'),
        end: formDataCliente.get('end'),
        num: formDataCliente.get('num'),
        bairro: formDataCliente.get('bairro'),
        municipio: formDataCliente.get('municipio'),
        uf: formDataCliente.get('uf'),
        cep2: formDataCliente.get('cep2'),
        end2: formDataCliente.get('end2'),
        num2: formDataCliente.get('num2'),
        bairro2: formDataCliente.get('bairro2'),
        municipio2: formDataCliente.get('municipio2'),
        uf2: formDataCliente.get('uf2'),
        contatoComercial: formDataCliente.get('contatoComercial'),
        telComercial: formDataCliente.get('telComercial'),
        emailComercial: formDataCliente.get('emailComercial'),
        contatoFinanceiro: formDataCliente.get('contatoFinanceiro'),
        telFinanceiro: formDataCliente.get('telFinanceiro'),
        emailFinanceiro: formDataCliente.get('emailFinanceiro'),
        emailNF: formDataCliente.get('emailNF'),
    };

    // Coletando dados do segundo formulário
    const formVendedor = document.getElementById('formdil2');
    const formDataVendedor = new FormData(formVendedor);

    const dataVendedor = {
        vendedor: formDataVendedor.get('vendedor'),
        apelido: formDataVendedor.get('apelido'),
        comodato: formDataVendedor.get('comodato'),
        condicoesPagamento: formDataCliente.get('condicoesPagamento'),
        volumeCompras: formDataVendedor.get('volumeCompras')
    };

    let yOffset = 10;

    doc.text('Dados do Cliente', 10, yOffset);
    yOffset += 10;

    // Função para adicionar texto ao PDF se o campo não estiver vazio
    function addTextIfNotEmpty(label, value) {
        if (value) {
            doc.text(`${label}: ${value}`, 10, yOffset);
            yOffset += 10;
        }
    }

    // Adicionando dados do cliente ao PDF
    addTextIfNotEmpty('Razão Social', dataCliente.razaoSocial);
    addTextIfNotEmpty('Nome Fantasia', dataCliente.nomeFantasia);
    addTextIfNotEmpty('Ramo', dataCliente.ramo);
    addTextIfNotEmpty('Inscrição Estadual', dataCliente.ie);
    addTextIfNotEmpty('CEP', dataCliente.cep);
    addTextIfNotEmpty('Endereço', dataCliente.end);
    addTextIfNotEmpty('Número', dataCliente.num);
    addTextIfNotEmpty('Bairro', dataCliente.bairro);
    addTextIfNotEmpty('Município', dataCliente.municipio);
    addTextIfNotEmpty('UF', dataCliente.uf);
    addTextIfNotEmpty('CEP', dataCliente.cep2);
    addTextIfNotEmpty('Endereço (Entrega)', dataCliente.end2);
    addTextIfNotEmpty('Número (Entrega)', dataCliente.num2);
    addTextIfNotEmpty('Bairro (Entrega)', dataCliente.bairro2);
    addTextIfNotEmpty('Município (Entrega)', dataCliente.municipio2);
    addTextIfNotEmpty('UF (Entrega)', dataCliente.uf2);
    addTextIfNotEmpty('Contato Comercial', dataCliente.contatoComercial);
    addTextIfNotEmpty('Tel. Comercial', dataCliente.telComercial);
    addTextIfNotEmpty('Email Comercial', dataCliente.emailComercial);
    addTextIfNotEmpty('Contato Financeiro', dataCliente.contatoFinanceiro);
    addTextIfNotEmpty('Tel. Financeiro', dataCliente.telFinanceiro);
    addTextIfNotEmpty('Email Financeiro', dataCliente.emailFinanceiro);
    addTextIfNotEmpty('Email para NF', dataCliente.emailNF);
    addTextIfNotEmpty('Condições Pagamento', dataCliente.condicoesPagamento);

    yOffset += 10;

    doc.text('Dados do Vendedor', 10, yOffset);
    yOffset += 10;

    // Adicionando dados do vendedor ao PDF
    addTextIfNotEmpty('Vendedor', dataVendedor.vendedor);
    addTextIfNotEmpty('Apelido Empresa', dataVendedor.apelido);
    addTextIfNotEmpty('Comodato', dataVendedor.comodato);
    addTextIfNotEmpty('Volume de Compras', dataVendedor.volumeCompras);

    doc.save('checklist_cadastro.pdf');
}