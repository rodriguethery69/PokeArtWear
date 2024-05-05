const UserRegex = /^[a-zA-Z][a-zA-Z]{3,15}$/;
const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PasswordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

const form = document.querySelector('form')
const inputName = document.querySelector("#input1");
const inputEmail = document.querySelector("#input2");
const inputPassword = document.querySelector("#input3");

let nomValid = false;
let emailValid = false;
let passwordValid = false;

let nomValue = "";
let emailValue = "";
let passwordValue = "";

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

inputPassword.addEventListener('input', (e) => {
    passwordValid = addclass(inputPassword, PasswordRegex, e.target.value);
    passwordValue = e.target.value;
});