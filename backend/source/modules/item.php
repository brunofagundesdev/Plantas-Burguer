<?php

require_once(__DIR__ . "/../infra/database.php");

class Item {

    public static function create($name, $description, $price) {

        $conection = Database::connect();

        $query = "INSERT INTO item (name, description, price) VALUES ('$name', '$description', '$price')";

        mysqli_query($conection, $query);
        mysqli_close($conection);
    }

    public static function get($id) {
        $conection = Database::connect();
    
        $query = "
            SELECT name, description, price
            FROM item
            WHERE id = '$id';
        ";
    
        $result = mysqli_query($conection, $query);
        mysqli_close($conection);

        return mysqli_fetch_assoc($result);
    }
    
     public static function list($ordernation = "id", $search = "") {
        $conection = Database::connect();
    
        $query = "
            SELECT id, name, description, price
            FROM item
            WHERE name LIKE '%$search%' OR description LIKE '%$search%'
            ORDER BY $ordernation;
        ";
    
        $result = mysqli_query($conection, $query);
        mysqli_close($conection);

        return $result;
    }

    public static function update($id, $name, $description, $price) {
        $conection = Database::connect();
    
        $query = "
            UPDATE item 
            SET name = '$name', description = '$description', price = '$price'
            WHERE ID = '$id';
        ";
    
        mysqli_query($conection, $query);
        mysqli_close($conection);
    }

    public static function delete($id) {

        $conection = Database::connect();

        $query = "
            DELETE FROM item
            WHERE ID = '$id';
        ";

        mysqli_query($conection, $query);
        mysqli_close($conection);

    }

    public static function getFields(){
        $conection = Database::connect();

        $query = "
            DESCRIBE item;
        ";

        $result = mysqli_query($conection, $query);
        $columns = [];
        while($column = mysqli_fetch_assoc($result)) {
            $columns[] = $column["Field"];
        }
        mysqli_close($conection);

        return $columns;
    }
}
?>