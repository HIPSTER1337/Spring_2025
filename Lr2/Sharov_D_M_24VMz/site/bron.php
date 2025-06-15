<?php include $_SERVER['DOCUMENT_ROOT']."/include_db.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/header.php";?>
<!DOCTYPE html>
<html lang="ru">

    <head>
        <link rel="stylesheet" href="index.css">
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            
    </head>
    <body>
    <?php
    if (isset($_POST))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $itemId = $_POST["itemId"];
        $phone_number = $_POST["number"];
        $sql = "INSERT INTO bron (name, email, phone_number, id_car, date_reg) values
                                 (:name, :email, :phone_number, :id_car, CURDATE())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
        "name" => $name,
        "email"=> $email,
        "phone_number" => $phone_number,
        "id_car" => $itemId
    ]);
        echo "<h3 style = 'text-align: center; color: white;'><br><br><br>
        Ваша заявка зарегистрирована</h3>";
    }
    else
    {
        echo "<h3 style = 'text-align: center; color: white;'><br><br><br>
        Ошибка отправки</h3>";
    }

    ?>

    </body>
</html>