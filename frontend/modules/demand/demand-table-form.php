<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="stylesheet" href="../../css/demand.css">

    <link rel="shortcut icon" href="../../images/planta-logo.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<?php
require_once("../../../backend/source/modules/demand.php");

if ($_GET['action'] == 'delete') {
    $id_delete = $_POST["id_delete"];

    Demand::delete($id_delete);
    header('Location: ./demand-table-form.php');
}

?>

<body>
    <header>
        <div class="container">
            <a href="../../html/home.html">Voltar ao início</a>
        </div>
    </header>
    <main>
        <section id="hero-demand" class="image hero">
            <div class="container">
                <h2 class="title">Pedidos</h2>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <h2 class="title">Pedidos Cadastrados <a href="./demand-create-form.php">+</a></h2>


                <div class="demands">
                    <?php

                    $demands = Demand::list();

                    foreach ($demands as $demand) {

                        $items_boxes = "<ul>";
                        foreach ($demand["items"] as $item) {
                            $items_boxes .= "<li><i>" . $item["name"] . "</i> x" . $item["quantity"] . " - R$" . number_format($item["price"], 2, ',', '.') . " cada → R$" . number_format($item["subtotal"], 2, ',', '.') . "</li>";
                        }
                        $items_boxes .= "</ul>";

                        echo "
                            <div class='demand'>
                                <p><b>Pedido:</b><i> " . $demand["id"] . "</i></p>
                                <p><b>Cliente:</b><i> " . $demand["customer_name"] . " (ID: " . $demand["customer_id"] . ")</i></p>
                                <p><b>Horário:</b><i> " . date('d/m/Y H:i:s', strtotime($demand["timetable"])) . "</i></p>
                                <p><b>Itens:</b></p>"
                            . $items_boxes .
                            "<p><b>Total: </b>R$" . number_format($demand["total"], 2, ',', '.') . "</p>
                                <form action='./demand-table-form.php?action=delete' method='POST' class='button-delete'>
                                    <input type='hidden' name='id_delete' value='" . $demand["id"] . "'>
                                    <input type='submit' value='Remover'>
                                </form>
                            </div>";
                        // var_dump($demand);
                    }
                    ?>
                </div>
                </table>
            </div>
        </section>

        <section>

        </section>
    </main>

</body>

</html>