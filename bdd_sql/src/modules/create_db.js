// let mysql = require('mysql')
import * as mysql from 'mysql'
import * as config from "../config.js";

import * as reset_db from './reset_db.js'

import * as create_table_manga_common from "./create_table_manga_common.js";
import * as create_table_manga_volume from "./create_table_manga_volume.js";

export async function create_db_and_tables() {


    const connection = mysql.createConnection(config.SQL_CONFIG);

    connection.connect();

    //on drop la base de donnée et la recréer > reset
    reset_db.reset_db(connection, config.DB_NAME)

    //on va créer les tables nécessaires
    //avec await comme ça on utilise pas l'api temps que c'est pas fini
    const result_manga_common = await create_table_manga_common.create_table(connection);
    const result_manga_volume = await create_table_manga_volume.create_table(connection);

    connection.end()

    // on vérifie que les tables ont été crées correctement avant d'envoyer le return
    // si y'a un soucis, le code ne continue pas vers l'api a cause du false
    // sinon ça continue tranquille

    if (
        !result_manga_common ||
        !result_manga_volume
    ) {
        console.log("quelque chose c'est mal passé arrêt du code")
        return false
    } else {
        return true
    }
}