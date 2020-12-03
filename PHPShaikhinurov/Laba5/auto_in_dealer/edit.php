<html>
    <head> <title> Редактирование данных о наличии автомобилей </title> </head>
    <body>
        <form action='save_edit.php' method='get'>
            <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
            if ($mysqli->connect_errno) {
                    echo "Не удалось подключиться к БД";
                }

                $key_id = $_GET['id'];

                $result = $mysqli->query("SELECT 
                automobiles.id as idauto,
                autodealer.id as iddealer,
                auto_in_dealer.price,

                automobiles.Brand as automob,
                automobiles.models as automod,
                autodealer.name as dealer
                FROM auto_in_dealer
                LEFT JOIN automobiles ON auto_in_dealer.idauto= automobiles.id
                LEFT JOIN autodealer ON auto_in_dealer.iddealer=autodealer.id
                WHERE auto_in_dealer.id=$key_id"
                );
              
               
                if ($result && $st = $result->fetch_array()){
                    $idauto = $st['idauto'];
                    $automob = $st['automob'];
                    $automod = $st['automod'];
                    $iddealer = $st['iddealer'];
                    $dealer = $st['dealer'];
                    $price = $st['price'];
                }
               

                // Получение данных об играх
                $result = $mysqli->query("SELECT id, Brand, models FROM automobiles WHERE id<>$idauto");
                echo "<br>Автомобиль: <select name='idauto'>";
                echo "<option selected value='$idauto'>$automob - $automod</option>";

                if ($result){
                    // Для каждой строки из запроса
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $Brand = $row['Brand'];
                        $models = $row['models'];

                        echo "<option value='$id'>$Brand - $models</option>";
                    }
                }
                echo "</select>";

                $result = $mysqli->query("SELECT id, name FROM autodealer WHERE id<>$iddealer");
                echo "<br>Дилер: <select name='iddealer'>";
                echo "<option selected value='$iddealer'>$dealer</option>";

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
                print "<input type='hidden' name='id' size='30' value='$key_id'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: red' onclick="window.location.href='auto_in_dealer.php'">Вернуться к списку автомобилей в наличии</button></td></p>
    </body>
</html>