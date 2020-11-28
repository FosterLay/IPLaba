<HTML>
<BODY>
<H1> Задание 6: Подсчитать число различных гласных, входящих в данный текст. </H1>
  <FORM action="<?php print $PHP_SELF ?>" method="post">
  
    <p>Изначальное предложение: <INPUT type="text" name="predl1" maxlength="50"></p>
    <p><INPUT type="submit" name="check" value="Проверить"></p>
    </FORM>
    <?php
      if (isset($_POST["check"])){
        $predl1 = trim($_POST["predl1"]);

        $zvuki = array("А", "а", "Е", "е", "Ё", "ё", "И", "и", "О", "о", "У", "у", "Ы", "ы", "Э", "э", "Ю", "ю", "Я", "я");
        $offset = 0;
        $counter = 0;
        
        for ($i=0;$i<=count($zvuki);$i++) {
          while (($offset = strpos($predl1, $zvuki[$i], $offset))!== false) {
            $offset = $offset + strlen($zvuki[$i]);
            $counter++;
          }
        }
        echo ("<p>". "Количество гласных в введенном тексте: $counter");
      }
  ?>

<HTML>
<BODY>
