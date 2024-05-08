// Sélection des éléments pertinents de votre page
const addToCartButton = document.getElementById('addToCart'); // Bouton "Ajouter au panier"
const tailleSelect = document.getElementById('taille'); // Sélecteur de taille
const quantiteSelect = document.getElementById('quantite'); // Sélecteur de quantité
const imageTshirt = document.querySelector('.superposed-image'); // Image du T-shirt
const prixElement = document.getElementById('prix'); // Élément du prix

// Écouteur d'événement pour le clic sur le bouton "Ajouter au panier"
addToCartButton.addEventListener('click', () => {
    // Récupération des valeurs sélectionnées par l'utilisateur
    const selectedTaille = tailleSelect.value;
    const selectedQuantite = parseInt(quantiteSelect.value);
    const selectedImageUrl = imageTshirt.src;
    const selectedPrix = parseFloat(prixElement.value.split(' ')[2]);

    // Création d'un objet FormData pour envoyer les données
    const formData = new FormData();
    formData.append('taille', selectedTaille);
    formData.append('quantite', selectedQuantite);
    formData.append('image_url', selectedImageUrl);
    formData.append('prix', selectedPrix);
    
    // Envoi de la requête AJAX
    fetch('/panier/ajout_panier.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Traitement de la réponse
        if (data.success) {
            alert(data.message); // Affichage d'un message de succès
        } else {
            alert('Erreur : ' + data.message); // Affichage d'un message d'erreur
        }
    })
    .catch(error => {
        console.error('Erreur lors de l\'envoi de la requête AJAX : ', error);
    });
});
