const links = document.querySelectorAll('nav li');

//Mise en place du menu responsive
icons.addEventListener('click', () => {
  nav.classList.toggle('active');
});

links.forEach(link => {
  link.addEventListener('click', () => {
    nav.classList.remove('active');
  });
});


