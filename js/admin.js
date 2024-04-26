const berita = document.querySelector('#berita');
const keuangan = document.querySelector('.keuangan');
const dokumentasi = document.querySelector('#dokumentasi');
const containerBerita = document.querySelector('#contianer-berita');
const containerKeuangan = document.querySelector('#container-keuangan');
const containerDokumentasi = document.querySelector('#container-dokumentasi');

berita.addEventListener('click', () => {
    // Cek apakah atribut 'hidden' sudah ada
    if (containerBerita.hasAttribute('hidden')) {
        // Jika hidden, hapus atribut 'hidden' untuk menampilkan menu
        containerBerita.removeAttribute('hidden');
    } else {
        // Jika tidak hidden, tambahkan atribut 'hidden' untuk menyembunyikan menu
        containerBerita.setAttribute('hidden', true);
    }
});

keuangan.addEventListener('click', () => {
    // Cek apakah atribut 'hidden' sudah ada
    if (containerKeuangan.hasAttribute('hidden')) {
        // Jika hidden, hapus atribut 'hidden' untuk menampilkan menu
        containerKeuangan.removeAttribute('hidden');
    } else {
        // Jika tidak hidden, tambahkan atribut 'hidden' untuk menyembunyikan menu
        containerKeuangan.setAttribute('hidden', true);
    }
});

dokumentasi.addEventListener('click', () => {
    console.log('hallo')
    // Cek apakah atribut 'hidden' sudah ada
    if (containerDokumentasi.hasAttribute('hidden')) {
        // Jika hidden, hapus atribut 'hidden' untuk menampilkan menu
        containerDokumentasi.removeAttribute('hidden');
    } else {
        // Jika tidak hidden, tambahkan atribut 'hidden' untuk menyembunyikan menu
        containerDokumentasi.setAttribute('hidden', true);
    }
});
