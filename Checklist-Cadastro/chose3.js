document.addEventListener("DOMContentLoaded", function() {
    const dadosSim = document.getElementById('dadosSim');
    const dadosNao = document.getElementById('dadosNao');
    const contatoComercial = document.getElementById('contatoComercial');
    const telComercial = document.getElementById('telComercial');
    const emailComercial = document.getElementById('emailComercial');
    const contatoFinanceiro = document.getElementById('contatoFinanceiro');
    const telFinanceiro = document.getElementById('telFinanceiro');
    const emailFinanceiro = document.getElementById('emailFinanceiro');

    function copyCommercialToFinancial() {
        if (dadosSim.checked) {
            contatoFinanceiro.value = contatoComercial.value;
            telFinanceiro.value = telComercial.value;
            emailFinanceiro.value = emailComercial.value;
        } else {
            contatoFinanceiro.value = '';
            telFinanceiro.value = '';
            emailFinanceiro.value = '';
        }
    }

    dadosSim.addEventListener('change', copyCommercialToFinancial);
    dadosNao.addEventListener('change', copyCommercialToFinancial);

    // Optionally, if you want to update fields on input change
    contatoComercial.addEventListener('input', copyCommercialToFinancial);
    telComercial.addEventListener('input', copyCommercialToFinancial);
    emailComercial.addEventListener('input', copyCommercialToFinancial);
});