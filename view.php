<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Bridge</title>
</head>
<body>
<header>
    <form action="index.php" method="POST">
        <div class="title">
            <h1>Ingrese los datos</h1>
        </div>
        <div class="container">
            <input type="text" name="name-a" id="name-a" placeholder="Nombre del Jugador A" value="<?php if(isset($nameA)) echo $nameA; ?>">
            <input type="text" name="name-b" id="name-b" placeholder="Nombre del Jugador B" value="<?php if(isset($nameB)) echo $nameB; ?>">
            <input type="text" name="length" id="length" placeholder="Tamano del Tablero    " value="<?php if(isset($tam)) echo $tam; ?>">
        </div>
        <div class="information">
            <?php if(!empty($error)): ?>
                <div class="alert warning">
                    <p><?php echo $error;?></p>
                </div>
            <?php endif ?>
        </div>
        <div class="btns">
            <input type="submit" name="submit" value="Jugar" class="btn btn-prymary">
        </div>
    </form>
</header>
</body>
</html>
