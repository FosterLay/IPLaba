<?php
    $mysqli = new mysqli("localhost", "f0526324_serials", "0000", "f0526324_serials");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $name = $_GET['name'];
    $email = $_GET['email'];
    $message = $_GET['message'];

    $result = $mysqli->query(
        "INSERT INTO messages SET name='$name', email='$email', message='$message'"
    );
?>