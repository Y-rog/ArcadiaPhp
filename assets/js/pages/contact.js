const inputTitle = document.getElementById('title');
const inputMessage = document.getElementById('message');
const inputEmail = document.getElementById('email');
const submitButton = document.getElementById('submit');

inputTitle.addEventListener('keyup', validateForm);
inputMessage.addEventListener('keyup', validateForm);
inputEmail.addEventListener('keyup', validateForm);


function validateForm() {
    const tileOk = validateRequired(inputTitle);
    const messageOk = validateRequired(inputMessage);
    const emailOk = validateEmail(inputEmail);

    if (tileOk && messageOk && emailOk) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}

function validateEmail(input) {
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    const email = input.value;

    if (email.match(emailRegex)) {
        input.classList.add('valid');
        input.classList.remove('invalid');
        return true;
    } else {
        input.classList.remove('valid');
        input.classList.add('invalid');
        return false;
    }}

function validateRequired(input) {
    if (input.value != '') {
        input.classList.add('valid');
        input.classList.remove('invalid');
        return true;
    } else {
        input.classList.remove('valid');
        input.classList.add('invalid');
        return false;
    }
}
