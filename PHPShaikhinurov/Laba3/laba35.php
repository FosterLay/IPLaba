<HTML>
<BODY>
    <H1> Тест "Ваш характер" </H1>
    <FORM action="<?php print $PHP_SELF?>" method="post">
    Введите ваше ФИО:
    <INPUT type="text" name="name" maxlength="40">

    <?php
    require_once "./script35.php";
    build_radio();
    ?>

    <p><INPUT type="submit" name="check" value="Проверка"></p>
    </FORM>

    <?php
    $yes = [3, 9, 10, 13, 14, 19];
    $no = [1, 2, 4, 5, 6, 7, 8, 11, 12, 15, 16, 17, 18, 20];
    $result = 0;

     if (isset($_POST["check"])){
     $name = trim($_POST["name"]);
     if (!empty($name)){
     for ($c = 0; $c < count($yes); $c++){
     if ($_POST["$yes[$c]"] == "true"){
     $result++;
     }
     }
     for ($c = 0; $c < count($no); $c++){
     if ($_POST["$no[$c]"] == "false"){
                            $result++;
                        }
     }
     echo "<p> $name, Результаты теста: $result </p>";
     if ($result > 15){
     echo "<p> У Вас покладистый характер </p>";
     }
     else if ($result > 8){
     echo "<p> Вы не лишены недостатков, но с вами можно ладить </p>";
     }
     else{
     echo "<p> Вашим друзьям можно посочувствовать </p>";
     }
    }
   }
 ?>
</BODY>
</HTML>