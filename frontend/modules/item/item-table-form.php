<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once("../../../backend/source/modules/item.php");

$items = Item::list();

?>

<table border="1">
    <tr>
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
        <td>Nome: " . $row["name"] . "</td>
        <td>Descrição: " . $row["description"] . "</td>
        <td>Preço: " . $row["price"] . "</td>"  . 
        "<td> 
            <form action='./item-table-form.php?action=delete' method='POST'>
                <input type='hidden' name='id_delete' value='" . $row["id"] . "'>
                <input type='submit' value='Remover'>
            </form>
        </td>" .
        "<td> 
            <form action='./item-update-form.php' method='POST'>
                <input type='hidden' name='id_update' value='" . $row["id"] . "'>
                <input type='submit' value='Editar'>
            </form>
        </td>" .
    "</tr>";
}

echo "<br>";
?>

</table>

</body>
</html>

<?php

if ($_GET['action'] == 'delete') {
    $id_delete = $_POST["id_delete"];
    
    Item::delete($id_delete);
}

?>