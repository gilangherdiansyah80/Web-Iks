buttonMasuk = document.querySelector('#buttonMasuk');

function goToLogin() {
    location.href = './login.php';
}

buttonMasuk.addEventListener('click', function() {
    goToLogin();
    console.log('hallo')
})