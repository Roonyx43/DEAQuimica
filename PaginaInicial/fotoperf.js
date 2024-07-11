document.addEventListener('DOMContentLoaded', function() {
    const pictureImage = document.querySelector('.picture__image');

    // Use a URL da imagem passada pelo PHP
    if (userImage && userImage !== 'null') {
        const img = document.createElement("img");
        img.src = userImage;
        img.classList.add('picture__img');
        pictureImage.appendChild(img);
    } else {
        pictureImage.innerHTML = 'Insira uma imagem.';
    }

    const pictureInput = document.querySelector('#picture__input');
    const pictureImageTxt = 'Escolha uma foto';

    pictureInput.addEventListener('change', function(e) {
        const inputTarget = e.target;
        const file = inputTarget.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", function(e) {
                const readerTarget = e.target;

                pictureImage.innerHTML = '';

                const img = document.createElement("img");
                img.src = readerTarget.result;
                img.classList.add('picture__img');

                pictureImage.appendChild(img);
            });

            reader.readAsDataURL(file);
        } else {
            pictureImage.innerHTML = pictureImageTxt;
        }

        document.querySelector('.picture').style.border = "2px solid";
    });

    document.querySelector('.button-envfoto').addEventListener('click', function() {
        const file = pictureInput.files[0];
        if (file) {
            const formData = new FormData();
            formData.append('file', file);

            fetch('../PaginaInicial/upload.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.status) {
                    // Atualize a imagem exibida após o upload no banco de dados
                    const img = document.createElement("img");
                    img.src = data.filePath;
                    img.classList.add('picture__img');
                    pictureImage.innerHTML = '';
                    pictureImage.appendChild(img);
                } else {
                    alert('Erro ao fazer upload da imagem: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
            });
        } else {
            alert('Escolha uma foto primeiro.');
        }
    });
});
