<?php 
$config = parse_ini_file("../.secret", true);

class Database {

    public function connect() {
        $connection = mysqli_connect($config["host"], $config["name"], $config["password"], $config["user"]);

        if (!$connection) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        return $connection;
    }
}

?>