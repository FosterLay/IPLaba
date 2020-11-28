<HTML>
    <BODY>
    <meta charset = "UTF-8">
        <H1> Задача 3.4: Проверка имени пользователя: </H1>
        <FORM action="<?php print $PHP_SELF ?>" method="post">
            Введите логин пользователя:
            <INPUT type="text" name="userName" maxlength="50">
            <INPUT type="submit" name="obr" value="Проверка">
        </FORM>

        <?php
            $a = ["Фостер", "Сиристон", "КрокоДева", "Петушок"];

            $passed = false;
            if (isset($_POST["obr"])){
                $user_name = trim($_POST["userName"]);

                for ($c = 0; $c < count($a); $c++){
                    if ($user_name == $a[$c]){
                        echo "Проверка пройдена , $a[$c]";
                        $passed = true;
                        break;
                    }
                }

                if (!$passed){
                    echo "Проверка не пройдена, Импостер";
                }
            }
        ?>
    </BODY>
</HTML>
