document.addEventListener('DOMContentLoaded', function () {
    // Récupérer le lien du logo de connexion et le conteneur du menu déroulant
    const loginToggle = document.querySelector('.login-toggle');
    const loginDropdown = document.querySelector('.dropdown-menu');

    // Fonction pour afficher ou masquer le menu déroulant en fonction de son état actuel
    function toggleDropdown() {
        if (loginDropdown.classList.contains('show')) {
            loginDropdown.classList.remove('show');
        } else {
            loginDropdown.classList.add('show');
        }
    }

    // Ajouter un écouteur d'événements au clic sur le lien de connexion pour afficher ou masquer le menu déroulant
    loginToggle.addEventListener('click', toggleDropdown);

    // Ajouter un écouteur d'événements pour masquer le menu déroulant lorsque la souris quitte le menu déroulant
    loginDropdown.addEventListener('mouseleave', function () {
        // Masquer le menu déroulant
        loginDropdown.classList.remove('show');
    });
});
