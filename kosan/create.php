<?php
    ob_start();
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
        <div class="row">
            <div class="col-xs-10 col-md-4">
                <form role="form" action="<?php echo(htmlspecialchars('/action/create')) ;?>" method="POST">
                    <h1>Masukkan data kosan</h1>
                    <div class="form-group">
                        <label for="name">Nama Kosan:</label>
                        <input type="text" name="name" id="name" maxlength="255" class="form-control" placeholder="Nama Kosan" required/>
                    </div>

                    <div class="form-group">
                        <label>Kebersihan relatif:</label>
                        <div class="col-xs-offset-1 col-md-offset-1">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="kebersihan" id="kb1" value="5" required>
                                    Bersih
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="kebersihan" id="kb2" value="3">
                                    Tidak bersih
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Daya listrik:</label>
                        <div class="col-xs-offset-1 col-md-offset-1">
                            <select name="listrik" class="form-control" style="width: 30%;" required>
                                <option value="1">900 VA</option>
                                <option value="3">1300 VA</option>
                                <option value="5">2200 VA</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Keamanan / <i>security</i>:</label>
                        <div class="col-xs-offset-1 col-md-offset-1">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="keamanan" id="sc1" value="5" required>
                                    Ada
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="keamanan" id="sc2" value="3">
                                    Tidak ada
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Perkiraan ukuran kamar (dalam m<sup>2</sup>):</label>
                        <div class="col-xs-offset-1 col-md-offset-1">
                            <select name="ukuran" class="form-control" style="width: 50%;" required>
                                <option value="1">2 x 2</option>
                                <option value="3">3 x 3</option>
                                <option value="5">Lebih dari 3 x 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kamar mandi dalam:</label>
                        <div class="col-xs-offset-1 col-md-offset-1">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="kmr_mandi" id="km1" value="5" required>
                                    Ada
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="kmr_mandi" id="km2" value="3">
                                    Tidak ada
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ada AC:</label>
                        <div class="col-xs-offset-1 col-md-offset-1">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="ac" id="ac1" value="5" required>
                                    Ada
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="ac" id="ac2" value="3">
                                    Tidak ada
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jarak kosan dengan kampus:</label>
                        <div class="col-xs-offset-1 col-md-offset-1">
                            <select name="jarak_ke_kampus" class="form-control" style="width: 70%;" required>
                                <option value="4">Kurang dari 50 meter</option>
                                <option value="3">50 - 200 meter</option>
                                <option value="2">200 - 500 meter</option>
                                <option value="1">Lebih dari 500 meter</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jarak kosan dengan warung makan / restoran:</label>
                        <div class="col-xs-offset-1 col-md-offset-1">
                            <select name="jarak_ke_warung" class="form-control" style="width: 70%;" required>
                                <option value="4">Kurang dari 50 meter</option>
                                <option value="3">50 - 100 meter</option>
                                <option value="2">100 - 300 meter</option>
                                <option value="1">Lebih dari 300 meter</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kisaran harga kamar:</label>
                        <div class="col-xs-offset-1 col-md-offset-1">
                            <select name="harga" class="form-control" style="width: 90%;" required>
                                <option value="5">Dibawah Rp 500.000,00</option>
                                <option value="3">Rp 500.000,00 sampai dengan Rp 1.000.000,00</option>
                                <option value="1">Diatas Rp 1.000.000,00</option>
                            </select>
                        </div>
                    </div>

                    <input type="submit" value="Daftar" class="btn btn-primary btn-lg" />
                </form>
            </div>
        </div>
    </div>
    
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/footer.php'); ?>
</body>
</html>