<?php session_start();
	
	if(isset($_SESSION["tamano"])){
		unset($_SESSION["nombreA"]);
		unset($_SESSION["nombreB"]);
		unset($_SESSION["tamano"]);
		unset($_SESSION["tablero"]);
		unset($_SESSION['jugar']);

	}
    session_destroy();
	header("location:index.php");
	die();
?>