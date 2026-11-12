// Menu mobile : ouvre et ferme la navigation
const bouton = document.querySelector('.menu-bouton');
const menu = document.querySelector('#menu-principal');

if (bouton && menu) {
  bouton.addEventListener('click', () => {
    const ouvert = menu.classList.toggle('ouvert');
    bouton.setAttribute('aria-expanded', ouvert);
  });
}