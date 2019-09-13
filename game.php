<?php
    include('tablero.php');
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $tab = New tablero($_SESSION["tamano"],0);

    if(!isset($_SESSION["tamano"])){ // si el tamaño no esta definido se envía de nuevo al form
        header("location:index.php");    // aunque en realidad ésto está de más
        die();
    }
    if(!isset($_SESSION['jugar'])){
        $tab->crearTablero();
        $_SESSION['jugar'] = true;
        $_SESSION['turno'] = 1;
    }else{
        if($_SESSION['turno'] == 1){
            if($tab->pintarJugada(1,$_POST['fila'],$_POST['columna'])){
                if($tab->validarJuego($_POST['fila'],$_POST['columna'],true)){
                    $_SESSION['win'] = true;
                }
                $_SESSION['turno'] = 0;
            }
        }else{
            if($tab->pintarJugada(2,$_POST['fila'],$_POST['columna'])){
                if($tab->validarJuego($_POST['fila'],$_POST['columna'],false)){
                    $_SESSION['win'] = false;
                }
                $_SESSION['turno'] = 1;
            }
        }
    }
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
    <div class="container">
        <div class="winer">Gano el Jugador:
            <?php if(isset($_SESSION['win'])): ?>
                <?php $_SESSION['nombreB']?>
            <?php endif ?>
                <?php $_SESSION['nombreA']?>
        </div>
        <div class="container-tablero">
            <?php
                if($_SESSION['jugar'] == true) $tab->imprimirTablero();
            ?>
            <div class="wrapper">
                <div class="jugador jugador-blue">Jugador: <?php echo $_SESSION["nombreA"],"<br>"?></div>
                <div class="jugador jugador-red">Jugador: <?php echo $_SESSION["nombreB"],"<br>"?></div>
                <a href="cerrar.php" class="btn btn-prymary" >Nuevo Juego</a>
            </div>
        </div>
        <div class="turno turno-<?php echo $_SESSION['turno'];?>">Turno</div>
    </div>
    <form name="form" action="" method="POST">
        <input name="fila" type="hidden" value="">
        <input name="columna" type="hidden" value="">
    </form>
    <script !src="">
        const $casillas = document.querySelectorAll('.casillas');
        console.log($casillas)
        $casillas.forEach(($element)=>{
            $element.addEventListener('click',()=>{
                document.form.fila.value = $element.dataset.row;
                document.form.columna.value =$element.dataset.col;
                document.form.submit();
            })
        })
    </script>
</body>
</html>