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
    require_once("../../../backend/source/modules/item.php");

    $id_update = $_POST["id_update"];

    $item = Item::get($id_update);

    ?>
    <header>
        <div class="container"></div>
    </header>

    <main>
        <section>
            <div class="container">
                <h2 class="title">Editar Lanche</h2>
                <form action="./item-update-form.php?action=update" method="POST" class="form-container">
                    <label>Nome:</label>
                    <input type="text" name="name" value="<?= $item["name"]; ?>" required><br><br>

                    <label>Descrição:</label>
                    <input type="text" name="description" value="<?= $item["description"]; ?>" required><br><br>

                    <label>Preço:</label>
                    <input type="number" name="price" value="<?= $item["price"]; ?>" required><br><br>

                    <input type="hidden" name="id_update" value="<?= $id_update; ?>">

                    <button type="submit" value="Editar Lanche">Concluir alterações</button>
                </form>
            </div>
        </section>
        <section>
            <div class="container">
                <a href="./item-table-form.php" class="change">Voltar aos lanches</a>
            </div>
        </section>
    </main>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET['action'] == 'update') {
        $id = $_POST["id_update"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        Item::update($id, $name, $description, $price);
        header('Location: ./item-table-form.php');
    }
    ?>
</body>

</html>