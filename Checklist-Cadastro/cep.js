// cep.js

function buscarCEP() {
    const cep = document.getElementById('cep2').value.replace(/\D/g, '');

    if (cep.length !== 8) {
        alert('CEP inválido!');
        return;
    }

    const url = `https://viacep.com.br/ws/${cep}/json/`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.erro) {
                alert('CEP não encontrado!');
                return;
            }

            document.getElementById('end2').value = data.logradouro;
            document.getElementById('bairro2').value = data.bairro;
            document.getElementById('municipio2').value = data.localidade;
            document.getElementById('uf2').value = data.uf;
        })
        .catch(error => {
            console.error('Erro ao buscar o CEP:', error);
            alert('Erro ao buscar o CEP!');
        });
}
