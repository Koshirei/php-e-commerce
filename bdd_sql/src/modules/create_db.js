import * as reset_db from './reset_db.js'

import * as create_table_manga_common from "./create_table_manga_common.js";
import * as create_table_manga_volume from "./create_table_manga_volume.js";
import * as create_table_users from "./create_table_user.js";
import * as create_table_orders from "./create_table_orders.js";
import * as create_table_orders_common from "./create_table_orders_common.js";

export async function create_db_and_tables(connection, config) {

    //on drop la base de donnée et la recréer > reset
    reset_db.reset_db(connection, config.DB_NAME)

    //on va créer les tables nécessaires
    //avec await comme ça on utilise pas l'api temps que c'est pas fini
    const result_manga_common = await create_table_manga_common.create_table(connection);
    const result_manga_volume = await create_table_manga_volume.create_table(connection);
    const result_users = await create_table_users.create_table(connection);
    const result_orders = await create_table_orders.create_table(connection);
    const result_orders_common = await create_table_orders_common.create_table(connection);

    // on vérifie que les tables ont été crées correctement avant d'envoyer le return
    // si y'a un soucis, le code ne continue pas vers l'api a cause du false
    // sinon ça continue tranquille

    if (
        !result_manga_common ||
        !result_manga_volume ||
        !result_users
    ) {
        console.log("quelque chose c'est mal passé. arrêt du code")
        return false
    } else {
        return true
    }
}