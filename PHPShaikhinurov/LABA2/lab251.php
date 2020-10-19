<p> Вариант 1
<p> 
<?php
    function F($u, $t){
        if ($u > 0 && $t > 0){
            return $u * $u + $t;
        }
        else if($u <= 0 && $t <= 0){
            return $u + $t * $t;
        }
        else{
            return $u + $t;
        }
    }

    $a = rand(-10, 10);
    $b = rand(-10, 10);

    echo "<p> Аргумент A = ".$a;
    echo "<p> Аргумент B = ".$b;

    $z = F($a - $b, $b * $b - $a) + F($a * $a * $b, $b * $b);

    echo "<p> Результат = ".$z;
?>