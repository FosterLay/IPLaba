<html>
    <head> <title> Сведения о автодилера </title> </head>

    <h2>Список автодилеров:</h2>
    <table border="1">
        <tr>
        <th> ID </th><th> Название </th> <th> Адрес </th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            // Запрос на выборку сведений о пользователях
            $result = $mysqli->query("SELECT id, name, mail FROM autodealer");

            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $mail = $row['mail'];
                   

                    $counter++;

                    echo "<tr>";
                    echo "<td>$id</td><td>$name</td><td>$mail</td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего автодилеров: $counter </p>");
        ?>
    <button style='color: blue' onclick="window.location.href='new.php'">Добавить дилера</button></td>
    <button style='color: blue' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>