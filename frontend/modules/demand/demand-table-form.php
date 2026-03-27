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
                    require_once("../../../backend/source/modules/demand.php");

                    $demands = Demand::list();

                    while ($demand = mysqli_fetch_assoc($demands)) {
                        $items_boxes = "<ul>";
                        foreach ($demand["items"] as $item) {
                            $items_boxes .= "
                                <li>" .
                                $item["name"]
                                . "</li>
                            ";
                        }
                        $items_boxes .= "</ul>";

                        echo "
                            <div class='demand'>
                                <h3>Pedido - " . $demand["id"] . "</h3>

                                
                            </div>";
                    }
                    ?>
                </div>








                <table>
                    <tr>
                        <th>Id - Pedido</th>
                        <th>Id - Cliente</th>
                        <th>Nome - Cliente</th>
                        <th>Preço</th>
                        <th> # </th>
                        <th> # </th>
                    </tr>

                    <?php
                    require_once("../../../backend/source/modules/demand.php");

                    $demands = Item::list();

                    while ($row = mysqli_fetch_assoc($demands)) {
                        echo
                        "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["description"] . "</td>
                            <td>" . $row["price"] . "</td>"  .
                            "<td> 
                                <form action='./demand-update-form.php' method='POST' class='button-update'>
                                <input type='hidden' name='id_update' value='" . $row["id"] . "'>
                                <input type='submit' value='Editar'>
                                </form>
                                </td>" .
                            "<td> 
                                <form action='./demand-table-form.php?action=delete' method='POST' class='button-delete'>
                                <input type='hidden' name='id_delete' value='" . $row["id"] . "'>
                                <input type='submit' value='Remover'>
                                </form>
                            </td>" .
                            "</tr>";
                    }
                    ?>
                </table>
            </div>
        </section>

        <section>
            
        </section>
    </main>

</body>

</html>

<?php

if ($_GET['action'] == 'delete') {
    $id_delete = $_POST["id_delete"];

    Item::delete($id_delete);
    header('Location: ./demand-table-form.php');
}

?>