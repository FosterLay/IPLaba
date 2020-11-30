<?php
        $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
        if ($mysqli->connect_errno){
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];

    $purchase_date = $_GET['purchase_date'];
    $expiry_date = $_GET['expiry_date'];
    $game_id = $_GET['game_id'];
    $store_id = $_GET['store_id'];
    $price = $_GET['price'];
    $key_code = $_GET['key_code'];

    $result = $mysqli->query("UPDATE auto_in_dealer
        SET purchase_date='$purchase_date', expiry_date='$expiry_date',
        game_id='$game_id', store_id='$store_id',
        price='$price', key_code='$key_code'
        WHERE id='$id'"
    );

    header("Location: auto_in_dealer.php");
    exit;
?>