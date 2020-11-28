<html>
    <head> <title> Редактирование данных о автомобиле </title> </head>
    <body>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $id = $_GET['id'];

            $result = $mysqli->query("SELECT Brand, models, date_release, transmission, release_amount, price FROM automobiles WHERE id='$id'");

            if ($result){
                while ($st = $result->fetch_array()) {
                    $Brand = $st['Brand'];
                    $models = $st['models'];
                    $date_release = $st['date_release'];
                    $transmission = $st['transmission'];
                    $release_amount = $st['release_amount'];
                    $price = $st['price'];
                }
            }

            print "<form action='save_edit.php' metod='get'>";
            print "Марка: <input name='new_Brand' size='50' type='text' value='$Brand'>";
            print "<br>Модель: <input name='models' size='20' type='text' value='$models'>";
            print "<br>Год выпуска: <input name='date_release' size='20' type='date' value='$date_release'>";
            print "<br>Трансмиссия: <input name='transmission' size='30' type='text' value='$transmission'>";
            print "<br>Объём выпуска: <input type='text' name='release_amount' size='20' value='$release_amount'>";
            print "<br>Стоимость: <input type='text' name='price' size='20' value='$price'>";
            print "<input type='hidden' name='id' size='30' value='$id'>";
        ?>
        <input type='submit' name='save' value='Сохранить'>
        </form>
        <p><a href='index.php'> Вернуться к списку автомобилей </a>
    </body>
</html>