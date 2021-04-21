<?php
require 'config.php';

if (isset($_POST['login'])) {
    $errMSg ='';

$usuario = $_POST{'usuario'};
$contraseña = $_POST{'contraseña'};

if($usuario == '')
$errMsg = 'Ingrese un usuario';
if($contraseña == '')
$errMsg = 'Ingrese una contraseña';

if($errMsg == ''){
    try {
        $stmt = $connect->prepare('SELECT nombre, apellido, usuario, contraseña, secretpin FROM usuario WHERE USUARIO = :usuario');
        $stmt->execute(array(
            ':usuario'=>$usuario
            
        ));
        $data = $stmt ->fetch(PDO::FETCH_ASSOC);

        if ($data == false){
            $errMsg = "usuario $usuario no encontrado.";
        }
        else {
            if($contraseña == $data['contraseña']) {
                $_SESSION['nombre'] = $data ['nombre'];
                $_SESSION['apellido'] = $data ['apellido'];
                $_SESSION['usuario'] = $data ['usuario'];
                $_SESSION['contraseña'] = $data ['contraseña'];
                $_SESSION['secretpin'] = $data ['secretpin'];

                header('location: dashboard.php');
                exit;
            }
            else
            $errMsg = 'contraseña incorrecta.';
            }
        }
            catch(PDOException $e) {
                $errMsg = $e->getMessage();
        }
    }

}
?>

<html lang="es">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
</head>
<body class="body1">
<div style="margin: 15px">
<div align="center">
<div class="space" style="border: solid 1px #FF0000;" align="center">
  
            <h1><strong>Ingresar</strong></h1>
             
            <form action="" method="post">
                <input type="text" name="usuario" placeholder="usuario"
                velue="<?php if (isset ($_POST['usuario'])) echo $_POST['usuario'] ?>" autocomplete="off"
                class="box" /> <br/><br/>
            <input type="password" name="contraseña" placeholder="contraseña"
            value="<?php if (isset ($_POST['contraseña'])) echo $_POST['contraseña'] ?>"autocomplete="off"
            class="box"/> <br/><br/>
            <input type="submit" name='login' value="Ingresar" class='submit' /><br/>
        </form>

        <span class="deco"> <a href="forgot.php">olvido la contraseña</a></span><br>
        <span class="deco"> <a href="index.html">volver al inicio</a></span><br>
        <span class="deco"> <a href="register.php">Registrate</a></span>
</div>

<?php 
if (isset($errMsg)){
    echo '<div style="color:#FF0000;text-align;center;font-size:17px;">'.$errMsg.'</div>';
}
?>
</div>
</div>
</body>
</html>
