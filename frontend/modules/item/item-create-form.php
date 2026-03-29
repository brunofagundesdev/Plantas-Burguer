<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Lanche</title>
    <link rel="shortcut icon" href="../../images/planta-logo.ico" type="image/x-icon">

    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <main>
        <section>
            <div class="container">
                <h2 class="title">Cadastrar Lanche</h2>
                <form action="./item-create-form.php?action=create" method="post" class="form-container">
                    <label for="">Nome</label>
                    <input type="text" name="name" maxlength="100" placeholder="Digite o nome" required>

                    <label for="">Descrição</label>
                    <input type="text" name="description" placeholder="Digite a descrição" required>

                    <label for="">Preço</label>
                    <input type="number" name="price" placeholder="Digite o preço" required>

                    <button type="submit">Cadastrar</button>
                </form>
        </section>
        <section>
            <div class="container">
                <a href="./item-table-form.php" class="change">Voltar aos lanches</a>
            </div>
            </div>
        </section>
    </main>

</body>

</html>


<?php

require_once("../../../backend/source/modules/item.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['action'] == 'create') {

    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    Item::create($name, $description, $price);
}
?>