<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanches</title>

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="stylesheet" href="../../css/item.css">

    <link rel="shortcut icon" href="../../images/planta-logo.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<?php
require_once("../../../backend/source/modules/item.php");
$items = Item::list();

if ($_GET['action'] == 'delete') {
    $id_delete = $_POST["id_delete"];

    Item::delete($id_delete);
    $items = Item::list();
}

if ($_GET['action'] == 'search') {
    $ordenation = $_POST["list_ordenation"];
    $search = $_POST["list_search"];
    $items = Item::list($ordenation, $search);
}

?>

<body>
    <header>
        <div class="container">
            <a href="../../html/home.html">Voltar ao início</a>
        </div>
    </header>
    <main>
        <section id="hero-item" class="image hero">
            <div class="container">
                <h2 class="title">Lanches</h2>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <h2 class="title">Lanches Cadastrados <a href="./item-create-form.php">+</a></h2>

                <form action="./item-table-form.php?action=search" method="POST" class="form-search">
                    <input type="text" placeholder="Buscar lanches" name="list_search">
                    <select name="list_ordenation">
                        <?php
                        $items_fields = Item::getFields();
                        foreach ($items_fields as $items_field) {

                            echo "<option value=" . $items_field . ">" . $items_field . "</option>";
                        }
                        ?>
                    </select>
                    <button type="submit">Pesquisar</button>
                </form>

                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th> # </th>
                        <th> # </th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($items)) {
                        echo
                        "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["description"] . "</td>
                            <td>R$" . number_format($row["price"], 2, ",", ".") . "</td>"  .
                            "<td> 
                                <form action='./item-update-form.php' method='POST' class='button-update'>
                                    <input type='hidden' name='id_update' value='" . $row["id"] . "'>
                                    <input type='submit' value='Editar'>
                                </form>
                                </td>" .
                            "<td> 
                                <form action='./item-table-form.php?action=delete' method='POST' class='button-delete'>
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
    </main>

</body>

</html>