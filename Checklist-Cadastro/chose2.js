document.addEventListener('DOMContentLoaded', function() {
    const sim = document.getElementById('sim');
    const nao = document.getElementById('nao');
    const cep = document.getElementById('cep');
    const end = document.getElementById('end');
    const num = document.getElementById('num');
    const comp = document.getElementById('comp');
    const bairro = document.getElementById('bairro');
    const municipio = document.getElementById('municipio');
    const uf = document.getElementById('uf');
    const cep2 = document.getElementById('cep2');
    const end2 = document.getElementById('end2');
    const num2 = document.getElementById('num2');
    const comp2 = document.getElementById('comp2');
    const bairro2 = document.getElementById('bairro2');
    const municipio2 = document.getElementById('municipio2');
    const uf2 = document.getElementById('uf2');

    sim.addEventListener('change', copyFields);
    nao.addEventListener('change', clearFields);

    // Função que copia os valores dos campos principais para os secundários e define "readonly"
    function copyFields() {
        if (sim.checked) {
            cep2.value = cep.value;
            end2.value = end.value;
            num2.value = num.value;
            comp2.value = comp.value;
            bairro2.value = bairro.value;
            municipio2.value = municipio.value;
            uf2.value = uf.value;

            // Adiciona "readonly" nos campos com o final "2"
            setReadonly(true);
        }
    }

    // Função que limpa os campos secundários e remove "readonly" quando "Não" é selecionado
    function clearFields() {
        if (nao.checked) {
            cep2.value = '';
            end2.value = '';
            num2.value = '';
            comp2.value = '';
            bairro2.value = '';
            municipio2.value = '';
            uf2.value = '';

            // Remove "readonly" dos campos com o final "2"
            setReadonly(false);
        }
    }

    // Função que adiciona ou remove o atributo "readonly"
    function setReadonly(isReadonly) {
        cep2.readOnly = isReadonly;
        end2.readOnly = isReadonly;
        num2.readOnly = isReadonly;
        comp2.readOnly = isReadonly;
        bairro2.readOnly = isReadonly;
        municipio2.readOnly = isReadonly;
        uf2.readOnly = isReadonly;
    }
});
