<html>
    <head> <title> Сведения о базе данных </title> </head>
    <h2> Таблицы </h2>
    <table border = '1' >
        <tr>
            <th>Таблицы</th>
            <th>Поля</th>
            <th>Типы</th>
            <th>Null</th>
            <th>Ключи</th>
            <th>По умочанию</th>
            <th>Дополнительно</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $result_tables = $mysqli->query("SHOW TABLES");

            if ($result_tables){
                while ($row = $result_tables->fetch_array()){
                    $table_name = $row[0];

                    echo "<tr> <th>$table_name</th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> </tr>";

                    $result_columns = $mysqli->query("SHOW COLUMNS FROM $table_name");

                    if ($result_columns){
                        while($row = $result_columns->fetch_assoc()){
                            $field = $row['Field'];
                            $type = $row['Type'];
                            $null = $row['Null'];
                            $key = $row['Key'];
                            $default = $row['Default'];
                            $extra = $row['Extra'];

                            echo "<tr> <th></th> <th>$field</th> <th>$type</th> <th>$null</th> <th>$key</th> <th>$default</th> <th>$extra</th> <th></th> <th></th> </tr> ";
                        }
                    }
                }
            }
        ?>
    </table>
    <p> <a href='../index.php'> Вернуться в меню </a> </p>
</html>