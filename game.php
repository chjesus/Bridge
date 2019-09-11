<?php
    session_start();
    //include('tablero.php');
    $_SESSION['tablero'] = $_POST['length'];
    //echo $_SESSION['tablero'];
    //$init = new Game();\

    if(isset($_SESSION['tablero'])){
        $_SESSION['conf'] = true;
        header('location:http://localhost/Bridge/game.php');
    }else{
        if($_SESSION['conf'] == false) header('location:http://localhost/Bridge');
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

</body>
</html>