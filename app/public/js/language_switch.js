"use strict";

// let options = document.querySelectorAll("#language_select option");

// options.forEach(option => {
//     option.addEventListener("input", (e)=>{
//         console.log(e)
//     })
// });

let select = document.querySelector("#language_select");

select.addEventListener("change",(e)=>{
    const queryString = window.location.search;
    
    const urlParams = new URLSearchParams(queryString);

    urlParams.set('lan', e.target.value);

    urlParams.toString();

    location.href = location.href.split("?")[0] + "?" + urlParams;
})

