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
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th> # </th>
                        <th> # </th>
                    </tr>

                    <?php
                    require_once("../../../backend/source/modules/customer.php");

                    $customers = Customer::list();

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

<?php

if ($_GET['action'] == 'delete') {
    $id_delete = $_POST["id_delete"];

    Customer::delete($id_delete);
    header('Location: ./customer-table-form.php');
}

?>