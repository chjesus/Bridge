<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    session_start();

    $error = '';

    if(isset($_POST['submit'])){

        $_SESSION['nombreA'] = $_POST['name-a'];
        $_SESSION['nombreB'] = $_POST['name-b'];
        $_SESSION['tablero'] = $_POST['length'];

        if(empty($_SESSION['nombreA'])){
            $error .= 'Ingrese nombre del Jugador A <br/>';
        }
        if(empty($_SESSION['nombreB'])){
            $error .= 'Ingrese nombre del Jugador B <br/>';
        }
        if(empty($_SESSION['tablero'])){
            $error .= 'Ingrese el tamano <br/>';
        }
        if(!empty($_SESSION['tablero']) && ($_SESSION['tablero'])%2 == 0){
            $error .= 'Ingrese un valor impar para el tamano del tablero';
        }
        if(!empty($_SESSION['nombreA']) && !empty($_SESSION['nombreB']) && !empty($_SESSION['tablero']) && ($_SESSION['tablero'])%2 == 1){
            header("location:game.php");
            
        }else{
            require 'view.php';
            
        }

    }else{
        require 'view.php';
    }

?>