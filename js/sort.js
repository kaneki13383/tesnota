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

function clear1(){
    havchik.forEach(eat =>{
        eat.style.display = 'block';
    })
    console.log('asjfdhasf')
}
let i = false;
function click4(){
    if(i == false){
        document.querySelector(".sort form").style.opacity = 1;
        i = true;
    }else{
        document.querySelector(".sort form").style.opacity = 0;
        i = false;
    }
}