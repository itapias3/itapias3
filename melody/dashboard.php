<?php
require 'config.php';
if(empty($_SESSION['name']))
header('location:inicio.php');
?>
<html>
<head>
    <title>Dashboard </title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <div style="margin: 10px">
    <div align="center">
        <?php 
        if(isset($errMsg)){
            echo'<div style="color:#FF0000; text-align: center ;font-size:17px;">'.$errMsg.'</div>';
        }
        ?>
        <div style="border: solid 1px #079B96" align="center">

        <div style="background-color:#006D9C; color:#FFFFFF; padding:10px;">
        <b><?php echo $_SESSION['nombre'];?><br>
        <div style="margin:10px">
        bienvenido<?echo$_SESSION['nombre'];?><br>
        <a href="update.php">actualizar</a><br>
        <a href="logout.php">salir</a>
    
        </div>
        </div>
        </div>
        </div>
    </body>
    </html>