<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $idauto = $_GET['idauto'];
    $iddealer = $_GET['iddealer'];
    $price = $_GET['price'];

    // Выполнение запроса

    $result = $mysqli->query("INSERT INTO auto_in_dealer 
    SET idauto='$idauto', 
    iddealer='$iddealer',
    price='$price'");
    
    if ($result){
        print "<p>Вы успешно внесли автомобиль в базе данных.";
    }
    else{
        print "Ошибка сохранения.";
    }
    echo "<p>$result";

    // $result = $mysqli->query("INSERT INTO auto_in_dealer
    //     SET idauto='$idauto', iddealer='$iddealer',
    //     price='$price'
    // ");

    //header("Location: auto_in_dealer.php");
    // exit;
?>
    <button style='color: blue' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
    <button style='color: blue' onclick="window.location.href='auto_in_dealer.php'">Вернуться к списку автомобилей</button></td>