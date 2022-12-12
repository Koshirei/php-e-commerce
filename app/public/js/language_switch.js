"use strict";

let select = document.querySelector("#language_select");

select.addEventListener("change",(e)=>{

    fetch("../ajax/language_switch.php?lan="+e.target.value).then(()=>{
        location.reload()
    })
    
})

