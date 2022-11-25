export function create_table(connection) {

    return new Promise((resolve, reject) => {

        connection.query('create table manga_volume ( ' +

            'id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,' +
            'common_id VARCHAR(40),' + //a1c7c817-4e59-43b7-9365-09675a149a6f jointure avec manga_common
            'volume_number INT,' + //2 
            'cover_url VARCHAR(255),' + //https://uploads.mangadex.org/covers/a1c7c817-4e59-43b7-9365-09675a149a6f/47b000fb-c5af-451a-a6b2-580e7b4c81bc.png.512.jpg
            'stock INT' + //aléatoire

            ')', function (error, results, fields) {
                if (error) {
                    console.log(error)
                    reject(false);
                }
                else {
                    console.log("table manga_volume créé")
                    resolve(true)
                }
            })
    })
}