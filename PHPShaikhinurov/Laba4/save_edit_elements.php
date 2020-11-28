<html>
    <body>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
            $id = $_GET['id'];
            $Brand = $_GET['Brand'];
            $models = $_GET['models'];
            $date_release = $_GET['date_release'];
            $transmission = $_GET['transmission'];
            $release_amount = $_GET['release_amount'];
            $price = $_GET['price'];

            $zapros="UPDATE automobiles SET Brand='$Brand',
            models='$models', date_release='$date_release',
            transmission='$transmission', release_amount ='$release_amount',
            price ='$price' WHERE id='$id'");

            $result = $mysqli->query($zapros);

            if ($result) {
                echo 'Все сохранено.';
            }
            else {
                echo 'Ошибка сохранения.';
            }
        ?>
        <a href="index.php"> Вернуться к списку автомобилей</a>
    </body>
</html>