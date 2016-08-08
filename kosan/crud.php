<?php
    session_start();
    if (empty($_SESSION['user']) || !$_SESSION['user']['admin']){
        //header('Location: /');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>KOSANKU - Kosan</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/bootstrap.php'); ?>
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/navbar.php'); ?>

    <div class="container" style="padding-top: 5%;">
        <?php
            if (isset($_SESSION['insert_success']) && $_SESSION['insert_success']){
                echo("<p style=\"color:green;\">" . "Kosan " . $_SESSION['nama_kosan_st'] . " berhasil ditambahkan" . "</p>");
                unset($_SESSION['insert_success']);
            }
        ?>

        <span>
            <a href="/kosan/create" class="btn btn-primary" role="button">Tambah kosan</a>
            <a href="/kosan/calculate" class="btn btn-primary" role="button">Selesai dan lihat hasil</a>
            <a class="btn btn-danger" role="button" onclick="document.getElementById('confirm_delete').style.display='block'">RESET</a>
        </span>

        <div class="container" id="confirm_delete" style="text-align: center; display: none;">
            <p>Hapus semua data?</p>
            <span>
                <a href="/kosan/delete" class="btn btn-danger" role="button">HAPUS</a>
                <a class="btn btn-default" role="button" onclick="document.getElementById('confirm_delete').style.display='none'">Kembali</a>
            </span>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <!--<caption>Klik pada Id untuk mengubah data</caption>-->
                <thead>
                    <tr>
                        <!--<th>Id</th>-->
                        <th>Nama Kosan</th>
                        <th>Kebersihan</th>
                        <th>Listrik</th>
                        <th>Keamanan</th>
                        <th>Ukuran</th>
                        <th>Kamar mandi</th>
                        <th>AC</th>
                        <th>Jarak ke kampus</th>
                        <th>Jarak ke warung</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try{
                            include($_SERVER['DOCUMENT_ROOT'] . '/helper/dbconfig.php');
                            $result = $db_conn->prepare("
                                select 
                                    id, nama, kebersihan, listrik, keamanan, ukuran, 
                                    kmr_mandi, ac, jarak_ke_kampus, jarak_ke_warung, harga 
                                from kosan
                            ");
                            $result->execute();
                        }catch (PDOException $err){
                            exit($err->getMessage());
                        }

                        while ($row = $result->fetch()){
                            echo(
                                '<tr>' .
                                //'<td><a href="/kosan/detail/' . $row['id'] . '">' . $row['id'] . '</a></td>' .
                                '<td>' . ucwords(strtolower($row['nama'])) . '</td>' .
                                '<td>' . $row['kebersihan']  . '</td>' .
                                '<td>' . $row['listrik'] . '</td>' .
                                '<td>' . $row['keamanan'] . '</td>' .
                                '<td>' . $row['ukuran'] . '</td>' .
                                '<td>' . $row['kmr_mandi'] . '</td>' .
                                '<td>' . $row['ac'] . '</td>' .
                                '<td>' . $row['jarak_ke_kampus'] . '</td>' .
                                '<td>' . $row['jarak_ke_warung'] . '</td>' .
                                '<td>' . $row['harga'] . '</td>' .
                                '</tr>'
                            ); 
                        }
                        $db_conn = NULL;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/footer.php'); ?>
</body>
</html>