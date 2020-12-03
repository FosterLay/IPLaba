<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];
    // Удаление автомобилей у дилера
    $result = $mysqli->query("DELETE FROM auto_in_dealer WHERE iddealer='$id'");
    // Удаление автодилера
    $result = $mysqli->query("DELETE FROM autodealer  WHERE id='$id'");

    header("Location: autodealer.php");
    exit;
?>