// Fonction pour prévisualiser l'image sélectionnée
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Écouter les changements dans l'élément de sélection de fichier
$('#image').change(function() {
    previewImage(this);
});