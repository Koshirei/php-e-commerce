"use strict";


let buttons_increm = document.querySelectorAll("button.incremQuantity");

buttons_increm.forEach(button => {
    button.addEventListener("click",(e)=>{
        fetch("../ajax/incrementQuantity.php?id="+button.value).then((retour)=>{
            retour.json().then((error)=>{
                if(error.error === true){
                    document.querySelector("div#outofstock").hidden = false;
                }else if (error.error===false){
                    location.reload();
                }
            })
        })
    })
});