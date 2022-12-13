export function create_table(connection) {

    return new Promise((resolve, reject) => {

        connection.query('create table orders ( ' +

            'id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,' +
            'id_order INT,' +
            // 'id_user INT,' +
            'id_manga INT,' +
            'quantity_manga INT,' + 
            'price_manga DOUBLE(6,2)' +

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