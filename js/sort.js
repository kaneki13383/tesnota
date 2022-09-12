let havchik = document.querySelectorAll("#service");

function snacks() {
    havchik.forEach(eat =>{
        eat.style.display = 'none';
        if(eat.id === 'snacks'){
            eat.style.display = 'flex';
        }
    })
}

function dessert() {
    havchik.forEach(eat =>{
        eat.style.display = 'none';
        if(eat.id === 'dessert'){
            eat.style.display = 'flex';
        }
    })
}

function drinks() {
    havchik.forEach(eat =>{
        eat.style.display = 'none';
        if(eat.id === 'drinks'){
            eat.style.display = 'flex';
        }
    })
}

function clear1(){
    havchik.forEach(eat =>{
        eat.style.display = 'flex';
    })
}

// function clear2(){
//     havchik.forEach(eat =>{
//         eat.style.display = 'none';
//     })
// }

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