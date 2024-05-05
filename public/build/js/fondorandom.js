const backgroundImages = ['../build/img/fondo1.jpg', '../build/img/fondo2.jpg', '../build/img/fondo3.jpg', '../build/img/fondo4.jpg'];

function setRandomBackground() {
    const randomIndex = Math.floor(Math.random() * backgroundImages.length);
    const selectedImage = backgroundImages[randomIndex];
    document.querySelector('.background').style.backgroundImage = `url(${selectedImage})`;
}

setRandomBackground(); // Establece un fondo aleatorio al cargar la página