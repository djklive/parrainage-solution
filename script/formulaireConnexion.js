const form = document.querySelector("form");
const email = document.getElementById("email");
const password = document.getElementById("password");

function setErrorFor(input, message) {
    const formGroup = input.closest('.form-group');
    const errorDisplay = formGroup.querySelector('.error-message');
    errorDisplay.innerText = message;
    input.classList.add('error');
    input.classList.remove('success');
}

function setSuccessFor(input) {
    const formGroup = input.closest('.form-group');
    const errorDisplay = formGroup.querySelector('.error-message');
    errorDisplay.innerText = '';
    input.classList.remove('error');
    input.classList.add('success');
}

function validerText(input, minLength = 3) {
    if(input.value.trim().length < minLength) {
        setErrorFor(input, `Minimum ${minLength} caractères requis`);
        return false;
    } else {
        setSuccessFor(input);
        return true;
    }
}

function verifierEmail(input) {
    const emailRegExp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailRegExp.test(input.value.trim())) {
        setSuccessFor(input);
        return true;
    } else {
        setErrorFor(input, 'Adresse email non valide');
        return false;
    }
}

// form.addEventListener("submit", (e) => {
//     e.preventDefault();
    
//     // Validate all fields
//     const isEmailValid = verifierEmail(email);
//     const isPasswordValid = validerText(password);

//     // If all fields are valid, you can submit the form
//     if (isEmailValid && isPasswordValid) {
//         console.log("Form is valid and can be submitted");
//         // Add your form submission logic here
//     }
// });

// Real-time validation
email.addEventListener("input", () => verifierEmail(email));


// Password validation
password.addEventListener("change", () => validerText(password));