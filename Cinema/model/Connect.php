<?php

namespace Model;

abstract class Connect {

    const HOST = "localhost";
    const DB = "cinema";
    const USER = "root";
    const PASS ="";
    public static function seConnecter(){
        try{
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
            } catch(\PDOException $ex){
                return $ex->getMessage();
            }

    }
}
<<<<<<< HEAD

?>
=======
>>>>>>> febbed456577a74a5c5a2f58d276711c6db4a411
