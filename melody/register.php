<?php
require 'config.php';

if(isset($_POST['register'])) {
    $errMsg = '';

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $secretpin=$_POST['secretpin'];

    if($nombre =='')
    $errMsg = 'ingrese su nombre completo';
    if($apellido =='')
    $errMsg = 'ingrese su apellido ';
    if($usuario =='')
    $errMsg = 'ingrese su usuario completo';
    if($contraseña =='')
    $errMsg = 'ingrese su contraseña ';
    if($secretpin =='')
    $errMsg = 'ingrese su pin secreto ';

    if($errMsg == ''){
        try {
            $stmt=$connect->prepare('INSERT INTO usuario (nombre, apellido, usuario, contraseña, secretpin) VALUES (:nombre, :apellido, :usuario, :contraseña, :secretpin) ');
            $stmt ->execute(array(
                ':nombre'=> $nombre,
                ':apellido'=> $apellido,
                ':usuario'=> $usuario,
                ':contraseña'=> $contraseña,
                ':secretpin'=> $secretpin

            ));
            header('location: register.php?action=joined');
            exit;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'registro exitoso!!. Ahora puede ingresar <a href="login.php">ingreso</a>';

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="body1">
    <div style= "margin:15px">
        <div aling="center">
            <div class="space2" style="border: solid 1px ; " align="center" >
            <h1>Registrate </h1>
            <div style="margin: 15px">
            <form action="" method="post">
                <input type="text" name="nombre" placeholder="nombre completo"
                value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre'] ?>"autocomplete="off"
                class="box" /></br/>
                <input type="text" name="apellido" placeholder="apellido"
                value="<?php if (isset($_POST['apellido'])) echo $_POST['apellido'] ?>"autocomplete="off"
                class="box" /></br/>
                <input type="text" name="usuario" placeholder="usuario"
                value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario'] ?>"autocomplete="off"
                class="box" /></br/>
                <input type="password" name="contraseña" placeholder="contraseña"
                value="<?php if (isset($_POST['contraseña'])) echo $_POST['contraseña'] ?>"autocomplete="off"
                class="box" /></br/>
                <input type="text" name="secretpin" placeholder="pin secreto (numeros)"
                value="<?php if (isset($_POST['secretpin'])) echo $_POST['secretpin'] ?>"autocomplete="off"
                class="box" /></br/>
                <input type="submit" name="register" value="Registrar" class='submit' /></br/>
</form>
<span class="deco"><a href ="index.html">volver al inicio</a></span><br>
<span class="deco"><a href ="login.php">Ya tengo una cuenta</a></span>
</div>
</div>
<?php
if (isset($errMsg)){
    echo'<div style="color:#FF0000; text-align:center; font-size:17px;>'.$errMsg.'</div>';

}
?>
</div>
</div>


</body>
</html>