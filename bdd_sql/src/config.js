// remplacez les valeurs par celles de vos infos sql
export const SQL_CONFIG = 
{
    host : 'localhost',
    port: 3306,
    user : 'root',
    password : 'clause',
}

//tout sera créé automatiquement dans une base de donnée stocké dans DB_NAME
//si cette valeur est modifiée, il faudras aussi mettre à jour la database utilisée par
//les queries dans config.php
export const DB_NAME = "clause_marotta_manga_e_commerce"