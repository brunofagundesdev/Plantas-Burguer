<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="stylesheet" href="../../css/customer.css">

    <link rel="shortcut icon" href="../../images/planta-logo.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<?php
require_once("../../../backend/source/modules/customer.php");
$customers = Customer::list();

if ($_GET['action'] == 'delete') {
    $id_delete = $_POST["id_delete"];
    
    Customer::delete($id_delete);
    $customers = Customer::list();
}

if ($_GET['action'] == 'search') {
    $ordenation = $_POST["list_ordenation"];
    $search = $_POST["list_search"];
    $customers = Customer::list($ordenation, $search);
}
?>

<body>
    <header>
        <div class="container">
            <a href="../../html/home.html">Voltar ao início</a>
        </div>
    </header>
    <main>
        <section id="hero-customer" class="image hero">
            <div class="container">
                <h2 class="title">Clientes</h2>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <h2 class="title">Clientes Cadastrados <a href="./customer-create-form.php">+</a></h2>

                <form action="./customer-table-form.php?action=search" method="POST" class="form-search">
                    <input type="text" placeholder="Buscar clientes" name="list_search">
                    <select name="list_ordenation">
                        <?php
                        $customer_fields = Customer::getFields();
                        foreach ($customer_fields as $customer_field) {

                            echo "<option value=" . $customer_field . ">" . $customer_field . "</option>";
                        }
                        ?>
                    </select>
                    <button type="submit">Pesquisar</button>
                </form>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th> # </th>
                        <th> # </th>
                    </tr>

                    <?php

                    while ($row = mysqli_fetch_assoc($customers)) {
                        echo
                        "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["email"] . "</td>"  .
                            "<td> 
                                <form action='./customer-update-form.php' method='POST' class='button-update'>
                                <input type='hidden' name='id_update' value='" . $row["id"] . "'>
                                <input type='submit' value='Editar'>
                                </form>
                                </td>" .
                            "<td> 
                                <form action='./customer-table-form.php?action=delete' method='POST' class='button-delete'>
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