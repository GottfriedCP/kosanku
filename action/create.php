<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        ob_end_flush();
        ob_start();
        try{
            include($_SERVER['DOCUMENT_ROOT'] . '/helper/dbconfig.php');
            $result = $db_conn->prepare('
                insert into kosan 
                (nama, kebersihan, listrik, keamanan, ukuran, 
                    kmr_mandi, ac, jarak_ke_kampus, jarak_ke_warung, harga)
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ');
            $result->execute([
                $_POST['name'], (int) $_POST['kebersihan'], (int) $_POST['listrik'], 
                (int) $_POST['keamanan'], (int) $_POST['ukuran'], (int) $_POST['kmr_mandi'], 
                (int) $_POST['ac'], (int) $_POST['jarak_ke_kampus'], (int) $_POST['jarak_ke_warung'], 
                (int) $_POST['harga']
            ]);

        }catch (PDOException $err)  {
            exit($err->getMessage());
        }
        $_SESSION['insert_success'] = true;
        $_SESSION['nama_kosan_st'] = $_POST['name'];
        $db_conn = NULL;
        header('Location: /kosan/crud');
        //ob_end_flush();
    }
?>