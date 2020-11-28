<HTML>
<BODY>
<H1> Задание 4: Пользователем задается произвольный текст и два символа. В тексте заменить все вхождения первого символа на второй. </H1>
  <FORM action="<?php print $PHP_SELF ?>" method="post">
  
    <p>Изначальное предложение: <INPUT type="text" name="predl1" maxlength="50"></p>
    <p>Выбранный символ:<INPUT type="text" name="symvol1" maxlength="2"></p>
    <p>Желаемый символ:<INPUT type="text" name="symvol2" maxlength="2"></p>
    <p><INPUT type="submit" name="check" value="Заменить"></p>
    </FORM>
    <?php
      if (isset($_POST["check"])){
        $predl1 = trim($_POST["predl1"]);
        $symvol1 = trim($_POST["symvol1"]);
        $symvol2 = trim($_POST["symvol2"]);
        $predl1 = str_replace($symvol1, $symvol2, $predl1);

        
        echo ("<p>". "Итоговое предложение: $predl1");
      }
  ?>

<HTML>
<BODY>