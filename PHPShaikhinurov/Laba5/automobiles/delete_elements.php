<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];

    $result = $mysqli->query("DELETE FROM auto_in_dealer WHERE idauto='$id'");

    $result = $mysqli->query("DELETE FROM automobiles WHERE id='$id'");

    header("Location: index.php");
    exit;
?>