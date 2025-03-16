import './bootstrap';

const menu = document.getElementById("menu");
const menuButton = document.getElementById("menu-button");

menuButton.addEventListener("click", () => {
    menu.classList.toggle("max-md:translate-x-full");
});

const searchInput = document.getElementById('search');
const clearSearchBtn = document.getElementById('clear-search');

clearSearchBtn.addEventListener('mousedown', (event) => {
    event.preventDefault();
    searchInput.value = '';
});



window.addEventListener('click', (e) => {
    if (!menu.contains(e.target) && !menuButton.contains(e.target)) {
        menu.classList.add('max-md:translate-x-full');
    }
});