<?php
    try{
        include($_SERVER['DOCUMENT_ROOT'] . '/helper/dbconfig.php');

        // Ekstraksi bobot preferensi yang telah ditentukan sistem
        $result = $db_conn->prepare('
            select
                kebersihan, listrik, keamanan, ukuran, 
                kmr_mandi, ac, jarak_ke_kampus, jarak_ke_warung, harga
            from bobot
        ');
        $result->execute();
        $column_count = $result->columnCount();
        $row = $result->fetch();

        for ($i = 0; $i < $column_count; $i++){
            $bobot[$i] = $row[$i];
            //echo ($bobot[$i] . '<br>');
        }

        // Ekstraksi nilai alternatif setiap baris
        $result = $db_conn->prepare('
            select
                kebersihan, listrik, keamanan, ukuran, 
                kmr_mandi, ac, jarak_ke_kampus, jarak_ke_warung, harga
            from kosan
        ');
        $result->execute();

        $j = 0;
        while($row = $result->fetch()){
            $s[$j] = 1;
            for ($k = 0; $k < $column_count; $k++){
                $s[$j] = $s[$j] * pow($row[$k], $bobot[$k]);
            }
            echo (
                '<tr>' .
                '<td>S<sub>' . $j . '</sub></td>' . 
                '<td>' . round($s[$j], 3) . '</td>' . 
                '</tr>'
            );
            $j++;
        }

        $sum_of_alt = array_sum($s);
        for ($l = 0; $l < count($s); $l++){
            $v[$l] = $s[$l] / $sum_of_alt;
            //echo ($v[$l] . '<br>');
        }

        // Sort the array reversed
        arsort($v);

    }catch (PDOException $err)  {
        exit($err->getMessage());
    }
    $db_conn = NULL;
    //echo('OK');
?>