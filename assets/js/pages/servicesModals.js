let idServices = ['1', '2', '3'];
let btnAddService = document.getElementById('btn-add-service');

//fonction pour afficher la modal d'ajout
btnAddService.addEventListener('click', () => {
  let modalAddService = document.getElementById('modal-add-service');
  let btnValidateAddService = document.getElementById('btn-validate-add-service');
  let btnCancelAddService = document.getElementById('btn-cancel-add-service');
  modalAddService.style.display = 'block';
  btnValidateAddService.addEventListener('click', () => {
    document.location.reload(true);
  });
  btnCancelAddService.addEventListener('click', () => {
    modalAddService.style.display = 'none';
  });
}
);

//fonction pour afficher la modal de modification
idServices.forEach(element => {
  let iconUpdateService = document.getElementById('icon-update-service-'+element);
  let modalUpdateService = document.getElementById('modal-update-service-'+element);
  let btnValidate = document.getElementById('btn-validate-update-service-'+element);
  let btnCancel = document.getElementById('btn-cancel-update-service-'+element);
  iconUpdateService.addEventListener('click', () => {
    modalUpdateService.style.display = 'block';
  });
  btnValidate.addEventListener('click', () => {
    document.location.reload(true);
  });
  btnCancel.addEventListener('click', () => { 
    modalUpdateService.style.display = 'none';
  });
}
);

//fonction pour afficher la modal de suppression
idServices.forEach(element => {
  let iconDeleteService = document.getElementById('icon-delete-service-'+element);
  let modalDeleteService = document.getElementById('modal-delete-service-'+element);
  let validate = document.getElementById('icon-validate-'+element);
  let cancel = document.getElementById('icon-cancel-'+element);
  iconDeleteService.addEventListener('click', () => {
    modalDeleteService.style.display = 'block';
  });
  validate.addEventListener('click', () => {
    document.location.reload(true);
  });
  cancel.addEventListener('click', () => { 
    modalDeleteService.style.display = 'none';
  });
});





