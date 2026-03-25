<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once("../../../backend/source/modules/customer.php");

$customers = Customer::list();

?>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th> # </th>
        <th> # </th>
    </tr>



<?php


while ($row = mysqli_fetch_assoc($customers)) {
    echo     
    "<tr>
        <td>Nome: " . $row["name"] . "</td>  
        <td>Email: " . $row["email"] . "</td>"  . 
        "<td> 
            <form action='./customer-table-form.php?action=delete' method='POST'>
                <input type='hidden' name='id_delete' value='" . $row["id"] . "'>
                <input type='submit' value='Remover'>
            </form>
        </td>" .
        "<td> 
            <form action='./customer-update-form.php' method='POST'>
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
    
    Customer::delete($id_delete);
}

?>