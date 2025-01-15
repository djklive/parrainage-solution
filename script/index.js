document.addEventListener('DOMContentLoaded', () => {
    const burgerMenu = document.querySelector('.burger_menu');
    const sidebar = document.querySelector('.sidebar');
    const main = document.querySelector('main');
    const footer = document.querySelector('footer');
    function balise() {
        table = [main, footer];
        table.forEach(element=> {
            element.addEventListener('click', () => {
                sidebar.classList.remove('open');
                burgerMenu.classList.remove('active');
                console.log("bien bien");
            });
        });
        
    }
    burgerMenu.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        burgerMenu.classList.toggle('active');
        
        console.log("erreur&")
    });
    // main.addEventListener('click', () => {
    //     sidebar.classList.remove('open');
    //     burgerMenu.classList.remove('active');
    //     console.log("bien bien");
        
    // });
    balise(main, footer);
    
});