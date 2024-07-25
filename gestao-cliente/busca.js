async function fetchData(searchTerm = '', nomeFantasia = '', CNPJ = '') {
    if (searchTerm.trim() === '' && nomeFantasia.trim() === '' && CNPJ.trim() === '') {
        document.getElementById('results').innerHTML = '';
        return;
    }

    try {
        const queryParams = new URLSearchParams({ searchTerm, nomeFantasia, CNPJ });
        const response = await fetch('buscar_dados.php?' + queryParams.toString());
        const data = await response.json();

        const resultsDiv = document.getElementById('results');
        resultsDiv.innerHTML = '';

        if (data.length > 0) {
            data.forEach(item => {
                const div = document.createElement('div');

                if (item.nomeFantasia) {
                    const nomeFantasiaDiv = document.createElement('div');
                    nomeFantasiaDiv.innerHTML = `Nome Fantasia: ${item.nomeFantasia}`;
                    div.appendChild(nomeFantasiaDiv);
                }

                if (item.CNPJ) {
                    const CNPJDiv = document.createElement('div');
                    CNPJDiv.innerHTML = `CNPJ: ${item.CNPJ}`;
                    div.appendChild(CNPJDiv);
                }

                // Adicione outros campos conforme necessário
                if (item.outroCampo) {
                    const outroCampoDiv = document.createElement('div');
                    outroCampoDiv.innerHTML = `Outro Campo: ${item.outroCampo}`;
                    div.appendChild(outroCampoDiv);
                }

                resultsDiv.appendChild(div);
            });
        } else {
            resultsDiv.innerHTML = 'Nenhum resultado encontrado.';
        }
    } catch (error) {
        console.error('Erro ao buscar dados:', error);
    }
}

function handleInput(event) {
    const searchTerm = document.getElementById('searchTerm').value;
    const nomeFantasia = document.getElementById('nomeFantasia').value;
    const CNPJ = document.getElementById('CNPJ').value;
    fetchData(searchTerm, nomeFantasia, CNPJ);
}

window.onload = () => fetchData();
