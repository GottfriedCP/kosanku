<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>KOSANKU</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/bootstrap.php'); ?>
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/navbar.php'); ?>

    <div class="container" style="padding-top: 5%;">
        <?php
            try{
                include($_SERVER['DOCUMENT_ROOT'] . '/helper/dbconfig.php');
                $result = $db_conn->prepare('
                    select keamanan, kmr_mandi, 
                        kebersihan, harga, jarak_ke_kampus, 
                        listrik, ukuran, ac, jarak_ke_warung
                    from bobot
                ');
                $result->execute();

                $row = $result->fetch();
            }catch (PDOException $err)  {
                exit($err->getMessage());
            }
        ?>

        <div class="row">
            <div class="col-xs-10 col-md-4">
                <form role="form" action="<?php echo(htmlspecialchars('/action/bobot')) ;?>" method="POST">
                    <h1>Ubah bobot</h1>
                </form>
            </div>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/footer.php'); ?>
</body>
</html>