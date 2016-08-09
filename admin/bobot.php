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
                <?php
                    if (isset($_SESSION['insert_bobot']) && $_SESSION['insert_bobot']){
                        echo("<p style=\"color:green;\">" . "Bobot berhasil diubah" . "</p>");
                        unset($_SESSION['insert_bobot']);
                    }
                ?>
                <form role="form" action="<?php echo(htmlspecialchars('/action/bobot')) ;?>" method="POST" onsubmit="return checkVal()">
                    <h1>Ubah bobot</h1>
                    <div class="form-group">
                        <label for="keamanan">Bobot keamanan:</label>
                        <input type="text" name="keamanan" id="keamanan" value="<?php echo($row['keamanan']); ?>" class="form-control" style="width: 30%;" placeholder="Bobot keamanan" required/>
                    </div>
                    <div class="form-group">
                        <label for="kmr_mandi">Bobot kamar mandi:</label>
                        <input type="text" name="kmr_mandi" id="kmr_mandi" value="<?php echo($row['kmr_mandi']); ?>" class="form-control" style="width: 30%;" placeholder="Bobot kamar mandi" required/>
                    </div>
                    <div class="form-group">
                        <label for="kebersihan">Bobot kebersihan:</label>
                        <input type="text" name="kebersihan" id="kebersihan" value="<?php echo($row['kebersihan']); ?>" class="form-control" style="width: 30%;" placeholder="Bobot kebersihan" required/>
                    </div>
                    <div class="form-group">
                        <label for="harga">Bobot harga:</label>
                        <input type="text" name="harga" id="harga" value="<?php echo($row['harga']); ?>" class="form-control" style="width: 30%;" placeholder="Bobot harga" required/>
                    </div>
                    <div class="form-group">
                        <label for="jarak_ke_kampus">Bobot jarak ke kampus:</label>
                        <input type="text" name="jarak_ke_kampus" id="jarak_ke_kampus" value="<?php echo($row['jarak_ke_kampus']); ?>" class="form-control" style="width: 30%;" placeholder="Bobot jarak ke kampus" required/>
                    </div>
                    <div class="form-group">
                        <label for="listrik">Bobot listrik:</label>
                        <input type="text" name="listrik" id="listrik" value="<?php echo($row['listrik']); ?>" class="form-control" style="width: 30%;" placeholder="Bobot listrik" required/>
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Bobot ukuran kamar:</label>
                        <input type="text" name="ukuran" id="ukuran" value="<?php echo($row['ukuran']); ?>" class="form-control" style="width: 30%;" placeholder="Bobot ukuran kamar" required/>
                    </div>
                    <div class="form-group">
                        <label for="ac">Bobot AC dalam ruangan:</label>
                        <input type="text" name="ac" id="ac" value="<?php echo($row['ac']); ?>" class="form-control" style="width: 30%;" placeholder="Bobot AC" required/>
                    </div>
                    <div class="form-group">
                        <label for="jarak_ke_warung">Bobot jarak ke warung makan:</label>
                        <input type="text" name="jarak_ke_warung" id="jarak_ke_warung" value="<?php echo($row['jarak_ke_warung']); ?>" class="form-control" style="width: 30%;" placeholder="Bobot jarak ke warung makan" required/>
                    </div>

                    <input type="submit" value="Update" id="update_btn" class="btn btn-primary btn-lg" />
                </form>

                <p id="test"></p>
                <script>
                    function checkVal() {
                        var a = parseFloat(document.getElementById("keamanan").value);
                        var b = parseFloat(document.getElementById("kmr_mandi").value);
                        var c = parseFloat(document.getElementById("kebersihan").value);
                        var d = parseFloat(document.getElementById("harga").value);
                        var e = parseFloat(document.getElementById("jarak_ke_kampus").value);
                        var f = parseFloat(document.getElementById("listrik").value);
                        var g = parseFloat(document.getElementById("ukuran").value);
                        var h = parseFloat(document.getElementById("ac").value);
                        var i = parseFloat(document.getElementById("jarak_ke_warung").value);
                        var total = parseInt(a+b+c+d+e+f+g+h+i);
                        document.getElementById("test").innerHTML = total;
                        if (total == 1) {
                            return true;
                        } else {
                            alert("Total bobot tidak sama dengan 1!");
                            return false;
                        }
                    }
                </script>
            </div>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/footer.php'); ?>
</body>
</html>