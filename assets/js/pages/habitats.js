let habitat = "savane";
let habitats = ["savane", "marais", "jungle"];
let openButton= document.getElementById('button-discover-'+habitat);
let minimizeButton= document.getElementById('minimize-'+habitat);

function openHabitat(habitat) {
    if (openButton == null) {
        return}
        else {
    openButton.addEventListener('click', () => 
    {   
        document.getElementById('button-discover-'+habitat).style.display = "none";
        document.getElementById('minimize-'+habitat).style.display = "block";
        document.getElementById('description-'+habitat).style.display = "block";
        document.getElementById('list-animals-'+habitat).style.display = "block";
    })
};};

for (let i = 0; i < habitats.length; i++) {
    habitat = habitats[i];
    openButton = document.getElementById('button-discover-'+habitat);
    openHabitat(habitat);
};

function minimizeHabitat(habitat) {
    if (minimizeButton == null) {
        return}
    else {
        minimizeButton.addEventListener('click', () => {
            document.getElementById('minimize-'+habitat).style.display = "none";
            document.getElementById('button-discover-'+habitat).style.display = "flex";
            document.getElementById('description-'+habitat).style.display = "none";
            document.getElementById('list-animals-'+habitat).style.display = "none";
});};};   

for (let i = 0; i < habitats.length; i++) {
    habitat = habitats[i];
    minimizeButton = document.getElementById('minimize-'+habitat);
    minimizeHabitat(habitat)
};
