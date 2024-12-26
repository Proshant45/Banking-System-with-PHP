<?php
namespace core;

class Database{
    public static function connect(){
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $databaseName = "learning";


        $conn = mysqli_connect($serverName,$userName,$password,$databaseName);

        return $conn;
    }

    

}