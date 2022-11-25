export async function create_table(connection) {

    return new Promise((resolve, reject) => {

        connection.query('create table manga_common ( ' +

            'id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,' +
            'common_id VARCHAR(40),' + //a1c7c817-4e59-43b7-9365-09675a149a6f jointure avec manga_volume
            'common_name VARCHAR(100),' + //one piece
            'common_cover VARCHAR(255),' + //image que l'ont a choisis nous
            'common_price DOUBLE(4,2),' + //  aléatoire
            'category VARCHAR(20),' + //gore, shonen, seinen, shojo, ..
            'author VARCHAR(50),' +
            'artist VARCHAR(50),' +
            'description VARCHAR(2000) ' +

            ')', function (error, results, fields) {
                if (error) {
                    console.log(error)
                    reject(false);
                }
                else {
                    console.log("table manga_common créé")
                    resolve(true)
                }
            })
    })
}