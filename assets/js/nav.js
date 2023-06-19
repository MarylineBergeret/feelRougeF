// Sélectionne l'élément du menu hamburger par sa classe CSS
const menuHamburger = document.querySelector(".menu-hamburger");
// Sélectionne l'élément des liens de navigation par sa classe CSS
const navLinks = document.querySelector(".nav-links");
// Ajoute un écouteur d'événement sur le clic du menu hamburger
menuHamburger.addEventListener('click', () => {
    // Ajoute ou supprime la classe 'mobile-menu' à l'élément des liens de navigation
    navLinks.classList.toggle('mobile-menu');
});



