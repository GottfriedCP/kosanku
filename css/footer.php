<?php
    if ($_SERVER['REQUEST_URI'] == "/css/footer"){
        header('Location: /') ;
    }
?>

<div class="container-fluid" id="footer">
    <p>&copy <?php echo(date("Y") . " KosanKu") ?></p>
</div>