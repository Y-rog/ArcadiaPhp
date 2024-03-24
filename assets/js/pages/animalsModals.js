let animals= ["1","2","3","4"];

habitats.forEach(element => {
  let btnAddAnimal = document.getElementById('btn-add-animal-'+element);
  let modalAddAnimal = document.getElementById('modal-add-animal-'+element);
  let btnValidate = document.getElementById('btn-validate-add-animal-'+element);
  let btnCancel = document.getElementById('btn-cancel-add-animal-'+element);
  btnAddAnimal.addEventListener('click', () => {
    modalAddAnimal.style.display = 'block';
  });
  btnValidate.addEventListener('click', () => {
    document.location.reload(true);
  });
  btnCancel.addEventListener('click', () => { 
    modalAddAnimal.style.display = 'none';
  });
}
);

//fonction pour afficher la modal de modification
animals.forEach(element => {
  let iconUpdateAnimal = document.getElementById('icon-update-animal-'+element);
  let modalUpdateAnimal = document.getElementById('modal-update-animal-'+element);
  let validate = document.getElementById('btn-validate-update-animal-'+element);
  let cancel = document.getElementById('btn-cancel-update-animal-'+element);
  iconUpdateAnimal.addEventListener('click', () => {
    modalUpdateAnimal.style.display = 'block';
  });
  validate.addEventListener('click', () => {
    document.location.reload(true);
  });
  cancel.addEventListener('click', () => { 
    modalUpdateAnimal.style.display = 'none';
  });
});

//fonction pour afficher la modal de suppression
animals.forEach(element => {
  let iconDeleteAnimal = document.getElementById('icon-delete-animal-'+element);
  let modalDeleteAnimal = document.getElementById('modal-delete-animal-'+element);
  let validate = document.getElementById('icon-validate-animal-'+element);
  let cancel = document.getElementById('icon-cancel-animal-'+element);
  iconDeleteAnimal.addEventListener('click', () => {
    modalDeleteAnimal.style.display = 'block';
  });
  validate.addEventListener('click', () => {
    document.location.reload(true);
  });
  cancel.addEventListener('click', () => { 
    modalDeleteAnimal.style.display = 'none';
  });
});
