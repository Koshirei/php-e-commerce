<?php //singleton base de données;

namespace Database;

use PDO;
use Framework\Config\Config;

class Database{ 
    
    protected static $instance = null;

    public STATIC function getInstance(){
        
        if (self::$instance===null){
            try{
                $mysql = Config::get("mysql");
                self::$instance = new PDO('mysql:host='.$mysql["host"].';dbname='.$mysql["db_name"], $mysql["user"], $mysql["password"]);  
            }catch (\Throwable $e){
                echo "Soucis connection à la BDD;<br/>";
                var_dump($e);
            }
        }

        return self::$instance;
    }

}
