<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $Brand = $_GET['Brand'];
    $models = $_GET['models'];
    $date_release = $_GET['date_release'];
    $transmission = $_GET['transmission'];
    $release_amount = $_GET['release_amount'];
    $price = $_GET['price'];

    // Выполнение запроса
    $result = $mysqli->query("INSERT INTO automobiles SET Brand='$Brand',
    models='$models', date_release='$date_release',
    transmission='$transmission', release_amount ='$release_amount', price ='$price'");

    // если нет ошибок при выполнении запроса
    if ($result){
        print "<p>Вы успешно внесли автомобиль в базе данных.";
    }
    else{
        print "Ошибка сохранения.";
    }
?>
    <button style='color: red' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
    <button style='color: green' onclick="window.location.href='index.php'">Вернуться к списку автомобилей</button></td>
<!-- <a href='index.php'> Вернуться к списку автомобилей </a> -->