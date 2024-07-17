document.addEventListener('DOMContentLoaded', (event) => {
    const formdil1 = document.getElementById('formdil1');
    const formdil2 = document.getElementById('formdil2');
    const formdil3 = document.getElementById('formdil3');
    const formdil4 = document.getElementById('formdil4');
    const formdil5 = document.getElementById('formdil5');
    const formdil6 = document.getElementById('formdil6');
    const formdil7 = document.getElementById('formdil7');
    const formdil8 = document.getElementById('formdil8');
    const nextPageButton = document.querySelector('.next-page');
    const nextPageButton2 = document.querySelector('.next-page2');
    const nextPageButton3 = document.querySelector('.next-page3');
    const nextPageButton4 = document.querySelector('.next-page4');
    const nextPageButton5 = document.querySelector('.next-page5');
    const nextPageButton6 = document.querySelector('.next-page6');
    const nextPageButton7 = document.querySelector('.next-page7');

    nextPageButton.addEventListener('click', () => {
        // Verifica se o formulário atual é válido
        if (formdil1.checkValidity()) {
            // Oculta o primeiro formulário
            formdil1.classList.add('hidden');
            // Exibe o segundo formulário
            formdil2.classList.remove('hidden');
        } else {
            // Se o formulário atual não for válido, exibe mensagens de erro
            formdil1.reportValidity();
        }
    });

    formdil1.addEventListener('submit', (event) => {
        event.preventDefault(); // Previne o envio do formulário
    });

    nextPageButton2.addEventListener('click', () => {
        // Verifica se o formulário atual é válido
        if (formdil2.checkValidity()) {
            // Oculta o primeiro formulário
            formdil2.classList.add('hidden');
            // Exibe o segundo formulário
            formdil3.classList.remove('hidden');
        } else {
            // Se o formulário atual não for válido, exibe mensagens de erro
            formdil2.reportValidity();
        }
    });

    formdil2.addEventListener('submit', (event) => {
        event.preventDefault(); // Previne o envio do formulário
    });

    nextPageButton3.addEventListener('click', () => {
        // Verifica se o formulário atual é válido
        if (formdil3.checkValidity()) {
            // Oculta o primeiro formulário
            formdil3.classList.add('hidden');
            // Exibe o segundo formulário
            formdil4.classList.remove('hidden');
        } else {
            // Se o formulário atual não for válido, exibe mensagens de erro
            formdil3.reportValidity();
        }
    });

    formdil3.addEventListener('submit', (event) => {
        event.preventDefault(); // Previne o envio do formulário
    });

    nextPageButton4.addEventListener('click', () => {
        // Verifica se o formulário atual é válido
        if (formdil4.checkValidity()) {
            // Oculta o primeiro formulário
            formdil4.classList.add('hidden');
            // Exibe o segundo formulário
            formdil5.classList.remove('hidden');
        } else {
            // Se o formulário atual não for válido, exibe mensagens de erro
            formdil4.reportValidity();
        }
    });

    formdil3.addEventListener('submit', (event) => {
        event.preventDefault(); // Previne o envio do formulário
    });

    nextPageButton5.addEventListener('click', () => {
        // Verifica se o formulário atual é válido
        if (formdil5.checkValidity()) {
            // Oculta o primeiro formulário
            formdil5.classList.add('hidden');
            // Exibe o segundo formulário
            formdil6.classList.remove('hidden');
        } else {
            // Se o formulário atual não for válido, exibe mensagens de erro
            formdil5.reportValidity();
        }
    });

    formdil3.addEventListener('submit', (event) => {
        event.preventDefault(); // Previne o envio do formulário
    });
    
    nextPageButton6.addEventListener('click', () => {
        // Verifica se o formulário atual é válido
        if (formdil6.checkValidity()) {
            // Oculta o primeiro formulário
            formdil6.classList.add('hidden');
            // Exibe o segundo formulário
            formdil7.classList.remove('hidden');
        } else {
            // Se o formulário atual não for válido, exibe mensagens de erro
            formdil6.reportValidity();
        }
    });

    formdil3.addEventListener('submit', (event) => {
        event.preventDefault(); // Previne o envio do formulário
    });

    nextPageButton7.addEventListener('click', () => {
        // Verifica se o formulário atual é válido
        if (formdil7.checkValidity()) {
            // Oculta o primeiro formulário
            formdil7.classList.add('hidden');
            // Exibe o segundo formulário
            formdil8.classList.remove('hidden');
        } else {
            // Se o formulário atual não for válido, exibe mensagens de erro
            formdil7.reportValidity();
        }
    });

    formdil3.addEventListener('submit', (event) => {
        event.preventDefault(); // Previne o envio do formulário
    });
})



function voltarParaFormulario() {
    const formdil1 = document.getElementById('formdil1');
    const formdil2 = document.getElementById('formdil2');
    // Oculta o segundo formulário
    formdil2.classList.add('hidden');
    // Exibe o primeiro formulário
    formdil1.classList.remove('hidden');
}
function voltarParaFormulario2() {
    const formdil2 = document.getElementById('formdil2');
    const formdil3 = document.getElementById('formdil3');
    // Oculta o segundo formulário
    formdil3.classList.add('hidden');
    // Exibe o primeiro formulário
    formdil2.classList.remove('hidden');
}
function voltarParaFormulario3() {
    const formdil3 = document.getElementById('formdil3');
    const formdil4 = document.getElementById('formdil4');
    // Oculta o segundo formulário
    formdil4.classList.add('hidden');
    // Exibe o primeiro formulário
    formdil3.classList.remove('hidden');
}
function voltarParaFormulario4() {
    const formdil4 = document.getElementById('formdil4');
    const formdil5 = document.getElementById('formdil5');
    // Oculta o segundo formulário
    formdil5.classList.add('hidden');
    // Exibe o primeiro formulário
    formdil4.classList.remove('hidden');
}
function voltarParaFormulario5() {
    const formdil5 = document.getElementById('formdil5');
    const formdil6 = document.getElementById('formdil6');
    // Oculta o segundo formulário
    formdil6.classList.add('hidden');
    // Exibe o primeiro formulário
    formdil5.classList.remove('hidden');
}
function voltarParaFormulario6() {
    const formdil7 = document.getElementById('formdil6');
    const formdil6 = document.getElementById('formdil7');
    // Oculta o segundo formulário
    formdil7.classList.add('hidden');
    // Exibe o primeiro formulário
    formdil6.classList.remove('hidden');
}
function voltarParaFormulario7() {
    const formdil7 = document.getElementById('formdil7');
    const formdil8 = document.getElementById('formdil8');
    // Oculta o segundo formulário
    formdil8.classList.add('hidden');
    // Exibe o primeiro formulário
    formdil7.classList.remove('hidden');
}