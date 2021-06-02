<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b0ce4d11992198", "ad55ff31", "heroku_955ee9896fe710e");
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
