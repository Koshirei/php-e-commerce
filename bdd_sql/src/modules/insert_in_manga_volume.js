export async function insert(connection, content) {

    return new Promise((resolve, reject) => {
        connection.query(`INSERT INTO manga_volume (common_id, volume_number, cover_url, stock, price) VALUES ( ` +

            "'" + content.id            +"',"+
            "'" + content.volume_number +"',"+
            "'" + content.cover_url     +"',"+
            "'" + content.stock         +"',"+
            "'" + content.price         +"'" +

            `)` , function (error, results, fields) {
                if (error) {
                    console.log(error)
                    reject(false);
                }
                else {
                    resolve(true)
                }
            })
    })
}