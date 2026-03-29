<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pedido</title>
    <link rel="shortcut icon" href="../../images/planta-logo.ico" type="image/x-icon">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/demand.css">
</head>

<?php
require_once("../../../backend/source/modules/customer.php");
$customers = Customer::list();

require_once("../../../backend/source/modules/item.php");
$items = Item::list();

?>

<body>
    <main>
        <section>
            <div class="container">
                <h2 class="title">Cadastrar Pedido</h2>
                <form action="./demand-create-form.php?action=create" method="POST" class="form-container">
                    <label for="">Cliente:</label>
                    <select name="customer">
                        <?php
                        foreach ($customers as $customer) {
                            echo "
                                <option value=" . $customer["id"] . ">" . $customer["id"] . " - " . $customer["name"] . "</option>
                            ";
                        }
                        ?>
                    </select>


                    <label for="">Itens:</label>
                    <div class="form-demand-items">
                        <?php
                        foreach ($items as $item) {
                            echo "
                            <div class='form-demand-item'>
                                <label>" . $item["name"] . "</label>
                                <input type='number' name='items[" . $item["id"] . "]' min='0' value='0'>
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <button type="submit">Cadastrar</button>
                </form>
        </section>
        <section>
            <div class="container">
                <a href="./demand-table-form.php" class="change">Voltar aos pedidos</a>
            </div>
            </div>
        </section>
    </main>

</body>

</html>

<?php

require_once("../../../backend/source/modules/demand.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['action'] == 'create') {
    $customer = $_POST["customer"];
    $items = $_POST["items"];

    foreach ($items as $id => $quantity) {
        if (!$quantity) {
            unset($items[$id]);
        }
    }
    if (!empty($items)) {
        Demand::create($customer, $items);
    }
}
?>