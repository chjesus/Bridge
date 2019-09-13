<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    session_start();
    if(isset($_SESSION["tablero"])){
        unset($_SESSION["tablero"]);
    }
    $error = '';

    if(isset($_POST['submit'])){

        $_SESSION['nombreA'] = $_POST['name-a'];
        $_SESSION['nombreB'] = $_POST['name-b'];
        $_SESSION['tamano'] = $_POST['length'];

        if(empty($_SESSION['nombreA'])){
            $error .= 'Ingrese nombre del Jugador A <br/>';
        }
        if(empty($_SESSION['nombreB'])){
            $error .= 'Ingrese nombre del Jugador B <br/>';
        }
        if(empty($_SESSION['tamano'])){
            $error .= 'Ingrese el tamano <br/>';
        }
        if(!empty($_SESSION['tamano']) && ($_SESSION['tamano'])%2 == 0){
            $error .= 'Ingrese un valor impar para el tamano del tablero';
        }
        if(!empty($_SESSION['nombreA']) && !empty($_SESSION['nombreB']) && !empty($_SESSION['tamano']) && ($_SESSION['tamano'])%2 == 1){
            header("location:game.php"); // utilizo header para obtener toda la información en game
            
        }else{
            require 'view.php'; 
        }

    }else{
        require 'view.php';
    }

?>