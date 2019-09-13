<?php
    include('tablero.php');
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    

    if(!isset($_SESSION["tamano"])){ // si el tamaño no esta definido se envía de nuevo al form
        header("location:view.php");    // aunque en realidad ésto está de más
        die();
    }

    if(!isset($_SESSION["turno"])){
        $_SESSION["turno"]=1; // comienza el jugador B
    }

    if( isset($_SESSION["tablero"]) ){
        $tab = $_SESSION["tablero"];        
        //echo "Existe tablero";
    }
    else{
        //echo "No existe tablero";
        $tab = New tablero($_SESSION["tamano"],0,$_SESSION["turno"]);
    } 
   
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

    <script type="text/javascript">
    function mover(i,j,turno) 
    {
       document.form.fila.value=i;
       document.form.columna.value=j;
       document.form.turno.value=turno;
       document.form.submit();
    }
    </script>

    <div class="jugadorA">
        <?php echo "Jugador A:",$_SESSION["nombreA"],"<br>"?>
    </div>
    
    <div class="jugadorB">
        <?php echo "Jugador B:",$_SESSION["nombreB"],"<br>"?>
    </div>
  
    
    <div class="proceso">
        <?php  

            // tab es objeto de clase tablero
            //$tab = New tablero($_SESSION["tablero"],0,$_SESSION["turno"]);
            $tab->crearTablero();
            $tab->imprimirTablero();
            
            $_SESSION["turno"] = $tab->jugada($_SESSION["turno"],$_POST["fila"],$_POST["columna"]);
            
            if($_SESSION["turno"] == 1){
                $_SESSION["turno"]=2;
            }         
            else{
                $_SESSION["turno"]=1;
            }
           
            $tab->imprimirTablero();

            echo "turno:",$_SESSION["turno"];
            /*for ($i=0; $i <$_SESSION["tamano"] ; $i++) { 
                for ($j=0; $j <$_SESSION["tamano"] ; $j++) { 
                    $_SESSION["tableroAux"][$i][$j] = $tab->m[$i][$j];
                }   
            }*/

            $_SESSION["tablero"] = $tab;
            
        ?>
    </div>

    <div><a href="cerrar.php" class="juegoNuevo" >Iniciar juego nuevo</a></div>


    <form name="form" action="" method="POST">
        <input name="fila" type="hidden" value="">
        <input name="columna" type="hidden" value="">
        <input name="turno" type="hidden" value="">
    </form>



</body>
</html>