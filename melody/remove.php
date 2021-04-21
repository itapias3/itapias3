<?php
require 'config.php';

if(isset($POST['removeuser'])) {
    $errMsg = '';
    $usernameid = $_POST['usernameid'];

    if($usernameid =='')
    $errMsg = 'emter username/ id to remove';

    if($errMsg=='') {
        try{
            $stmt = $connect->prepare('DELETE FROM usuario WHERE id =:id OR username = :username LIMIT 1');
            $stmt->execute(array(
                ':id' => $usernameid,
                ':usuario'=> $usernameid
            ));

            $errMsg ='usuario'. $usernameid.'eliminado.';
        }
        catch(PDOException $e){
            $errMsg = $e -> getMessage();

        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div align="center">
        <div style="border: solid 1 px #006D9c" align="left">
        <?phpif(isset($errMsg)){
            acho '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
        ?>
        <div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Elimina un usuario</b></div>
        <div style="margin: 15px">
        <form action=""  method="post">0
            ingrese el usuario <br>
            <input type ="text" name="usernameid" autocomplete="off" class="box" /><br/><br/>
</body>
</html>
