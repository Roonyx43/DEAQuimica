document.addEventListener('DOMContentLoaded', function() {
    const sim = document.getElementById('sim');
    const nao = document.getElementById('nao');
    const cep2 = document.getElementById('cep2');
    const end2 = document.getElementById('end2');
    const num2 = document.getElementById('num2');
    const comp2 = document.getElementById('comp2')
    const bairro2 = document.getElementById('bairro2');
    const municipio2 = document.getElementById('municipio2');
    const uf2 = document.getElementById('uf2');
    

    let previousSelection = null;

    sim.addEventListener('change', toggleFields);
    nao.addEventListener('change', toggleFields);

    function toggleFields() {
        if (previousSelection && previousSelection !== getSelectedOption()) {
            clearFields();
        }

        if (nao.checked) {
            cep2.parentElement.classList.remove('hidden');
            end2.parentElement.classList.remove('hidden');
            num2.parentElement.classList.remove('hidden');
            comp2.parentElement.classList.remove('hidden');
            bairro2.parentElement.classList.remove('hidden');
            municipio2.parentElement.classList.remove('hidden');
            uf2.parentElement.classList.remove('hidden');
            enableFields();
        } else if (sim.checked) {
            cep2.parentElement.classList.add('hidden');
            end2.parentElement.classList.add('hidden');
            num2.parentElement.classList.add('hidden');
            comp2.parentElement.classList.add('hidden');
            bairro2.parentElement.classList.add('hidden');
            municipio2.parentElement.classList.add('hidden');
            uf2.parentElement.classList.add('hidden');
            disableFields();
        }

        previousSelection = getSelectedOption();
    }

    function getSelectedOption() {
        if (sim.checked) {
            return 'sim';
        } else if (nao.checked) {
            return 'nao';
        }
        return null;
    }

    function clearFields() {
        // Limpa todos os campos de entrada
        const inputs = document.querySelectorAll('input[type="text"][value="2"]');
        inputs.forEach(input => input.value = '');

    }

    function enableFields() {
        cep2.disabled = false;
        end2.disabled = false;
        num2.disabled = false;
        comp2.disabled = false;
        bairro2.disabled = false;
        municipio2.disabled = false;
        uf2.disabled = false;
    }

    function disableFields() {
        cep2.disabled = true;
        end2.disabled = true;
        num2.disabled = true;
        comp2.disabled = true;
        bairro2.disabled = true;
        municipio2.disabled = true;
        uf2.disabled = true;

    }

    // Chama a função inicialmente para configurar o estado correto ao carregar a página
    toggleFields();
});
