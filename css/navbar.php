<?php
    //session_start();
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"> <img id="logo" src="/image/kosanku.png" alt="lebkita"> </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <!--
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
                -->
                <li><a href="/kosan/crud">Input data kosan</a></li>
                <?php
                    if (isset($_SESSION['user']['name']) && isset($_SESSION["user"]["id"])) {
                        /*echo ('
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin
                                <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Buat rekam medis</a></li>
                                        <li><a href="#">Inventory</a></li>
                                        <li><a href="/admin/medic/crud">Medic</a></li>
                                    </ul>
                            </li>
                        ');*/
                        if (isset($_SESSION['user']['admin']) || $_SESSION['user']['admin']){
                            echo ('
                                <li><a href="/admin/bobot">Bobot</a></li>
                            ');
                        }
                    }
                ?>
                <li><a href="/about">Tentang kami</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    if (empty($_SESSION['user'])) {
                        echo ('<li><a href="/login"> <span class="glyphicon glyphicon-log-in"></span> Login</a></li>');
                    }
                    if (isset($_SESSION['user']['name']) && isset($_SESSION["user"]["id"])) {
                        echo ('<li><a href=""> <span class="glyphicon glyphicon-user"></span> ' . $_SESSION["user"]["name"] . '</a></li>');
                        echo ('<li><a href="/logout"> <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>');
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>