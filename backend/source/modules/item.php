<?php

require_once(__DIR__ . "/../infra/database.php");

class Item {

    public static function create($name, $description, $price) {

        $conexao = Database::connect();

        $query = "INSERT INTO item (name, description, price) VALUES ('$name', '$description', '$price')";

        mysqli_query($conexao, $query);
        mysqli_close($conexao);
    }

    public static function get($id) {
        $conexao = Database::connect();
    
        $query = "
            SELECT name, description, price
            FROM item
            WHERE id = '$id';
        ";
    
        $result = mysqli_query($conexao, $query);
        mysqli_close($conexao);

        return mysqli_fetch_assoc($result);
    }
    
     public static function list($ordernation = "id", $name = "") {
        $conexao = Database::connect();
    
        $query = "
            SELECT id, name, description, price
            FROM item
            WHERE name LIKE '%$name%'
            ORDER BY $ordernation;
        ";
    
        $result = mysqli_query($conexao, $query);
        mysqli_close($conexao);

        return $result;
    }

    public static function update($id, $name, $price, $description) {
        $conexao = Database::connect();
    
        $query = "UPDATE item SET name = '$name', description = '$description', price = '$price' WHERE ID = '$id'";
    
        mysqli_query($conexao, $query);
        mysqli_close($conexao);
    }

    public static function delete($id) {

        $conexao = Database::connect();

        $query = "DELETE FROM item WHERE ID = '$id'";

        mysqli_query($conexao, $query);
        mysqli_close($conexao);

    }
}
?>