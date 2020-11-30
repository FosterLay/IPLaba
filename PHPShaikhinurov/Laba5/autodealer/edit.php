<html>
    <head> <title> Редактирование данных о магазине </title> </head>
    <body>
        <form action='save_edit.php' method='get'>
            <?php
                $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
                if ($mysqli->connect_errno) {
                    echo "Не удалось подключиться к БД";
                }

                $id = $_GET['id'];

                $result = $mysqli->query("SELECT name, mail FROM autodealer WHERE id='$id'");

                if ($result){
                    while ($st = $result->fetch_array()) {
                        $name = $st['name'];
                        $mail = $st['mail'];
                    }
                }

                print "Название: <input name='name' size='50' type='text' value='$name'>";
                print "<br>Адрес: <input name='mail' size='20' type='text' value='$mail'>";
                print "<input type='hidden' name='id' size='30' value='$id'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: green' onclick="window.location.href='autodealer.php'">Вернуться к списку автодилеров</button></td></p>
    </body>
</html>