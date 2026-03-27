<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link rel="shortcut icon" href="../../images/planta-logo.ico" type="image/x-icon">

    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <main>
        <section>
            <div class="container">
                <h2 class="title">Cadastrar Cliente</h2>
                <form action="./customer-create-form.php" method="post" class="form-container">
                    <label for="">Nome</label>
                    <input type="text" name="name" maxlength="100" placeholder="Digite o nome" required>

                    <label for="">Email</label>
                    <input type="email" name="email" maxlength="254" placeholder="Digite o email" required>

                    <button type="submit">Cadastrar</button>
                </form>
        </section>
        <section>
            <div class="container">
                <a href="./customer-table-form.php" class="change">Voltar aos clientes</a>
            </div>
            </div>
        </section>
    </main>

</body>

</html>


<?php

require_once("../../../backend/source/modules/customer.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];

    Customer::create($name, $email);
}
?>