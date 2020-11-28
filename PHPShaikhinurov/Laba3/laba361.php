<HTML>
<BODY>
  <H1> Задание 2: Проверить, можно ли из букв, входящих в слово А, составить слово В. </H1>
    <FORM action="<?php print $PHP_SELF ?>" method="post">
    <p>Исходное слово: <INPUT type="text" name="slovo1" maxlength="50"></p>
    <p>Требуемое слово: <INPUT type="text" name="slovo2" maxlength="50"></p>
    <p><INPUT type="submit" name="check" value="Проверить"></p>
    </FORM>

<?php
    if (isset($_POST["check"])){
    $slovo1 = trim($_POST["slovo1"]);
    $slovo2 = trim($_POST["slovo2"]);

    $chars1 = str_split($slovo1);
    $len = strlen($slovo2);

    $passed = 0;

    for ($c = 0; $c < count($chars1); $c++){
    if (stripos($slovo2,$chars1[$c]) === false){
    break;
           }
           $passed++;
           }

        if ($passed >= $len){
        echo "Можно составить";
         }
         else{
          echo "Нельзя составить";
           }
         }
 ?>
</BODY>
</HTML>