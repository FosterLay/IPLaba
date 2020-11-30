<html>
    <head> <title> Редактирование данных о ключе </title> </head>
    <body>
        <form action='save_edit.php' method='get'>
            <?php
                $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
            if ($mysqli->connect_errno) {
                    echo "Не удалось подключиться к БД";
                }

                $key_id = $_GET['id'];

                $result = $mysqli->query("SELECT auto_in_dealer.id,
                    auto_in_dealer.purchase_date, auto_in_dealer.expiry_date,
                    games.name as game_name, games.id as game_id,
                    autodealer.name as store_name, autodealer.id as store_id,
                    auto_in_dealer.price, auto_in_dealer.key_code FROM auto_in_dealer
                    LEFT JOIN games ON auto_in_dealer.game_id=games.id
                    LEFT JOIN autodealer ON auto_in_dealer.store_id=autodealer.id
                    WHERE auto_in_dealer.id=$key_id"
                );

                if ($result && $st = $result->fetch_array()){
                    $idauto = $row['idauto'];
                    $iddealer = $row['iddealer'];
                    $price = $row['price'];
                }

                // Создание формы
                print "Дата приобретения: <input name='purchase_date' size='50' type='date' value='$purchase_date'>";
                print "Дата окончания действия: <input name='expiry_date' size='50' type='date' value='$expiry_date'>";

                // Получение данных об играх
                $result = $mysqli->query("SELECT id, name FROM games WHERE id<>$game_id");
                echo "<br>Игра: <select name='game_id'>";
                echo "<option selected value='$game_id'>$game_name</option>";

                if ($result){
                    // Для каждой строки из запроса
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";

                $result = $mysqli->query("SELECT id, name FROM autodealer WHERE id<>$store_id");
                echo "<br>Магазин: <select name='store_id'>";
                echo "<option selected value='$store_id'>$store_name</option>";

                if ($result){
                    // Для каждой строки из запроса
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";

                print "<br>Цена: <input name='price' size='30' type='text' value='$price'>";
                print "<br>Код активации: <input type='text' name='key_code' size='20' value='$key_code'>";
                print "<input type='hidden' name='id' size='30' value='$key_id'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='auto_in_dealer.php'">Вернуться к списку ключей</button></td></p>
    </body>
</html>