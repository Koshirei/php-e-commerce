export function reset_db(connection, db_name) {

    //on supprime la bdd
    connection.query('DROP DATABASE ' + db_name, function (error, results, fields) {
        if (error) console.log("La BDD n'existe pas;");
        if (results) console.log("La BDD à été supprimée");
    })
    
    //on la recréé
    connection.query('CREATE DATABASE ' + db_name, function (error, results, fields) {
        if (error) throw error;
        if (results) console.log("La BDD a été crée");
    })
    
    //on se positionne dessus pour les prochaines queries
    connection.query('use ' + db_name, function (error, results, fields) {
        if (error) throw error;
        console.log("les requêtes d'effectuent sur " + db_name)
    })
}