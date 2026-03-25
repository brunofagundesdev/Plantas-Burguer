<?php
require_once(__DIR__ . "/../infra/database.php");

class Customer {

    public static function create($name, $email) {

        $conexao = Database::connect();

        $query = "INSERT INTO customer (name, email) VALUES ($name, $email)";

        $result = mysqli_query($conexao, $query);
        mysqli_close($conexao);
    }

    public static function update($id, $name, $email) {
        $conexao = Database::connect();
    
        $query = "UPDATE customer SET name = $name, email = $email WHERE ID = $id";
    
        $result = mysqli_query($conexao, $query);
        mysqli_close($conexao);

    }

    public static function get($id) {
        $conexao = Database::connect();
    
        $query = "
            SELECT name, email
            FROM customer
            WHERE id = $id;
        ";
    
        $result = mysqli_query($conexao, $query);
        mysqli_close($conexao);

        return mysqli_fetch_assoc($result);
    }

    public static function list($ordernation = "id", $name = "") {
        $conexao = Database::connect();
    
        $query = "
            SELECT id, name, email
            FROM customer
            WHERE name LIKE '%$name%'
            ORDER BY $ordernation;
        ";
    
        $result = mysqli_query($conexao, $query);
        mysqli_close($conexao);

        return $result;
    }
    
    public static function delete($id) {

        $conexao = Database::connect();

        $query = "DELETE FROM customer WHERE ID = $id";

        $result = mysqli_query($conexao, $query);
        mysqli_close($conexao);

    }
}

?>