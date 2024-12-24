document.addEventListener('DOMContentLoaded', () => {
    const burgerMenu = document.querySelector('.burger_menu');
    const sidebar = document.querySelector('.sidebar');

    burgerMenu.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        burgerMenu.classList.toggle('active');
        console.log("erreur")
    });
});