import * as mysql from 'mysql'
import * as config from "./config.js";

import * as create_db from "./modules/create_db.js";
import * as manga_list from "./modules/manga_list.js";
import * as API from "./modules/api_queries.js";

import * as insert_in_manga_common from "./modules/insert_in_manga_common.js";
import * as insert_in_manga_volume from "./modules/insert_in_manga_volume.js";

const connection = mysql.createConnection(config.SQL_CONFIG);
connection.connect();


const create_manga_db = async () => {

    console.log("début create_manga_db")
    console.time("script_sql")

    // on détruit et recréé la table
    if (!await create_db.create_db_and_tables(connection, config)){
        return false
    }

    console.timeLog("script_sql")

    let nb_manga_inserted = 0

    //on prend les mangas dans ./modules/manga_list.js
    manga_list.mangas.forEach(async manga => {

        //on choppe la data commune et l'insère dans la bdd
        await API.get_common_data(manga)
        await insert_in_manga_common.insert(connection, manga)

        console.timeLog("script_sql")
        
        let object_all_volumes = [];
        let nb_volume_inserted = 0;

        await API.get_volume_data(manga, object_all_volumes)

        console.log("insertion en cours de " + object_all_volumes.length + " entrées du manga "+manga.name+" dans la bdd." )
        console.timeLog("script_sql")
        
        object_all_volumes.forEach(async(object)=>{
            
            await insert_in_manga_volume.insert(connection, object)

            nb_volume_inserted++

            if(nb_volume_inserted === object_all_volumes.length){
        
                console.log("insertion de tout les volumes de " + manga.name + " terminé.")
                console.timeLog("script_sql")
                //quand tout les volumes sont insérées on augmente le nb de manga total
                nb_manga_inserted++;
        
                // si tout les manga sont insérées on coupe la connection à la bdd
                if (nb_manga_inserted === manga_list.mangas.length){
                    connection.end()
                }
            }
        })

    });
    
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



