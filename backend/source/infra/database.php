<?php 

class Database {
    
    public static function connect() {
        $config = parse_ini_file(__DIR__ . "/../.secret");
        $connection = mysqli_connect($config["host"], $config["user"], $config["password"], $config["name"], 3306, null);

        if (!$connection) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        return $connection;
    }
}

?>