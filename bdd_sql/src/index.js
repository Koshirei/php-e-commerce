import * as create_db from "./modules/create_db.js";

const create_manga_db = async () => {

    console.time("create_manga_db")
    console.log("début create_manga_db")

    if (!await create_db.create_db_and_tables()){
        return false
    }
    
    console.timeEnd("create_manga_db")
}

create_manga_db()

// import * as MFA from "mangadex-full-api"

// MFA.Manga.search({
//     title:"one piece",
//     limit:1
// }).
// then(results=>{
//     console.log("there are " + results.length + " results")
//     let manga_id = results[0].id
//     console.log(manga_id)
//     results.forEach(result => {
//         // console.log(result)
//     });

//     MFA.Cover.search({
//         manga: [manga_id]  ,
//         limit: 200
//     }).
//     then(results=>{
//         // console.log(results)
//         results.forEach(result => {
//             console.log(result.volume, result.image512)
            
//         });
//         // console.log(results.length)

//         import("node-fetch").then(({default:fetch})=>fetch("https://api.mangadex.org/author/08aed764-962e-4b76-b855-8ae2aa94ea9e").
//         then((response)=>response.json()).
//         then((json)=>console.log(json.data.attributes.name)))
//       })
// })

// MFA.Cover.search({
//   manga: ["a1c7c817-4e59-43b7-9365-09675a149a6f"]  ,
//   limit: 110
// }).
// then(results=>{
    // console.log(results)
    // results.forEach(result => {
        // console.log(result.volume, result.image256)
// 
    // });
    // console.log(results.length)
// })

//a1c7c817-4e59-43b7-9365-09675a149a6f
//ef87f8dd-919a-49b9-9336-4ebfaa593579

//BC e7eabe96-aa17-476f-b431-2497d5e9d060
//tabata 08aed764-962e-4b76-b855-8ae2aa94ea9e



