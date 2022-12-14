"use strict";

let buttons = document.querySelectorAll("button.changeStatus");

buttons.forEach(button => {
    button.addEventListener("click",(e)=>{
        const current_status = button.getAttribute("currentStatus");
        let new_status = "";

        switch(current_status){
            case "PAID": new_status = "DELIVERED";break;
            case "DELIVERED": new_status = "PAID";break;
        }

        // console.log(current_status)

        fetch("../ajax/changeOrderStatus.php?id="+button.value+"&status="+new_status).then(()=>{
            location.reload()
        })

    })
});