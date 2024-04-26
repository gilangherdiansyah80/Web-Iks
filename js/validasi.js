const loginFormElement = document.querySelector('#loginForm');
const inputUserElement = document.querySelector('#userName');
const inputPasswordElement = document.querySelector('#password');

const userNameAdmin = 'hanyaadmin';
const passwordAdmin = 'ikspibandung';
const userNameUser = 'ikscabbandung';
const passwordUser = 'iksbandungjuara';

function goToPageAdmin() {
    location.href = './admin/admin.php'
}
  
  function goToUser() {
    location.href = './user/keuangan-user.php';
  }

loginFormElement.addEventListener('submit', function(event) {
    
  event.preventDefault();

  const userName = inputUserElement.value;
  const password = inputPasswordElement.value;

  if (userName == userNameUser && password == passwordUser) {
      goToUser();
      alert('Selamat Login Berhasil');
  } else if (userName == userNameAdmin && password == passwordAdmin) {
      goToPageAdmin();
      alert('Selamat Login Berhasil');
  } else {
    alert('Maaf User Name atau Password Salah')
  }
  
});
