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

    <div class="jumbotron">
        <div class="container">
            <h1>Temukan kosan idaman</h1>
            <p>Masukkan data kosan yang Anda kumpulkan<br>Dapatkan alternatif terbaik berdasarkan algoritma kami</p>
            <p><a class="btn btn-primary btn-lg" role="button" href="/kosan/crud">Coba sekarang >></a></p>
        </div>
    </div>

    <div class="container" style="text-align: center;">
        <h2>Tentang kami</h2>
        <p>
        Aplikasi web penunjang keputusan dengan metode Weighted Product ini 
        dirancang oleh Achmad Taufan, Gottfried Prasetyadi, dan Rexzy Tarnando
        untuk memenuhi tugas mata kuliah Sistem Penunjang Keputusan
        </p>
    </div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/footer.php'); ?>
</body>
</html>