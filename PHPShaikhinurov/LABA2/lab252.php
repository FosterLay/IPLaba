<p> Вариант 8
<p> 
<?php
    function F($u, $t){
        if ($t>=0){
            if ($u>=0){
		return $u / $t - $t * $t * $u;
           }
	    else{
		return $u + $t * $t / $u;
	   }
       }
        else{
	  if ($u>=0){
		return $u - $t;
           }
	    else{
		return $t + 3 * $u / $u * $t;
	   } 
}
    }

    $a = rand(1, 10);
    $b = rand(1, 10);

    echo "<p> Аргумент A = ".$a;
    echo "<p> Аргумент B = ".$b;

    $z = F($a + 1 / $b, $b * $b * $b * $b * $b * $b * $b * $b / $a * $a * $a * $a * $a * $a) + F(bcpow("$a", '3') / bcpow("$a", '4') + bcpow("$b", '5') / bcpow("$b", '6'), $b - $a);

    echo "<p> Результат = ".$z;
?>