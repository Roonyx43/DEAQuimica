document.addEventListener('DOMContentLoaded', (event) => {
    const formdil1 = document.getElementById('formdil1');
    const checkboxGroups = [
        document.querySelectorAll('input[type="checkbox"][name="option"]'),
        document.querySelectorAll('input[type="checkbox"][name="option2"]'),
        document.querySelectorAll('input[type="checkbox"][name="option3"]'),
        document.querySelectorAll('input[type="checkbox"][name="option4"]'),
        document.querySelectorAll('input[type="checkbox"][name="option5"]'),
        document.querySelectorAll('input[type="checkbox"][name="option6"]'),
        document.querySelectorAll('input[type="checkbox"][name="option7"]'),
        document.querySelectorAll('input[type="checkbox"][name="option8"]'),
        document.querySelectorAll('input[type="checkbox"][name="option8_b"]'),
        document.querySelectorAll('input[type="checkbox"][name="option9"]'),
        document.querySelectorAll('input[type="checkbox"][name="option10"]'),
        document.querySelectorAll('input[type="checkbox"][name="option11"]'),
        document.querySelectorAll('input[type="checkbox"][name="option12"]'),
        document.querySelectorAll('input[type="checkbox"][name="option13"]'),
        document.querySelectorAll('input[type="checkbox"][name="option13_b"]'),
        document.querySelectorAll('input[type="checkbox"][name="option14"]'),
        document.querySelectorAll('input[type="checkbox"][name="option15"]'),
        document.querySelectorAll('input[type="checkbox"][name="option16"]'),
        document.querySelectorAll('input[type="checkbox"][name="option17"]'),
        document.querySelectorAll('input[type="checkbox"][name="option18"]'),
        document.querySelectorAll('input[type="checkbox"][name="option18_b"]'),
        document.querySelectorAll('input[type="checkbox"][name="option19"]'),
        document.querySelectorAll('input[type="checkbox"][name="option20"]'),
        document.querySelectorAll('input[type="checkbox"][name="option21"]'),
        document.querySelectorAll('input[type="checkbox"][name="option22"]'),
        document.querySelectorAll('input[type="checkbox"][name="option23"]'),
        document.querySelectorAll('input[type="checkbox"][name="option23_b"]'),
        document.querySelectorAll('input[type="checkbox"][name="option24"]'),
        document.querySelectorAll('input[type="checkbox"][name="option25"]'),
        document.querySelectorAll('input[type="checkbox"][name="option26"]'),
        document.querySelectorAll('input[type="checkbox"][name="option27"]'),
        document.querySelectorAll('input[type="checkbox"][name="option28"]'),
        document.querySelectorAll('input[type="checkbox"][name="option28_b"]'),
        document.querySelectorAll('input[type="checkbox"][name="option29"]'),
        document.querySelectorAll('input[type="checkbox"][name="option30"]'),
        document.querySelectorAll('input[type="checkbox"][name="option31"]'),
        document.querySelectorAll('input[type="checkbox"][name="option32"]'),
        document.querySelectorAll('input[type="checkbox"][name="option33"]'),
        document.querySelectorAll('input[type="checkbox"][name="option33_b"]'),
        document.querySelectorAll('input[type="checkbox"][name="option34"]'),
        document.querySelectorAll('input[type="checkbox"][name="option35"]'),
        document.querySelectorAll('input[type="checkbox"][name="option36"]')
    ];

    checkboxGroups.forEach(group => {
        group.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    group.forEach(cb => {
                        if (cb !== this) {
                            cb.checked = false;
                            cb.removeAttribute('required'); // Remove o atributo required
                        }
                    });
                } else {
                    // Se desmarcar o checkbox, restaura o atributo required
                    group.forEach(cb => {
                        if (cb !== this) {
                            cb.setAttribute('required', 'required');
                        }
                    });
                }
            });
        });
    });

    formdil1.addEventListener('submit', (event) => {
        let valid = true;

        checkboxGroups.forEach(group => {
            const groupValid = Array.from(group).some(checkbox => checkbox.checked);
            if (!groupValid) {
                valid = false;
                const errorSpan = document.createElement('span');
                errorSpan.textContent = 'Este campo é obrigatório';
                errorSpan.style.color = 'red';
                errorSpan.classList.add('error-message');
                if (!group[0].parentElement.querySelector('.error-message')) {
                    group[0].parentElement.appendChild(errorSpan);
                }
            } else {
                const errorMessages = group[0].parentElement.querySelectorAll('.error-message');
                errorMessages.forEach(error => error.remove());
            }
        });

        if (valid) {
            // Chama a função do script.js após a validação dos checkboxes
            runScript();
        } else {
            event.preventDefault(); // Previne o envio do formulário se não estiver validado
        }
    });
});

document.getElementById('opt7').addEventListener('change', function() {
    if (this.checked) {
        document.querySelector('.conditional-section').classList.remove('hidden');
        setRequiredFields(true)
    }
});

document.getElementById('opt8').addEventListener('change', function() {
    if (this.checked) {
        document.querySelector('.conditional-section').classList.add('hidden');
        setRequiredFields(false)
        clearConditionalFields()
    }
});

function clearConditionalFields() {
    // Desmarcar checkboxes
    document.getElementById('medpar1').value = '';
    document.getElementById('medpar2').value = '';
}

function setRequiredFields(isRequired) {
    const fields = ['medpar1', 'medpar2'];
    fields.forEach(function(id) {
        const element = document.getElementById(id);
        if (isRequired) {
            element.setAttribute('required', 'required');
        } else {
            element.removeAttribute('required');
        }
    });
}
