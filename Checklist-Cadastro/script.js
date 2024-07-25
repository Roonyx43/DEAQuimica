function validateForms() {
    const formCliente = document.getElementById('formdil1');

    if (!formCliente.checkValidity()) {
        formCliente.reportValidity();
        return false; // Retorna falso se o formulário não for válido
    }

    return true; // Retorna verdadeiro se ambos os formulários forem válidos
}