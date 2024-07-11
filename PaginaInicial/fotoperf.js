document.addEventListener('DOMContentLoaded', function() {
    const pictureInput = document.querySelector('#picture__input');
    const pictureImage = document.querySelector('.picture__image');
    const pictureImageTxt = 'Escolha uma foto';
    pictureImage.innerHTML = pictureImageTxt;

    pictureInput.addEventListener('change', function(e){
        const inputTarget = e.target;
        const file = inputTarget.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", function (e) {
                const readerTarget = e.target;

                // Limpar a pré-visualização anterior
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
});
