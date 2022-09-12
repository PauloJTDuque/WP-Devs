let dropdown = document.querySelector('.menu'), // ul
    submenu = document.querySelector('.sub-menu'), // ul li ul
    buttonClick = document.querySelector('.check-button'), // button
    hamburguer = document.querySelector('.menu-icon');

buttonClick.addEventListener('click', () => {
    dropdown.classList.toogle('show-dropdown');
    if (submenu) {
        submenu.classList.toogle('show-dropdown');
    }
    hamburguer.classList.toogle('animate-button');
})