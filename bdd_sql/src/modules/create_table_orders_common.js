export function create_table(connection) {

    return new Promise((resolve, reject) => {

        connection.query('create table orders_common ( ' +

            'id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,' +
            'id_user INT,' +
            'price_full_order DOUBLE(7,2),' +
            'status enum("PAID","DELIVERED")' +

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