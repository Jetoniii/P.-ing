const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const text = document.getElementById('text');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const formControl = element.parentElement;
    const error = formControl.querySelector('.error');
    formControl.className = 'input-control error';
    error.innerText = message;
}

const setSuccess = (element) => {
    const formControl = element.parentElement;
    formControl.className = 'input-control success';
}

const isEmailValid = (email) => {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const textValue = text.value.trim();

    if (usernameValue === '') {
        setError(username, 'Username is required');
    } else {
        setSuccess(username);
    }

    if (emailValue === '') {
        setError(email, 'Email is required');
    } else if (!isEmailValid(emailValue)) {
        setError(email, 'Email is not valid');
    } else {
        setSuccess(email);
    }

    if (textValue === '') {
        setError(text, 'Message is required');
    } else {
        setSuccess(text);
    }
}
