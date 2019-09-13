<?php
    include('tablero.php');
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $tab = New tablero($_SESSION["tamano"],0,$_SESSION["turno"]);

    if(!isset($_SESSION["tamano"])){ // si el tamaño no esta definido se envía de nuevo al form
        header("location:index.php");    // aunque en realidad ésto está de más
        die();
    }
    if(!isset($_SESSION['jugar'])){
        $tab->crearTablero();
        $_SESSION['jugar'] = true;
        $_SESSION['turnoB'] = 1;
        $_SESSION['turnoA'] = 0;
    }else{

    }

    /*if(!isset($_SESSION["turno"])){
        $_SESSION["turno"]=1; // comienza el jugador B
    }
    else{
        //$t = $_SESSION["turno"];
    }

    if( isset($_SESSION["tablero"]) ){
        $tab = $_SESSION["tablero"];        
        //echo "Existe tablero";
    }
    else{
        //echo "No existe tablero";

    } */
   
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/jugador.css">
    <title>Bridge</title>
</head>
<body>

    <script type="text/javascript">
    /*function mover(i,j,turno)
    {
       document.form.fila.value=i;
       document.form.columna.value=j;
       document.form.turno.value=turno;
       document.form.submit();
    }*/
    </script>

    <div class="container">
            <?php
                if($_SESSION['jugar'] == true) $tab->imprimirTablero();
            // tab es objeto de clase tablero
            //$tab = New tablero($_SESSION["tablero"],0,$_SESSION["turno"]);
            //$tab->imprimirTablero();

            //$_SESSION["turno"] = $tab->jugada($_SESSION["turno"],$_POST["fila"],$_POST["columna"]);

            //$_SESSION["turno"] = $t;
            //echo "turnooooo:",$t;

            ///$tab->imprimirTablero();

            //echo "turno:",$_SESSION["turno"];
            /*for ($i=0; $i <$_SESSION["tamano"] ; $i++) {
                for ($j=0; $j <$_SESSION["tamano"] ; $j++) {
                    $_SESSION["tableroAux"][$i][$j] = $tab->m[$i][$j];
                }
            }*/

            //$_SESSION["tablero"] = $tab;

            ?>
        <div class="wrapper">
            <div class="jugador jugador-<?php echo $_SESSION['turnoA']?>">Jugador: <?php echo $_SESSION["nombreA"],"<br>"?></div>
            <div class="jugador jugador-<?php echo $_SESSION['turnoB']?>">Jugador: <?php echo $_SESSION["nombreB"],"<br>"?></div>
            <a href="cerrar.php" class="btn btn-prymary" >Nuevo Juego</a>
        </div>
    </div>
    <!--
    <form name="form" action="" method="POST">
        <input name="fila" type="hidden" value="">
        <input name="columna" type="hidden" value="">
        <input name="turno" type="hidden" value="">
    </form>
    -->
</body>
</html>