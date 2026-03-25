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

    $id_update = $_POST["id_update"];

    $customer = Customer::get($id_update);

?>

<form action="./customer-update-form.php" method="POST">
    <label>Nome:</label>
    <input type="text" name="name" value="<?=$customer["name"];?>" required><br><br>

    <label>Email:</label>
    <input type="text" name="email" value="<?=$customer["email"];?>" required><br><br>

    <input type="hidden" name="id_update" value="<?=$id_update;?>">

    <input type="submit" value="Editar Cliente"> 
</form>
    
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