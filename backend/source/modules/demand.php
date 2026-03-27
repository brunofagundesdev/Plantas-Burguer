<?php

require_once(__DIR__ . "/../infra/database.php");

class Demand {

    public static function create($costumer, $items) {

        $conexao = Database::connect();
        
        $query = "
            INSERT INTO demand (costumer)
            VALUES ($costumer)
            RETURNING id;
        ";
        
        $demand_id = mysqli_query($conexao, $query);
        mysqli_close($conexao);
        
        foreach ($items as $item) {
            $item_id = $item['id'];

            $conexao = Database::connect();
            $query = "
                INSERT INTO demand_item (demand, item)
                VALUES ($demand_id, $item_id);
            ";

            mysqli_query($conexao, $query);
            mysqli_close($conexao);
        }
    }

    public static function get($id) {
        $conexao = Database::connect();
    
        $query = "
            SELECT name, description, price
            FROM item
            WHERE id = '$id'
            LIMIT 1;
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

    public static function update($id, $name, $description, $price) {
        $conexao = Database::connect();
    
        $query = "
            UPDATE item 
            SET name = '$name', description = '$description', price = '$price'
            WHERE ID = '$id';
        ";
    
        mysqli_query($conexao, $query);
        mysqli_close($conexao);
    }

    public static function delete($id) {

        $conexao = Database::connect();

        $query = "
            DELETE FROM item
            WHERE ID = '$id';
        ";

        mysqli_query($conexao, $query);
        mysqli_close($conexao);

    }
}
?>