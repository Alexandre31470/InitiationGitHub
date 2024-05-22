document.getElementById('article-form').addEventListener('submit', function(event) {
    var fileInput = document.getElementById('photo');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(filePath)) {
        alert('Veuillez télécharger un fichier image (PNG, JPG ou JPEG).');
        fileInput.value = '';
        event.preventDefault();
    }
});
