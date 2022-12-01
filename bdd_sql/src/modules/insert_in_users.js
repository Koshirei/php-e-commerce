export async function insert(connection, content) {

    return new Promise((resolve, reject) => {
        connection.query(`INSERT INTO users (username, email, password ) VALUES ( ` +

            "'" + content.username      +"',"+
            "'" + content.email         +"',"+
            "'" + content.password      +"'"+

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