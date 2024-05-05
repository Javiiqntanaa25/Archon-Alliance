function idrandom(){
    const min = 700000000;
    const max = 799999999;
    id = Math.floor(Math.random() * (max - min +1)) + min;
    result = document.getElementById("UID");
    result.innerHTML = id; 
    console.log(id)
}
idrandom(); 