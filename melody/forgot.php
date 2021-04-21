<?php
require 'config.php';

if(isset($_POST['forgotpass'])) {
    $errMsg='';

    $secretpin = $_POST['secretpin'];

    if(empty($secretpin))
    $errMsg = 'porfavor ingrese su pin secreto para recordar su contraseña.';

    if($errMsg == '') {
        try{
            $stmt = $connect->prepare('SELECT contraseña, secretpin FROM usuario WHERE secretpin = :secretpin');
            $stmt->execute(array(
                ':secretpin' => $secretpin 
            ));
            $data = $stmt-> fetch(PDO::FETCH_ASSOC);
            if($secretpin == $data['secretpin']){
                $viewpass = 'su contraseña es: '. $data['contraseña'] . '<br><a href="login.php">Ingrese ahora!!</a>';

            }
           else {
               $errMsg = 'no coincide el pin secreto';
            
           }
        }
        catch(PDOException $e){
            $errMsg = $e ->getMessage();
        }
    }
}
?>
<html>
    <head>
        <title>olvido su contraseña</title>
    </head>
    <link rel="stylesheet" href="style.css">
    <body>
        <div style ="margin: 15px">
        <div align="center">
            <div style ="border: solid 1px #079B96;" align="center">
            <h1>Recuperar contraseña</h1>
            <div style="margin: 15 px">
            <form action="" method="post">
                <input type="text" name="secretpin" placeholder="pin secreto" autocomplete="off"
                class="box" /><br/></br>
                <input type="submit" name='forgotpass' value="validar" class='submit'/><br/>
</form>
</div>
</div>
<?php
if(isset($errMsg)) {
    echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg. '</div>';

}
?>
<?php
if(isset($viewpass)){
    echo '<div style="color:#198E35;text-align:center;font-size:17px; margin-top:5px">'.$viewpass.'</div>';
}
?>
</div>
</div>
</body>
</html>