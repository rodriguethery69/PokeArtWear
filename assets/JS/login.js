/**
 * Variables
 */
const signupButton = document.getElementById('signup-button'),
    loginButton = document.getElementById('login-button'),
    userForms = document.getElementById('user_options-forms')

/**
 * Add event listener to the "Sign Up" button
 */
signupButton.addEventListener('click', () => {
  userForms.classList.remove('bounceRight')
  userForms.classList.add('bounceLeft')
}, false)

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener('click', () => {
  userForms.classList.remove('bounceLeft')
  userForms.classList.add('bounceRight')
}, false)

document.getElementById("signupForm").addEventListener("submit", function(event) {
  // Réinitialiser les messages d'erreur
  document.getElementById("usernameError").textContent = "";
  document.getElementById("emailError").textContent = "";
  document.getElementById("passwordError").textContent = "";

  // Valider le nom d'utilisateur (au moins 5 caractères)
  var username = document.getElementById("username").value;
  if(username.length < 5) {
      document.getElementById("usernameError").textContent = "Le nom d'utilisateur doit comporter au moins 5 caractères.";
      event.preventDefault(); // Empêcher la soumission du formulaire
  }

  // Valider l'adresse e-mail
  var email = document.getElementById("email").value;
  if(!isValidEmail(email)) {
      document.getElementById("emailError").textContent = "Veuillez saisir une adresse e-mail valide.";
      event.preventDefault(); // Empêcher la soumission du formulaire
  }

  // Valider le mot de passe (par exemple, au moins 8 caractères)
  var password = document.getElementById("password").value;
  if(password.length < 8) {
      document.getElementById("passwordError").textContent = "Le mot de passe doit comporter au moins 8 caractères.";
      event.preventDefault(); // Empêcher la soumission du formulaire
  }
});

// Fonction pour valider une adresse e-mail
function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}