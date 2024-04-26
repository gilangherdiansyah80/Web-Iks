const hamburger = document.querySelector('#hamburger');
const hamburgerMenu = document.querySelector('#hamburger-menu');

hamburger.addEventListener('click', () => {
    // Cek apakah atribut 'hidden' sudah ada
    if (hamburgerMenu.hasAttribute('hidden')) {
        // Jika hidden, hapus atribut 'hidden' untuk menampilkan menu
        hamburgerMenu.removeAttribute('hidden');
    } else {
        // Jika tidak hidden, tambahkan atribut 'hidden' untuk menyembunyikan menu
        hamburgerMenu.setAttribute('hidden', true);
    }
});

const navLink = document.querySelector('#nav-link');
const aboutMe = document.querySelector('#about-me');

navLink.addEventListener('click', () => {
    // Cek apakah atribut 'hidden' sudah ada
    if (aboutMe.hasAttribute('hidden')) {
        // Jika hidden, hapus atribut 'hidden' untuk menampilkan menu
        aboutMe.removeAttribute('hidden');
    } else {
        // Jika tidak hidden, tambahkan atribut 'hidden' untuk menyembunyikan menu
        aboutMe.setAttribute('hidden', true);
    }
});

