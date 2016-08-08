<?php
    session_start();
    try{
        include($_SERVER['DOCUMENT_ROOT'] . '/helper/dbconfig.php');
        $result = $db_conn->prepare("
            delete from kosan
        ");
        $result->execute();

        $result = $db_conn->prepare("
            vacuum
        ");
        $result->execute();

        /*$result = $db_conn->prepare("
            delete from sqlite_sequence where name = ?
        ");
        $result->execute(['kosan']);*/

        $db_conn = NULL;
        header('Location: /kosan/crud');
    }catch (PDOException $err){
        exit($err->getMessage());
    }
?>