function buscarCNPJ() {
    const cnpj = document.getElementById('cnpj').value.replace(/\D/g, '');

    if (cnpj.length !== 14) {
        alert('CNPJ inválido!');
        return;
    }

    const url = `https://brasilapi.com.br/api/cnpj/v1/${cnpj}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert('CNPJ não encontrado!');
                return;
            }

            document.getElementById('razaoSocial').value = data.razao_social;
            document.getElementById('nomeFantasia').value = data.nome_fantasia;
            document.getElementById('ramo').value = data.cnae_fiscal_descricao;
            document.getElementById('cep').value = data.cep;
            document.getElementById('end').value = data.logradouro;
            document.getElementById('num').value = data.numero;
            document.getElementById('bairro').value = data.bairro;
            document.getElementById('municipio').value = data.municipio;
            document.getElementById('uf').value = data.uf;
        })
        .catch(error => {
            console.error('Erro ao buscar o CNPJ:', error);
            alert('Erro ao buscar o CNPJ!');
        });
}
