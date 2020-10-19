<?php
    function print_task(){
        echo "<p> Для заданной целочисленной матрицы найти максимум среди сумм элементов диагоналей, параллельных главной диагонали матрицы.";
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
        $max_sum = $a[$N - 1][0];
        // Проход по нижним диагоналям
        for ($c = $N - 1; $c > 0; $c--){
            $sum = 0;
            for ($d = 0, $e = $c; $d < $N - $c; $d++, $e++){
                $sum += $a[$e][$d];
            }

            if ($sum > $max_sum){
                $max_sum = $sum;
            }
        }
        // Проход по верхним диагоналям
        for ($d = 1; $d < $N; $d++){
            $sum = 0;
            for ($c = 0, $e = $d; $c < $N - $d; $c++, $e++){
                $sum += $a[$c][$e];
            }

            if ($sum > $max_sum){
                $max_sum = $sum;
            }
        }
        return $max_sum;
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