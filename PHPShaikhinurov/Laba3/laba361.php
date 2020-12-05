<HTML>
<BODY>
  <H1> Задание 15: Дана строка-предложение. Зашифровать ее, поместив вначале все символы, расположенные на четных местах, а затем, в обратном порядке, все символы, расположенные на нечетных местах (например, строка "Программа" превратится в "ргамамроП") </H1>
    <FORM action="<?php print $PHP_SELF ?>" method="post">
    <p>Исходное слово: <INPUT type="text" name="predl1" maxlength="50"></p>
    <p><INPUT type="submit" name="check" value="Проверить"></p>
    </FORM>

<?php
    function str_split_utf8($str) {
        $split = 1;
        $array = array();
        for ($i=0; $i < strlen($str); ){
            $value = ord($str[$i]);
            if($value > 127){
            if ($value >= 192 && $value <= 223)      $split = 2;
            elseif ($value >= 224 && $value <= 239)  $split = 3;
            elseif ($value >= 240 && $value <= 247)  $split = 4;
        } else $split = 1;
        $key = NULL;
        for ( $j = 0; $j < $split; $j++, $i++ ) $key .= $str[$i];
        array_push( $array, $key );
    }
    return $array;
}

    if (isset($_POST["check"])){
      $predl1 = trim($_POST["predl1"]);

      $chars1 = str_split_utf8($predl1);
      $dlinachars = count($chars1);
      echo "Результат:";
    
      for ($c = 1; $c < $dlinachars; $c+=2){
        echo $chars1[$c];
      }
      if ($dlinachars % 2 <> 0){
        $dlinachars--;
      }
      for ($c = $dlinachars; $c >= 0; $c-=2){
        echo $chars1[$c];
      }
    }
 ?>
</BODY>
</HTML>