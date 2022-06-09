let havchik = document.querySelectorAll(".card");

function snacks() {
    havchik.forEach(eat =>{
        eat.style.display = 'none';
        if(eat.id === 'snacks'){
            eat.style.display = 'block';
        }
    })
}

function dessert() {
    havchik.forEach(eat =>{
        eat.style.display = 'none';
        if(eat.id === 'dessert'){
            eat.style.display = 'block';
        }
    })
}
