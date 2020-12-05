<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $name = $_GET['name'];
    $mail = $_GET['mail'];

    // Выполнение запроса
    $result = $mysqli->query("INSERT INTO autodealer SET name='$name', mail='$mail'");
    
    if ($result){
        print "<p>Вы успешно добавили автодилера.";
    }
    else{
        print "Ошибка сохранения.";
    }
    echo "<p>$result";
?>
    <button style='color: red' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
    <button style='color: green' onclick="window.location.href='autodealer.php'">Вернуться к списку автодилеров</button></td>
