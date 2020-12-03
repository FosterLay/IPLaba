<?php
        $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
        if ($mysqli->connect_errno){
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];

    $idauto = $_GET['idauto'];
    $iddealer = $_GET['iddealer'];
    $price = $_GET['price'];

    $result = $mysqli->query("UPDATE auto_in_dealer
        SET idauto='$idauto',
        iddealer='$iddealer',
        price='$price'
        WHERE id='$id'"
    );

    header("Location: auto_in_dealer.php");
    exit;
?>