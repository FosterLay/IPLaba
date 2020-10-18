<?php
 $treug=array(1,2,3,4,5,6,7,8,9,10);
 $kvd=array(1,2,3,4,5,6,7,8,9,10);
 $rez=array();
 $rez1=array();
echo'massiv treugolnuh chisel: ';
foreach($treug as $k=>$n) {
    $treug[$k]=$n*($n+1)/2;
    echo $treug[$k] .'&nbsp;&nbsp;';
   }
    echo '<br>.<br>';
 echo'Massiv kvadratov naturalnuh chisel: ';
 foreach($kvd as $a=>$b) {
    $kvd[$a]=$b*$b;
    echo $kvd[$a].'&nbsp;';
    }
 echo '<br>.<br>';
 echo'Massiv rezultat: ';
 $rez=array_merge($treug,$kvd);
 print_r($rez);
 echo '<br>.<br>';
 echo'Otsortirovannui massiv: ';
 sort($rez);
 reset($rez);
 while (list($key, $val) = each($rez)) {
 echo "rez  [" . $key . "] = " . $val . "\n";
}
 echo '<br>.<br>';
 echo'Massiv s udalennum pervum elementom: ';
array_shift($rez);
print_r($rez);
 echo '<br>.<br>';
 echo'Massiv s udalennumi povtoryauwimi elementami : ';
 $rez1 = array_unique($rez);
print_r($rez1);
?>
