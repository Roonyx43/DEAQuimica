document.addEventListener('DOMContentLoaded', function() {
    const cnpjRadio = document.getElementById('cnpjRadio');
    const cpfRadio = document.getElementById('cpfRadio');
    const cnpjField = document.getElementById('cnpjField');
    const cpfField = document.getElementById('cpfField');
    const rgField = document.getElementById('rgField');
    const form = document.getElementById('formdil1');

    let previousSelection = null;

    cnpjRadio.addEventListener('change', toggleFields);
    cpfRadio.addEventListener('change', toggleFields);

    function toggleFields() {
        if (previousSelection && previousSelection !== getSelectedOption()) {
            clearFields();
        }

        if (cnpjRadio.checked) {
            cnpjField.classList.remove('hidden');
            cpfField.classList.add('hidden');
            rgField.classList.add('hidden');
        } else if (cpfRadio.checked) {
            cnpjField.classList.add('hidden');
            cpfField.classList.remove('hidden');
            rgField.classList.remove('hidden');
        }

        previousSelection = getSelectedOption();
    }

    function getSelectedOption() {
        if (cnpjRadio.checked) {
            return 'cnpj';
        } else if (cpfRadio.checked) {
            return 'cpf';
        }
        return null;
    }

    function clearFields() {
        // Limpa todos os campos de entrada
        const inputs = form.querySelectorAll('input[type="text"], input[type="email"]');
        inputs.forEach(input => input.value = '');

        // Opcional: limpa os campos desativados, se necessário
        const disabledInputs = form.querySelectorAll('input:disabled');
        disabledInputs.forEach(input => input.value = '');
    }

    // Chama a função inicialmente para configurar o estado correto ao carregar a página
    toggleFields();
});