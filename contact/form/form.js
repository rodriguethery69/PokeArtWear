const UserRegex = /^[a-zA-Z][a-zA-Z]{3,23}$/;
const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PhoneNumberRegex = /^(?:\d{1,3})?\d{10,}$/;
const SubjectRegex = /^[a-zA-Z][a-zA-Z]{3,23}$/;
const CommentRegex = /^[^{}<>$]{20,}$/;

const form = document.querySelector('form');
const inputName = document.querySelector("#input1");
const inputEmail = document.querySelector("#input2");
const inputTel = document.querySelector("#input3");
const inputSubject = document.querySelector("#input4");
const inputComment = document.querySelector('#Textarea1');

let nomValid = false;
let emailValid = false;
let telValid = false;
let subjectValid = false;
let msgValid = false;

let nomValue = "";
let emailValue = "";
let telValue = "";
let subjectValue = "";
let msgValue = "";

function addclass(element, regex, value) {
    if (regex.test(value)) {
        element.classList.add('is-valid');
        element.classList.remove('is-invalid');
        return true;
    } else {
        element.classList.add('is-invalid');
        element.classList.remove('is-valid');
        return false;
    }
}

inputName.addEventListener('input', (e) => {
    nomValid = addclass(inputName, UserRegex, e.target.value);
    nomValue = e.target.value;
});

inputEmail.addEventListener('input', (e) => {
    emailValid = addclass(inputEmail, EmailRegex, e.target.value);
    emailValue = e.target.value;
});

inputTel.addEventListener('input', (e) => {
    telValid = addclass(inputTel, PhoneNumberRegex, e.target.value);
    telValue = e.target.value;
});

inputSubject.addEventListener('input', (e) => {
    subjectValid = addclass(inputSubject, SubjectRegex, e.target.value);
    subjectValue = e.target.value;
});


inputComment.addEventListener('input', (e) => {
    msgValid = addclass(inputComment, CommentRegex, e.target.value);
    msgValue = e.target.value;
});


form.addEventListener('submit', e => {
    e.preventDefault(); // Empêche l'envoi du formulaire par défaut
    console.log('Formulaire soumis !');

    // Vérification des champs et envoi de l'e-mail si les champs sont valides
    if (nomValid && emailValid && telValid && subjectValid && msgValid) {
        console.log('Tous les champs sont valides, envoi de l\'e-mail...');
        Email.send({
            SecureToken: "8cc90b41-3799-4c8c-9a35-5f43381cbf46",
            To: 'rodriguethery@gmail.com',
            From: "rodriguethery@gmail.com",
            Subject: subjectValue,
            Body: `Nom : ${nomValue} <br>
                   Téléphone : ${telValue} <br>
                   Message : ${msgValue}`
        }).then(message => {
            console.log('Email envoyé ! Réponse :', message);
            if (message === 'OK') {
                // Afficher le message de succès
                document.getElementById('success-message').style.display = 'block';
                // Recharger la page après quelques secondes
                setTimeout(() => {
                    location.reload(); // Recharge la page si l'e-mail est envoyé avec succès
                }, 3000); // Recharge la page après 3 secondes (3000 millisecondes)
            } else {
                alert('Erreur lors de l\'envoi de l\'e-mail. Veuillez réessayer plus tard.');
            }
        });
    } else {
        console.log('Certains champs ne sont pas valides. L\'e-mail ne sera pas envoyé.');
    }
});