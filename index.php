<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    session_start();

    $error = '';

    if(isset($_POST['submit'])){
        //$nameA = $_POST['name-a'];
        //$nameB = $_POST['name-b'];
        //$tam = $_POST['length'];


        $_SESSION['nombreA'] = $_POST['name-a'];
        $_SESSION['nombreB'] = $_POST['name-b'];
        $_SESSION['tablero'] = $_POST['length'];
        header("location:game.php");

        //$_SESSION['validar'] = true;

        if(empty($nameA)){
            $error .= 'Ingrese nombre del Jugador A <br/>';
        }
        if(empty($nameB)){
            $error .= 'Ingrese nombre del Jugador B <br/>';
        }
        if(empty($tam)){
            $error .= 'Ingrese el tamano <br/>';
        }
        if(!empty($tam) && $tam%2 == 0){
            $error .= 'Ingrese un valor impar para el tamano del tablero';
        }
        if(!empty($nameA) && !empty($nameB) && !empty($tam) && $tam%2 == 1){
            require 'game.php';
        }else{
            require 'view.php';
        }

    }else{
        require 'view.php';
    }

?>