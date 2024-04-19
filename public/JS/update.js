let plus = document.querySelector('.plus');
let moin = document.querySelector('.moin');
let value = document.querySelector('.nbrQ');
let input = document.querySelector('.value');
let form = document.querySelector('.form');
plus.addEventListener('click', function kevin() {
    let newval = ++ value.innerHTML;
    input.value = newval;
   
})
moin.addEventListener('click', function kevin() {
    if(value.innerHTML > 1){
        let newval = -- value.innerHTML;
        input.value = newval;
    }
    
})