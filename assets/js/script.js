const links = document.querySelectorAll('nav li');
const tokenCookieName = "accesstoken";
const roleCookieName = "role";
const signoutBtn = document.getElementById('button-signout');
const signinBtn = document.getElementById('button-signin');
const signoutLink = document.getElementById('link-signout');

signinBtn.addEventListener('click', () => { window.location.href = '/signin'; });

//Mise en place du menu responsive
icons.addEventListener('click', () => {
  nav.classList.toggle('active');
});

links.forEach(link => {
  link.addEventListener('click', () => {
    nav.classList.remove('active');
  });
});


//fonction pour placer le role dans le cookie
function getRole() {
  return getCookie(roleCookieName);
}
//fonction pour effacer le cookie
signoutLink.addEventListener('click', () => {
  eraseCookie(tokenCookieName);
  eraseCookie(roleCookieName);
  window.location.reload();
});
signoutBtn.addEventListener('click', () => {
  eraseCookie(tokenCookieName);
  eraseCookie(roleCookieName);
  window.location.reload();
});

//fonction pour placer le token dans le cookie
function setToken(token) {
  setCookie(tokenCookieName, token, 7);
}
//fonction pour recuperer le token
function getToken() {
  return getCookie(tokenCookieName);
}
//fonction pour placer le role dans le cookie
function setCookie(name, value, days) {
  let expires = '';
  if (days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = `; expires=${date.toUTCString()}`;
  }
  document.cookie = `${name}=${value || ''}${expires}; path=/`;
}
//fonction pour recuperer le role
function getCookie(name) {
  const nameEQ = `${name}=`;
  const ca = document.cookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) === ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}
//fonction pour effacer le cookie
function eraseCookie(name) {
  document.cookie = `${name}=; Max-Age=-99999999;`;
}
//fonction pour verifier si l'utilisateur est connecté
function isConnected() {
  if (getToken() == null || getToken() == undefined) { 
    return false;
  }
  else {
    return true;
  }
}
//conditon pour afficher les boutons de connexion ou deconnexion en fonction de l'etat de connexion
if (isConnected()) {
  document.getElementById('button-signout').style.display = 'flex';
  document.getElementById('button-signin').style.display = 'none';
} else {
  document.getElementById('button-signout').style.display = 'none';
  document.getElementById('button-signin').style.display = 'flex';
}

//fonction pour afficher ou masquer les elements en fonction de l'etat de connexion + responsive
window.addEventListener('load', () => {
  if(window.innerWidth < 900 && isConnected()){
    document.getElementById('link-signout').style.display = 'block';}
    else{
      document.getElementById('link-signout').style.display = 'none';
    }
  });

window.addEventListener('resize', () => {
  if(window.innerWidth < 900 && isConnected()){
    document.getElementById('link-signout').style.display = 'block';}
    else{
      document.getElementById('link-signout').style.display = 'none';
    }
});


//fonction pour afficher ou masquer les elements en fonction du role
function showAndHideElementsForRoles(){
  const userConnected = isConnected();
  const role = getRole();

  let allElementsToEdit = document.querySelectorAll('[data-show]');

  allElementsToEdit.forEach(element => {
    let roles = element.getAttribute('data-show').split(' ');
    if(roles.includes(role) && userConnected){
      element.style.display = 'flex';
    } else {
      element.style.display = 'none';
    }
  });
}

showAndHideElementsForRoles();

/* admin
* visitor
* veterinarian
* employee*/