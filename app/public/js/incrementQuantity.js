"use strict";


let buttons = document.querySelectorAll("button.incremQuantity");

buttons.forEach(button => {
    button.addEventListener("click",(e)=>{
        fetch("../ajax/incrementQuantity.php?id="+button.value).then((retour)=>{
            // location.reload()
            retour.json().then((json)=>{
                console.log(json)
            })
        })
    })
});