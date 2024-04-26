const hiddenContent = document.querySelector('.hidden-content');
const hiddenContentDua = document.querySelector('.hidden-content-2')
const container = document.querySelector('.container-card');
const containerTingkatDua = document.querySelector('#container-warga-tingkat-2');

hiddenContent.addEventListener('click', () => {
    // Cek apakah atribut 'hidden' sudah ada
    if (container.hasAttribute('hidden')) {
        // Jika hidden, hapus atribut 'hidden' untuk menampilkan menu
        container.removeAttribute('hidden');
    } else {
        // Jika tidak hidden, tambahkan atribut 'hidden' untuk menyembunyikan menu
        container.setAttribute('hidden', true);
    }
});

hiddenContentDua.addEventListener('click', () => {
    if (containerTingkatDua.hasAttribute('hidden')) {
        containerTingkatDua.removeAttribute('hidden');
    } else {
        containerTingkatDua.setAttribute('hidden', true);
    }
})