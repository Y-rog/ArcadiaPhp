const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const btnSignin = document.getElementById('btnSignin');

btnSignin.addEventListener('click', () => { checkCredentails(); });

function checkCredentails() {
    //Ici appelr l'APi pour vérifier les identifiants en BDD
 if(emailInput.value === 'test@mail.com' && passwordInput.value === 'test') {
   alert('Vous êtes connecté');
    //récupérer le vrai token
    const token = "cscsdcsdvb<qdtbqdtbtbtdbtdbgdtdw";
    setToken(token);
    //placer le token dans cookie

    setCookie("role", "admin", 7);
    window.location.href = '/';
 } else {
    document.getElementsByClassName('invalid-credentials')[0].style.display = 'block';
 }
}



