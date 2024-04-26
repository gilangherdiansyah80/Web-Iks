buttonKeluar = document.querySelector('#buttonKeluar');

function goToHome() {
    location.href = '../index.php';
}


buttonKeluar.addEventListener('click', function() {
    goToHome();
    alert('Keluar Berhasil');
});

