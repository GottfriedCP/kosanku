<?php
    session_start();
    if (isset($_SESSION['user'])){
        header('Location: /');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>KOSANKU - Login</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/bootstrap.php'); ?>
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/navbar.php'); ?>

    <form role="form" class="form-signin" action="<?php echo(htmlspecialchars('/login')) ;?>" method="POST">
        <h2>Silakan login</h2>
        <?php
            if (isset($_SESSION['login_status'])){
                echo("<p style=\"color:red;\">" . $_SESSION["login_status"] . "</p>");
                unset($_SESSION['login_status']);
            }
        ?>
        
        <div class="form-group">
            <label for="usr" class="sr-only">Username:</label>
            <input type="text" name="username" id="usr" maxlength="40" class="form-control" placeholder="Username" required autofocus/>
            
            <label for="pwd" class="sr-only">Password:</label>
            <input type="password" name="password" id="pwd" maxlength="40" class="form-control" placeholder="Password" required/>
        </div>

        <input type="submit" value="Login" class="btn btn-primary btn-lg btn-block" />
    </form>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/css/footer.php'); ?>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        ob_start();
        try{
            include($_SERVER['DOCUMENT_ROOT'] . '/helper/dbconfig.php');
            $result = $db_conn->prepare('select id, name, password, admin from user where name = ? and password = ?');
            $result->execute([$_POST['username'], $_POST['password']]);

            $row = $result->fetch();

            $db_conn = NULL;
        }catch (PDOException $err)  {
            exit($err->getMessage());
        }

        if ($row){
            $_SESSION['user']['id'] = $row['id'];
            $_SESSION['user']['name'] = $row['name'];
            $_SESSION['user']['admin'] = $row['admin'];
            header('Location: /') ;
        }else{
            $_SESSION['login_status'] = 'Username atau password salah';
            header('Location: /login');
        }
        ob_end_flush();
    }
?>