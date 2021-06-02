<?php
    $mysqli = new mysqli("localhost", "f0526324_serials", "0000", "f0526324_serials");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $result = $mysqli->query(
        "SELECT name, email, message FROM messages"
    );

    if ($result){
        while ($row = $result->fetch_array()){
            $name = $row['name'];
            $email = $row['email'];
            $message = $row['message'];

            echo "<h3>";
            echo sprintf("%s (%s)",$name, $email);
            echo "</h3>";
            
            echo $message;
            
        }
    }
?>