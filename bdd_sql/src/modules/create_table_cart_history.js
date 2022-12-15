export function create_table(connection) {

    return new Promise((resolve, reject) => {

        connection.query('create table cart_history ( ' +

            'id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,' +
            'id_cart VARCHAR(75),' +
            'id_manga INT,' +
            'quantity_manga INT,' + 
            'date datetime' +

            ')', function (error, results, fields) {
                if (error) {
                    console.log(error)
                    reject(false);
                }
                else {
                    console.log("table cart_history créé")
                    resolve(true)
                }
            })
    })
}