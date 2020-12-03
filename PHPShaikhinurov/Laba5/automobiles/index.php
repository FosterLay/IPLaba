    <h2>Список автомобилей:</h2>
    <table border="1">
        <tr>
        <th> ID </th> <th> Марка </th> <th> Модель </th> <th> Год выпуска </th>
            <th> Трансмиссия </th> <th> Объём выпуска </th> <th> Стоимость </th> <th> Редактировать </th> <th> Уничтожить </th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            // Запрос на выборку сведений о пользователях
            $result = $mysqli->query("SELECT id, Brand, models, date_release, transmission, release_amount, price FROM automobiles");
            
            $counter=0;
            
            if ($result){
                // Для каждой строки из запроса
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $Brand = $row['Brand'];
                    $models = $row['models'];
                    $date_release = $row['date_release'];
                    $transmission = $row['transmission'];
                    $release_amount = $row['release_amount'];
                    $price = $row['price'];

                    $counter++;

                    $date_release = date('d-m-Y' , strtotime($date_release));

                    echo "<tr>";
                    echo "<td>$id</td><td>$Brand</td><td>$models</td><td>$date_release</td><td>$transmission</td><td>$release_amount</td><td>$price</td>";;
                    echo "<td><button style='color: green' onclick=\"window.location.href='edit_elements.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: red' onclick=\"window.location.href='delete_elements.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего автомобилей: $counter </p>");
            
        ?>
        <button style='color: green' onclick="window.location.href='create_elements.php'">Добавить автомобиль</button></td>
        <button style='color: red' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>