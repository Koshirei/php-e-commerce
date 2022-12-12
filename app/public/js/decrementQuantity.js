"use strict";


let buttons_decrem = document.querySelectorAll("button.decremQuantity");

buttons_decrem.forEach(button => {
    button.addEventListener("click",(e)=>{
        console.log("a")
        fetch("../ajax/decrementQuantity.php?id="+button.value).then((retour)=>{
            retour.json().then((error)=>{
                if(error){
                    location.reload();
                }else{
                    location.reload();
                }
            })
        })
    })
});