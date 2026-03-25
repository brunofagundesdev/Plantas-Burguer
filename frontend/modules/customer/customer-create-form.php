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
                <h2>Cadastro</h2>
                <form action="./customer-create-form.php" method="post">
                    <label for="">Nome</label>
                    <input type="text" name="name" maxlength="100" placeholder="Digite o nome" required>

                    <label for="">Email</label>
                    <input type="text" name="email" maxlength="254" placeholder="Digite o email" required>

                    <button type="submit">Cadastrar</button>
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

require_once("../../../backend/source/modules/customer.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"]; 
    $email = $_POST["email"];

    Customer::create($name, $email);
    
}
?>