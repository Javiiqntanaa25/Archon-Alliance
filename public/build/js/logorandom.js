const logoimages = ['../build/img/raidenLOGO.png','../build/img/Zhongli logo.png']

function setRandomlogo() {
    const randomIndex = Math.floor(Math.random() * logoimages.length);
    const selectedImage = logoimages[randomIndex];
    document.querySelector('.logopg').src = selectedImage;
    console.log("")
}

setRandomlogo(); // Establece un fondo aleatorio al cargar la página