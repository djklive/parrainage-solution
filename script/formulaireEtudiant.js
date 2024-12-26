const form = document.querySelector("form");
const prenom = document.getElementById("prenom");
const nom = document.getElementById("nom");
const email = document.getElementById("email");
const tel = document.getElementById("tel");
const ville = document.getElementById("ville");
const categorySelect = document.getElementById("category-select");
const classe = document.getElementById("classe");
const annee = document.getElementById("annee");
const description = document.getElementById("description");
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

function validerText(input, minLength = 4) {
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

function verifierTel(input) {
    const telRegExp = /^\d{9}$/;
    if (telRegExp.test(input.value.trim())) {
        setSuccessFor(input);
        return true;
    } else {
        setErrorFor(input, 'Le numéro doit contenir 9 chiffres');
        return false;
    }
}

function validerSelect(input) {
    if (input.value === "") {
        setErrorFor(input, 'Veuillez sélectionner une catégorie');
        return false;
    } else {
        setSuccessFor(input);
        return true;
    }
}

function validerDescription(input, minWords = 10) {
    const words = input.value.trim().split(/\s+/);
    if (words.length < minWords) {
        setErrorFor(input, `Minimum ${minWords} mots requis`);
        return false;
    } else {
        setSuccessFor(input);
        return true;
    }
}

// form.addEventListener("submit", (e) => {
//     e.preventDefault();
    
//     // Validate all fields
//     const isPrenonValid = validerText(prenom);
//     const isNomValid = validerText(nom);
//     const isEmailValid = verifierEmail(email);
//     const isTelValid = verifierTel(tel);
//     // const isVilleValid = validerText(ville);
//     // const isCategoryValid = validerSelect(categorySelect);
//     // const isNomsValid = validerText(noms);
//     // const isAnneeValid = validerText(annee, 1);
//     // const isDescriptionValid = validerDescription(description);

//     // If all fields are valid, you can submit the form
//     if (isPrenonValid && isNomValid && isEmailValid && isTelValid) {
//         console.log("Form is valid and can be submitted");
//         // Add your form submission logic here
//     }
// });

// Real-time validation
prenom.addEventListener("input", () => validerText(prenom));
nom.addEventListener("input", () => validerText(nom));
email.addEventListener("input", () => verifierEmail(email));
tel.addEventListener("input", () => verifierTel(tel));
classe.addEventListener("input", () => validerText(classe));
// categorySelect.addEventListener("change", () => validerSelect(categorySelect));
// noms.addEventListener("input", () => validerText(noms));
// annee.addEventListener("input", () => validerText(annee, 1));
// description.addEventListener("input", () => validerDescription(description));

// Password validation
password.addEventListener("change", () => validerText(password));