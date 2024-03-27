function validateForm() {
    var email = document.getElementById("inputEmail").value;
    var password = document.getElementById("inputPassword").value;

    if (email.trim() === '' || password.trim() === '') {
        alert("Veuillez remplir tous les champs.");
        return false;
    }
    return true;
}