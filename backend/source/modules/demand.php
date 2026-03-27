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
    
     public static function list() {
        $conexao = Database::connect();
    
        $query = "
            SELECT demand.id, demand.timetable,
            customer.id, customer.name, customer.email,
            item.id, item.name, item.price, demand_item.quantity,
            sum(item.price * demand_item.quantity) as total
            FROM demand
            JOIN demand_item on demand.id = demand_item.demand
            JOIN item on item.id = demand_item.item 
            JOIN customer on demand.customer = customer.id
            GROUP BY demand.id
            ORDER BY demand.timetable;
        ";
    
        $result = mysqli_query($conexao, $query);
        mysqli_close($conexao);

        return $result;
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