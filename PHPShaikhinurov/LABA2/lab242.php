<p> Вариант 8
<p> 
<?php
    $N = rand(1,10); // Размер массива

    echo "Изначальный массив: ";
    $a[0] = rand(0,10);
    echo $a[0];
    for ($c = 1; $c < $N; $c++){
        $a[] = rand(-10,10);
        echo ", ".$a[$c];
    }
$ch=0;
$fk=0;
for ($c = 0; $c < $N-1; $c++){
   $k=0;
     for ($d = $c+1; $d < $N; $d++){
	if ($a[$c] == $a[$d])
{
	$k++;
	           }	
	       }
       if ($fk < $k){
	$ch = $a[$c];
	$fk = $k;
        }      
    }
echo "<p>Повторяющеесе число: $ch";
echo "<p>Кол-во повторений: $fk";
?>	