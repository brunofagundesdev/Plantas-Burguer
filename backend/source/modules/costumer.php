<?php
require_once("../infra/database.php");

class Costumer {

    public static function create($name, $email) {

        $conexao = Database::connect();

        $query = "INSERT INTO costumer (name, email) VALUES ($name, $email)";

        mysqli_query($conexao, $query);
        mysqli_close($conexao);

    }

    public static function update($id, $name, $email) {
        $conexao = Database::connect();
    
        $query = "UPDATE costumer SET name = $name, email = $email WHERE ID = $id";
    
        mysqli_query($conexao, $query);
        mysqli_close($conexao);

    }

    public static function get($column, $value) {

    }
    
    public static function delete($id) {

        $conexao = Database::connect();

        $query = "DELETE FROM costumer WHERE ID = $id";

        mysqli_query($conexao, $query);
        mysqli_close($conexao);

    }
}

?>