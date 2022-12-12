"use strict";

let remove_buttons = document.querySelectorAll(".removeFromCart");

remove_buttons.forEach((button) => {

    button.addEventListener("click", (e) => {
        fetch("../ajax/removeFromCart.php?id="+button.value).then(()=>{
            location.reload()
        })
    })

});