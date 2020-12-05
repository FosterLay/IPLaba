<HTML>
<BODY>
<H2> Задание 24: Пользователем задается произвольный текст и два числовых значения a, b. 
Сделать функцию, которая будет перепечатывать заданный текст так, чтобы каждые n-предложений выводились в <Р>..<Р>, 
где n- постоянно меняющееся число от a до b. Результат показывать в html виде, чтобы было видно форматирование. </H2>
<H3>Каждое предложение должно заканчиваться точкой</H3>
  <FORM action="<?php print $PHP_SELF ?>" method="post">
    <p>Изначальное предложение: <INPUT type="text" name="predl1" maxlength="50"></p>
    <p>a: <INPUT type="text" name="a" maxlength="50"></p>
    <p>b: <INPUT type="text" name="b" maxlength="50"></p>
    <p><INPUT type="submit" name="check" value="Проверить"></p>

    </FORM>
    <?php
      if (isset($_POST["check"])){
        $predl1 = trim($_POST["predl1"]);
        $a = trim($_POST["a"]);
        $b = trim($_POST["b"]);

        $counter = 0;
        $offset = 0;
        $offsetstart = 0;
        $strlen = strlen ($predl1);
        $p = rand($a,$b);

        while(true){
          if ($p == $counter){
            $p = rand($a,$b);
            $len = $offset - $offsetstart;
            echo "<p>". substr ($predl1, $offsetstart, $len)."</p>";
            $counter=0;
            $offsetstart = $offset;
            continue;
          }
          if (($offset = strpos($predl1, ".", $offset))!== false){
            $counter++;
            $offset++;
          }
          else {
            echo "<p>". substr ($predl1, $offsetstart)."</p>";
            break;
          }
        }
      }
  ?>

<HTML>
<BODY>
