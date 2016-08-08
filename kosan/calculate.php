<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>KOSANKU - Hasil</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/bootstrap.php'); ?>
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/navbar.php'); ?>

    <div class="container" >
        <h2>Nilai alternatif setiap kosan (S<sub>n</sub>)</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <!--<caption>Klik pada Id untuk mengubah data</caption>-->
                <thead>
                    <tr>
                        <!--<th>Id</th>-->
                        <th>S<sub>n</sub></th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/helper/gen_alt_val.php'); ?>
                </tbody>
            </table>
        </div>
        
        <h2>Nilai vektor V terurut dari nilai terbesar</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <!--<caption>Klik pada Id untuk mengubah data</caption>-->
                <thead>
                    <tr>
                        <!--<th>Id</th>-->
                        <th>V<sub>n</sub></th>
                        <th>Nilai</th>
                        <th>Nama Kosan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($v as $key => $val) {
                            try{
                                include($_SERVER['DOCUMENT_ROOT'] . '/helper/dbconfig.php');
                                $result = $db_conn->prepare('
                                    select nama from kosan
                                    where id = ?
                                ');
                                $result->execute([$key+1]);
                                $row = $result->fetch();
                            }catch (PDOException $err){
                                exit($err->getMessage());
                            }
                            echo (
                                '<tr>' .
                                '<td>V<sub>' . $key . '</sub>' . 
                                '<td>' . round($val, 3) . '</td>' .
                                '<td>' . $row['nama'] . '</td>' .
                                '</tr>'
                            );
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/footer.php'); ?>
</body>
</html>