<html>
    <head> <title> Добавление нового автомобиля в наличии </title> </head>
    <body>
        <H2>Добавление нового автомобиля в наличии</H2>
        <form action="save_new.php" method="get">
        <?php
         $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
         if ($mysqli->connect_errno) {
                 echo "Не удалось подключиться к БД";
             }
        $result = $mysqli->query("SELECT id, Brand, models FROM automobiles");
                echo "<br>Автомобиль: <select name='idauto'>";
                

                if ($result){
                    $row = $result->fetch_array();
                    $id = $row['id'];
                        $Brand = $row['Brand'];
                        $models = $row['models'];
                    echo "<option selected value='$id'>$Brand - $models</option>";
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $Brand = $row['Brand'];
                        $models = $row['models'];

                        echo "<option value='$id'>$Brand - $models</option>";
                    }
                }
                echo "</select>";

                $result = $mysqli->query("SELECT id, name FROM autodealer ");
                echo "<br>Дилер: <select name='iddealer'>";
                if ($result){
                    $row = $result->fetch_array();
                    $id = $row['id'];
                        $name = $row['name'];
                        echo "<option selected value='$id'>$name</option>";
                        while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";
        ?>
            <br>Стоимость: <input name="price" size="30" type="text">
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <p><button style='color: green' onclick="window.location.href='auto_in_dealer.php'">Вернуться к списку автомобилей в наличии</button></td></p>
    </body>
</html>