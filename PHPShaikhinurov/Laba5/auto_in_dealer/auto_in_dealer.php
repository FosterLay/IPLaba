<html>
    <head> <title> Сведения об ключах </title> </head>

    <h2> Список ключей: </h2>
    <table border="1">
        <tr>
            <th> Id Автомобиля </th> <th> Id Дилера </th> <th> Цена </th>

        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            // Запрос на выборку сведений о пользователях

            $result = $mysqli->query("SELECT
                auto_in_dealer.id,
                auto_in_dealer.price,

                automobiles.Brand as automob,
                autodealer.name as dealer
                FROM auto_in_dealer
                LEFT JOIN automobiles ON auto_in_dealer.idauto=automobiles.id
                LEFT JOIN autodealer ON auto_in_dealer.iddealer=autodealer.id
            ");
            
            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $idauto = $row['automob'];
                    $iddealer = $row['dealer'];
                    $price = $row['price'];
                    
                    echo "<tr>";
                    echo "<td>$idauto</td><td>$iddealer</td><td>$price</td><td";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";

                    $counter++;
                }
            }
            print "</table>";
            print("<p>Автомобилей в наличии: $counter </p>");
        ?>
    <button style='color: blue' onclick="window.location.href='new.php'">Добавить автомобиль</button></td>
    <button style='color: blue' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>