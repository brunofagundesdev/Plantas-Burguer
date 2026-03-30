<?php

require_once(__DIR__ . "/../infra/database.php");

class Demand
{

    public static function create($customer, $items)
    {

        $conection = Database::connect();

        $query_demand = "INSERT INTO demand(customer) VALUES ($customer);";

        if (mysqli_query($conection, $query_demand)) {
            $demand_id = mysqli_insert_id($conection);

            foreach ($items as $item_id => $quantity) {
                $query_item = "
                    INSERT INTO demand_item(demand, item, quantity) 
                    VALUES ($demand_id, $item_id, $quantity);
                ";

                mysqli_query($conection, $query_item);
            }
        }

        mysqli_close($conection);
    }

    public static function list()
    {
        $conection = Database::connect();

        // devolve uma linha por pedido
        $query_demands = "
            SELECT 
                demand.id AS id,
                demand.timetable AS timetable,
                customer.id AS customer_id,
                customer.name AS customer_name,
                SUM(item.price * demand_item.quantity) AS total
            FROM demand
                JOIN customer ON demand.customer = customer.id
                JOIN demand_item ON demand.id = demand_item.demand
                JOIN item ON item.id = demand_item.item
            GROUP BY demand.id
            ORDER BY demand.id ASC;
        ";

        // devolve varias linha por pedido - pra cada item dele
        $query_items = "
            SELECT 
                demand_item.demand as demand_id,
                item.id as id,
                item.name as name,
                item.price as price,
                item.price * demand_item.quantity as subtotal,
                demand_item.quantity as quantity
            FROM demand_item
            JOIN item ON item.id = demand_item.item;
        ";

        $result_demands = mysqli_query($conection, $query_demands);
        $result_items = mysqli_query($conection, $query_items);
        mysqli_close($conection);

        $demands = [];

        while ($demand = mysqli_fetch_assoc($result_demands)) {
            $demands[$demand['id']] = $demand;
            $demands[$demand['id']]['items'] = [];
        }

        while ($item = mysqli_fetch_assoc($result_items)) {
            $demands[$item['demand_id']]['items'][] = $item;
        }

        return $demands;
    }

    public static function delete($id)
    {
        $conection = Database::connect();

        $query = "
            DELETE FROM demand
            WHERE ID = '$id';
        ";

        mysqli_query($conection, $query);
        mysqli_close($conection);
    }
}
