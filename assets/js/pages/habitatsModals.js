let btnAddHabitat = document.getElementById('btn-add-habitat');

//fonction pour afficher la modal d'ajout
btnAddHabitat.addEventListener('click', () => {
  let modalAddHabitat = document.getElementById('modal-add-habitat');
  let btnValidateAddHabitat = document.getElementById('btn-validate-add-habitat');
  let btnCancelAddHabitat = document.getElementById('btn-cancel-add-habitat');
  modalAddHabitat.style.display = 'block';
  btnValidateAddHabitat.addEventListener('click', () => {
    document.location.reload(true);
  });
  btnCancelAddHabitat.addEventListener('click', () => {
    modalAddHabitat.style.display = 'none';
  });
}
);

//fonction pour afficher la modal de modification
habitats.forEach(element => {
  let iconUpdateHabitat = document.getElementById('icon-update-habitat-'+element);
  let modalUpdateHabitat = document.getElementById('modal-update-habitat-'+element);
  let btnValidate = document.getElementById('btn-validate-update-habitat-'+element);
  let btnCancel = document.getElementById('btn-cancel-update-habitat-'+element);
  iconUpdateHabitat.addEventListener('click', () => {
    modalUpdateHabitat.style.display = 'block';
  });
  btnValidate.addEventListener('click', () => {
    document.location.reload(true);
  });
  btnCancel.addEventListener('click', () => { 
    modalUpdateHabitat.style.display = 'none';
  });
}
);

//fonction pour afficher la modal de suppression
habitats.forEach(element => {
  let iconDeleteHabitat = document.getElementById('icon-delete-habitat-'+element);
  let modalDeleteHabitat = document.getElementById('modal-delete-habitat-'+element);
  let validate = document.getElementById('icon-validate-'+element);
  let cancel = document.getElementById('icon-cancel-'+element);
  iconDeleteHabitat.addEventListener('click', () => {
    modalDeleteHabitat.style.display = 'block';
  });
  validate.addEventListener('click', () => {
    document.location.reload(true);
  });
  cancel.addEventListener('click', () => { 
    modalDeleteHabitat.style.display = 'none';
  });
});

