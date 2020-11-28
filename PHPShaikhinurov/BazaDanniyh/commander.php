<html>
    <head> <title> Коммандер для базы данных </title> </head>

    <body>
        <form action="<?php print $PHP_SELF ?>" method="post">
            Выполнить команду: 
            <textarea name="command" rows="8" cols="64" width="512"></textarea>
            <input type="submit" name="send" value="Выполнить">
        </form>

        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
            if (isset($_POST["send"])){
                $command = trim($_POST["command"]);
                if (!empty($command)){
                    $result = $mysqli->query("$command");
                    if (!$result){
                        echo "Не удалось выполнить комманду: (" . $mysqli->errno . ") " . $mysqli->error;
                    }
                    else{
                        echo "Команда выполнена";
                    }
                }
            }
        ?>
    </body>
    <p> <a href='../index.php'> Вернуться в меню </a> </p>
</html>