<p> Число е равно:
<p>
<?php
define('NUM_E', 2.71828);
echo (' Число е равно =' . (NUM_E). "<br>");
$num_e1=NUM_E;
print('$num_e1 = '.$num_e1.' - '.gettype($num_e1). "<br>");
$num_e1=NUM_E;
settype($num_e1,'string');
print('$num_e1 = '.$num_e1.' - '.gettype($num_e1). "<br>");
$num_e1=NUM_E;
settype($num_e1,'Integer');
print('$num_e1 = '.$num_e1.' - '.gettype($num_e1). "<br>");
$num_e1=NUM_E;
settype($num_e1,'boolean');
print('$num_e1 = '.$num_e1.' - '.gettype($num_e1). "<br>");
?>