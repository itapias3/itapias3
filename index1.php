<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="bg-dark d-flex justify-content-center">
    <div class="col-4">
        <form action="bar.php" method="POST" class="container m-3 bg-secondary p-5">
            <h1 class="text-white">tienda de instrumentos</h1>
            <div class="row">
            <div class="row">
                <label for="name">nombre</label>
                <input type="text" name="nombre">
            </div>
                
                <label for="instrumento">instrumento</label>
                <select name="instrumento" id="instrumento">
                <option value="vacio">seleccione</option>
                    <option value="guitarra">Guitarra</option>
                    <option value="violin">Violin</option>
                    <option value="bajo">Bajo</option>
                    <option value="flauta">Flauta</option>
                    <option value="trompeta">Trompeta</option>
                </select>
            </div>
            <div class="row">
                
                <label for="cliente">tipo de cliente</label>
                <select name="cliente" id="cliente">
                <option value="vacio">seleccione</option>
                    <option value="uno">1</option>
                    <option value="dos">2</option>
                    <option value="tres">3</option>
                    
                </select>
            </div>
         
            <button type="submit" name="comprar" class="mt-2 col-4 bg-info">Comprar</button>
        </form>
      </div>
   
    
        <?php
          $guitarra = 140.000;
          $violin = 353.000;
          $bajo = 500.000;
          $flauta = 30.000;
          $trompeta= 495.000;
          $uno = 0.05;
          $dos= 0.20;
          $tres= 0.30;

        if (isset($_POST['comprar'])) {
            $nombre = $_REQUEST['nombre'];
            $instrumento = $_REQUEST['instrumento'];
            $cliente = $_REQUEST['cliente'];
            $message = "";

            if ($instrumento == "guitarra"){
                if ($cliente == 1){ $total= $guitarra - ( $guitarra * $uno);
                    $message ="gracias ".$nombre ."el total a pagar por la ".$instrumento . "es " . $total ;
                elseif ($cliente == 2) $total = $guitarra - ($guitarra * $dos);
                    $message ="gracias ".$nombre ."el total a pagar por la ".$instrumento . "es " .  $total  ; 
                elseif ($cliente == 3) $total= $guitarra -  ($guitarra * $tres);
                    $message ="gracias ". $nombre ."el total a pagar por la ".$instrumento . "es " . $total ;
                }}
            else if ($instrumento == violin){
                if ($cliente == 1){ $total= $violin - ( $violin * $uno);
                    $message ="gracias ".$nombre ."el total a pagar por la ".$instrumento + "es " . $total ;
                elseif ($cliente == 2) $total= $violin - ($violin * $dos);
                    $message ="gracias ".$nombre ."el total a pagar por la ".$instrumento + "es " .  $total  ; 
                elseif ($cliente == 3) $total= $violin - ($violin * $tres);
                    $message ="gracias ". $nombre ."el total a pagar por la ".$instrumento + "es " . $total ;
                }}
            else if ($instrumento == bajo){
                if ($cliente == 1){ $total= $bajo - ( $bajo * $uno);
                    $message ="gracias ".$nombre ."el total a pagar por la ".$instrumento . "es " . $total ;
                elseif ($cliente == 2) $total= $bajo - ($bajo * $dos);
                    $message ="gracias ".$nombre ."el total a pagar por la "+$instrumento . "es " .  $total  ; 
                elseif ($cliente == 3) $total= $bajo - ($bajo * $tres);
                    $message ="gracias ". $nombre ."el total a pagar por la ".$instrumento . "es " . $total ;
                }}
            else if ($instrumento == flauta){
                if ($cliente == 1){ $total= $flauta- ( $flauta * $uno);
                    $message ="gracias ".$nombre ."el total a pagar por la ".$instrumento . "es " . $total ;
                elseif ($cliente == 2) $total= $flauta - ($flauta * $dos);
                    $message ="gracias ".$nombre ."el total a pagar por la ".$instrumento . "es " .  $total  ; 
                elseif ($cliente == 3) $total= $flauta - ($flauta * $tres);
                    $message ="gracias ". $nombre ."el total a pagar por la ".$instrumento . "es " . $total; 
                }}
            else if ($instrumento == trompeta){
                if ($cliente == 1){ $total= $trompeta - ( $trompeta* $uno);
                    $message ="gracias".$nombre ."el total a pagar por la ".$instrumento . "es " . $total ;
                elseif ($cliente == 2) $total= $trompeta - ($trompeta * $dos);
                    $message ="gracias ".$nombre ."el total a pagar por la ".$instrumento . "es " .  $total  ; 
                elseif ($cliente == 3) $total= $trompeta - ($trompeta * $tres);
                    $message ="gracias ".$nombre ."el total a pagar por la ".$instrumento . "es " . $total ;
                }}


                }else{$message = "ese instrumento no esta en existencia";};

            
           
        
    ?>
   
    
</body>


</html>