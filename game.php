<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    include('tablero.php');

    if(!isset($_SESSION["tablero"])){ // si el tamaño no esta definido se envía de nuevo al form
        header("location:view.php");
        die();
    }

    /*if(isset($_SESSION['validar'])){
        echo "prueba3";
        $_SESSION['tablero'] = $_POST['length'];
        unset($_SESSION['validar']);
        echo "prueba4";
    }*/


    /*if(isset($_SESSION['tablero'])){ // Redirecciona
        $_SESSION['conf'] = true;
        header('location:http://localhost/~rah/Bridge/game.php');
    }else{
        if($_SESSION['conf'] == false) header('location:http://localhost/~rah/Bridge');
    }

    if(isset($_SESSION['tablero'])){ // rompe la sección
        $_SESSION['conf'];
        unset($_SESSION['tablero']);
        header(url);
    }*/

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/jugador.css">
    <title>Document</title>
</head>
<body>

    <div class="jugadorA">
        <?php echo "Jugador A:",$_SESSION["nombreA"],"<br>"?>
    </div>
    
    <div class="jugadorB">
        <?php echo "Jugador B:",$_SESSION["nombreB"],"<br>"?>
    </div>
  
    
    <div class="proceso">
        <?php

            // tab es objeto de clase tablero
            $tab = New tablero($_SESSION["tablero"],0);
            $tab->crearTablero();
            $tab->imprimirTablero(); 

        ?>
    </div>

    <div><a href="cerrar.php" class="juegoNuevo" >Iniciar juego nuevo</a></div>


</body>
</html>