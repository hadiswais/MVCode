<?php 

namespace System\Core;
use PDO;
use App\Config;


/**
 * Base model
*/
abstract class Model {
    
     /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB(){
        static $db = null;

        if ($db === null){
            try{
                $dsn = 'mysql:host='. Config::DB_HOST.';dbname='.Config::DB_NAME.';charset=utf8';
                $db = new PDO($dsn,Config::DB_USER, Config::DB_PASSWORD);

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $db;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
}