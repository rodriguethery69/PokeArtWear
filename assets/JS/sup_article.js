// Sélectionner tous les boutons "Supprimer"
const removeButtons = document.querySelectorAll('.remove-item');

// Parcourir chaque bouton "Supprimer" et ajouter un écouteur d'événement
removeButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Récupérer l'identifiant unique de l'article à supprimer à partir de l'attribut data-article-id
        const articleId = button.getAttribute('data-article-id');
        
        // Vérifier si l'identifiant de l'article est vide
        if (!articleId) {
            console.error('L\'identifiant de l\'article n\'a pas été fourni.');
            return; // Arrêtez l'exécution de la fonction si l'identifiant de l'article est vide
        }
        
        // Supprimer l'article correspondant du panier en utilisant son identifiant unique
        const articleToRemove = document.getElementById(articleId);
        if (articleToRemove) {
            articleToRemove.remove(); // Supprimer l'élément de l'interface utilisateur

            // Envoyer une requête AJAX pour supprimer l'article du panier côté serveur
            
            fetch('/panier/sup_article.php', {
                method: 'POST',
                body: JSON.stringify({ articleId: articleId })
            })
            .then(response => response.json())
            .then(data => {
                var_dump($_SESSION['panier']);
                // Vérifiez si la suppression a réussi ou non
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


