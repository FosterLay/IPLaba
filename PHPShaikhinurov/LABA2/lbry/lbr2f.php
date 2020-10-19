<?php
    function print_task(){
        echo "<p> В матрице Z(n,n) каждый элемент столбца разделить на диагональный, стоящий в том же столбце.
        <p> Исходный и скорректированный массивы вывести на экран.";
    }

    function create_matrix($N){
        $a = array();

        for ($i = 0; $i < $N; $i++){
            for ($j = 0; $j < $N; $j++){
                $a[$i][$j] = rand(1, 10);
            }
        }

        return $a;
    }

	
	function raschet($a, $N){
        for ($i = 0; $i < $N; $i++){
	    $razsum = 0;
            for ($j = 0; $j < $N; $j++){
		$razsum = $a[$i][$j] - $a[$j][$i];
                $a[$i][$i] = $razsum;
            }
        }

        return $a;
    }

    function print_matrix($a, $N){
        for ($i = 0; $i < $N; $i++){
            echo "<p>| ";
            for ($j = 0; $j < $N; $j++){
                echo $a[$i][$j]."  ";
            }
        }
    }
?>
