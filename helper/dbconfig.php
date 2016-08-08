<?php
    // Filename
    $db_file = $_SERVER['DOCUMENT_ROOT'] . '/database/base.db';
    
    // SQLite database
    $db_conn = new PDO('sqlite:' . $db_file);
    
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>