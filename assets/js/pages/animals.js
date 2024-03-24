let animal = "1";
let iconOpenDetailsAnimal = document.getElementById('icon-open-details-animal-'+animal);
let  iconReduceDetailsAnimal = document.getElementById('icon-reduce-details-animal-'+animal);
let detailsAnimal = document.getElementById('li-page-animal-details-'+animal);


function openDetailsAnimal (animal) {
    if (iconOpenDetailsAnimal == null) {
        return}
        else {
    iconOpenDetailsAnimal.addEventListener('click', () => 
    {   
        document.getElementById('icon-open-details-animal-'+animal).style.display = "none";
        document.getElementById('icon-reduce-details-animal-'+animal).style.display = "inline-block";
        document.getElementById('li-page-animal-details-'+animal).style.display = "inline-block";
    })
};};

for (let i = 0; i < animals.length; i++) {
    animal = animals[i];
    iconOpenDetailsAnimal = document.getElementById('icon-open-details-animal-'+animal);
    openDetailsAnimal(animal);
}
      
function reduceDetailsAnimal (animal) {
    if (iconReduceDetailsAnimal == null) {
        return}
        else {
    iconReduceDetailsAnimal.addEventListener('click', () => 
    {   
        document.getElementById('icon-reduce-details-animal-'+animal).style.display = "none";
        document.getElementById('icon-open-details-animal-'+animal).style.display = "inline-block";
        document.getElementById('li-page-animal-details-'+animal).style.display = "none";
    })
};};

for (let i = 0; i < animals.length; i++) {
    animal = animals[i];
    reduceDetailsAnimal(animal);
}





