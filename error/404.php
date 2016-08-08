<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>404</title>
    <!-- Include bootstrap and jquery maxcdn -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/bootstrap.php'); ?>
</head>
<body>
    <!-- Include navbar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/navbar.php'); ?>
    
    <div class="container cust-error" style="text-align: center">
        <h1>PAGE NOT FOUND</h1>
    </div>
    
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/footer.php'); ?>
</body>
</html>