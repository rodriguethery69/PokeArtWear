// Sélectionner tous les boutons "Supprimer"
const removeButtons = document.querySelectorAll('.remove-item');

// Parcourir chaque bouton "Supprimer" et ajouter un écouteur d'événement
removeButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Récupérer l'identifiant unique de l'article à supprimer à partir de l'attribut data-article-id
        const articleId = button.getAttribute('data-article-id');
        
        // Supprimer l'article correspondant du panier en utilisant son identifiant unique
        const articleToRemove = document.getElementById(articleId);
        if (articleToRemove) {
            articleToRemove.remove(); // Supprimer l'élément de l'interface utilisateur

            // Envoyer une requête AJAX pour supprimer l'article du panier côté serveur
            fetch('sup_article.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ articleId: articleId })
            })
            .then(response => response.json())
            .then(data => {
                // Vérifier si la suppression a réussi ou non
                if (data.success) {
                    // La suppression a réussi, vous pouvez effectuer des actions supplémentaires si nécessaire
                    alert('L\'article a été supprimé avec succès.');
                } else {
                    // La suppression a échoué, affichez un message d'erreur ou effectuez d'autres actions nécessaires
                    alert('Erreur lors de la suppression de l\'article : ' + data.message);
                }
            })
            .catch(error => {
                console.error('Erreur lors de la suppression de l\'article : ', error);
            });
        }
    });
});