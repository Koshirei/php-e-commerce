export async function insert(connection, content) {

    return new Promise((resolve, reject) => {
        connection.query(`INSERT INTO users (username, email, password, role , address, city, postal_code, phone_number) VALUES ( ` +

            "'" + content.username      +"',"+
            "'" + content.email         +"',"+
            "'" + content.password      +"',"+
            "'" + content.role          +"'," +
            "'" + content.address       +"',"+
            "'" + content.city          +"',"+
            "'" + content.postal_code   +"',"+
            "'" + content.phone_number  +"'" +

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