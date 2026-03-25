<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planta's Burguer</title>
</head>

<body>
    <header>
        <div class="container"></div>
    </header>

    <main>
        <div class="container">
            <section>
                <h2>Cadastro de lanches</h2>
                <form action="./item-create-form.php" method="post">
                    <label for="">Nome</label>
                    <input type="text" name="name" maxlength="100" placeholder="Digite o nome" required>

                    <label for="">Descrição</label>
                    <input type="text" name="description" maxlength="254" placeholder="Digite a descrição" required>

                    <label for="">Preço</label>
                    <input type="number" step="1" name="price" placeholder="Digite o preço" required>

                    <button type="submit">Cadastrar novo lanche</button>
                </form>
            </section>
        
        </div>
    </main>

    <footer>
        <div class="container"></div>
    </footer>
</body>

</html>


<?php

require_once("../../../backend/source/modules/item.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"]; 
    $price = $_POST["price"];
    $description = $_POST["description"];

    Item::create($name, $description, $price);
    
}
?>