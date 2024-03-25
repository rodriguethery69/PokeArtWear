// ------ REGEX --------
const UserRegex = /^[a-zA-Z][a-zA-Z]{3,23}$/;
const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PhoneNumberRegex = /^(?:\d{1,3})?\d{10,14}$/;
const CommentRegex = /^[^{}<>$]{30,500}$/;

// ------- VARIABLE -----------
let inputName = document.querySelector("#input1")
let inputEmail= document.querySelector("#input4");
let inputTel= document.querySelector("#input3");
let inputComment = document.querySelector('#Textarea1')
const form = document.querySelector('form');

// ------ Validateurs ------
let nomValid = false;
let emailValid = false;
let telValid = false;
let msgValid = false;
