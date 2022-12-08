import * as MFA from "mangadex-full-api"

//https://www.npmjs.com/package/mangadex-full-api
//https://md-y.github.io/mangadex-full-api/

//on lance deux fois la méthode Author pour être sur que l'auteur soit le bon, et l'artiste également
//sinon à cause de la vitesse de l'api les deux peuvent être inversés
export function get_common_data(manga) {

    return new Promise((resolve, reject) => {

        // on choppe id, description et prix aléatoire
        MFA.Manga.search({
            title: manga.name,
            limit: 1
        }).
            then(result => {

                manga.id = result[0].id;
                manga.description = result[0].localizedDescription.en.replaceAll("\n", "<br/>");

                // on choppe l'autheur
                MFA.Author.search({
                    ids: [result[0].authors[0].id],
                }).
                    then(author_result => {

                        manga.author = author_result[0].name

                        //on choppe l'artiste
                        MFA.Author.search({
                            ids: [result[0].artists[0].id]
                        }).
                            then(artists_result => {

                                manga.artist = artists_result[0].name

                                resolve()
                            })
                    })
            }).catch()

    })
}

export function get_volume_data(manga, object_all_volumes) {
    return new Promise((resolve, reject) => {
        MFA.Cover.search({
            manga: [manga.id],
            limit: 110
        }).
            then(results => {
                results.forEach(result => {
                    object_all_volumes.push({
                        id: result.manga.id,
                        volume_number: result.volume,
                        cover_url: result.image512,
                        stock: Math.floor(Math.random()*10),
                        price: manga.price = Math.floor(Math.random() * 5 + 7) + .99 //prix entre 7.99 et 11.99
                    })
                });
                resolve()
            })
    })
}