export function create_table(connection) {

    return new Promise((resolve, reject) => {

        connection.query('create table users ( ' +

            'id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,' +
            'username VARCHAR(32),' +
            'email VARCHAR(255),' +
            'password VARCHAR(255)' +

            ')', function (error, results, fields) {
                if (error) {
                    console.log(error)
                    reject(false);
                }
                else {
                    console.log("table users créé")
                    resolve(true)
                }
            })
    })
}