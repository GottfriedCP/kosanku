<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        ob_end_flush();
        ob_start();
        try{
            include($_SERVER['DOCUMENT_ROOT'] . '/helper/dbconfig.php');
            $result = $db_conn->prepare('
                insert into bobot 
                (kebersihan, listrik, keamanan, ukuran, 
                    kmr_mandi, ac, jarak_ke_kampus, jarak_ke_warung, harga)
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ');
            $result->execute([
                (float) $_POST['kebersihan'], (float) $_POST['listrik'], 
                (float) $_POST['keamanan'], (float) $_POST['ukuran'], (float) $_POST['kmr_mandi'], 
                (float) $_POST['ac'], (float) $_POST['jarak_ke_kampus'], (float) $_POST['jarak_ke_warung'], 
                (float) $_POST['harga']
            ]);

        }catch (PDOException $err)  {
            exit($err->getMessage());
        }
        $_SESSION['insert_bobot'] = true;
        $db_conn = NULL;
        header('Location: /admin/bobot');
        //ob_end_flush();
    }
?>