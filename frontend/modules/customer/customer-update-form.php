<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>

    <link rel="shortcut icon" href="../../images/planta-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
    <?php
    require_once("../../../backend/source/modules/customer.php");

    $id_update = $_POST["id_update"];

    $customer = Customer::get($id_update);

    ?>
    <header>
        <div class="container"></div>
    </header>

    <main>
        <section>
            <div class="container">

                <h2 class="title">Editar Cliente <?= $customer["id"] ?></h2>
                <form action="./customer-update-form.php" method="POST" class="form-container">
                    <label>Nome:</label>
                    <input type="text" name="name" value="<?= $customer["name"]; ?>" required><br><br>

                    <label>Email:</label>
                    <input type="text" name="email" value="<?= $customer["email"]; ?>" required><br><br>

                    <input type="hidden" name="id_update" value="<?= $id_update; ?>">

                    <button type="submit" value="Editar Cliente">Concluir alterações</button>
                </form>
            </div>
        </section>
        <section>
            <div class="container">
                <a href="./customer-table-form.php" class="change">Voltar aos clientes</a>
            </div>
        </section>
    </main>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_update"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    Customer::update($id, $name, $email);
}

?>