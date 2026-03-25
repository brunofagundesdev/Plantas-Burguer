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

    $id_update = $_POST["id_update"];

    $items = item::get($id_update);

?>

    <form action="./item-update-form.php" method="POST">
        <label for="">Nome</label>
        <input type="text" name="name" maxlength="100" placeholder="Digite o nome" required>

        <label for="">Descrição</label>
        <input type="text" name="description" maxlength="254" placeholder="Digite o descrição" required>

        <label for="">Preço</label>
        <input type="number" step="1" name="price" placeholder="Digite o preço" required>
    </form>
    
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_update"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    Item::update($id, $name, $price, $description);
}

?>