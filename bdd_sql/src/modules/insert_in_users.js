export async function insert(connection, content) {

    return new Promise((resolve, reject) => {
        connection.query(`INSERT INTO users (username, email, password, role ) VALUES ( ` +

            "'" + content.username      +"',"+
            "'" + content.email         +"',"+
            "'" + content.password      +"',"+
            "'" + content.role       +"'" +

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