<?php
    $mysqli = new mysqli("localhost", "f0526324_serials", "0000", "f0526324_serials");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $get_s = $_GET['get_s'];
    $need_to_get = $_GET['need_to_get'];

    $result = $mysqli->query(
        "SELECT  id_s, name, des, pic
        FROM serials ORDER BY id_s DESC LIMIT $get_s, $need_to_get
        "
    );

    if ($result){
        while ($row = $result->fetch_array()){
            $id_s = $row['id_s'];
            $name = $row['name'];
            $des = $row['des'];
            $pic = $row['pic'];

            echo "<p>";
            echo "<h1>$name</h1>";
            echo "<img width='270px' height='385px' class='center-img' src='$pic'>";
            echo "<p>";
            echo "</img>";
            echo $des;
            echo "</p>";
        }
    }
?>