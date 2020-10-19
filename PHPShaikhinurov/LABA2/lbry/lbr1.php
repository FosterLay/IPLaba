<?php
    function print_task(){
        echo "<p> В матрице Z(n,n) каждый элемент столбца разделить на диагональный, стоящий в том же столбце.
        <p> Исходный и скорректированный массивы вывести на экран.";
    }

    function create_matrix($N){
        $a = array();

        for ($c = 0; $c < $N; $c++){
            for ($d = 0; $d < $N; $d++){
                $a[$c][$d] = rand(-10, 10);
            }
        }

        return $a;
    }

    function correct($a, $N){
        for ($c = 0; $c < $N; $c++){
            $dia = $a[$c][$c];
            for ($d = 0; $d < $N; $d++){
                $a[$c][$d] /= $dia;
            }
        }

        return $a;
    }

    function print_matrix($a, $N){
        for ($c = 0; $c < $N; $c++){
            echo "<p>| ";
            for ($d = 0; $d < $N; $d++){
                echo $a[$c][$d]." | ";
            }
        }
    }
?>