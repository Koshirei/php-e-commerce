export async function insert(connection, content) {

    return new Promise((resolve, reject) => {

        connection.query(`INSERT INTO manga_common (common_id, title, common_cover, category, author, artist, description) VALUES ( ` +

            "'" + content.id            +"',"+
            "'" + content.name          +"',"+
            "'" + content.cover         +"',"+
            "'" + content.category      +"',"+
            "'" + content.author        +"',"+
            "'" + content.artist        +"',"+
            "'" + content.description.replaceAll("'"," ")   +"'"+

            `)` , function (error, results, fields) {
                if (error) {
                    console.log(error)
                    reject(false);
                }
                else {
                    console.log("ROW ' " + content.name + " ' créée (common)")
                    resolve(true)
                }
            })
    })
}