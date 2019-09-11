<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    class Tablero 
    {

    	
    	
    	function __construct()
    	{
    		
    	}

        function crearTablero($tamano){
            for ($i=0; $i <$tamano ; $i++) { 
              for ($j=0; $j <$tamano; $j++) { 
                  $m[$i][$j]=2; 
                  
                }
            }
        }

        function imprimirTablero($tamano){
            for ($i=0; $i <$tamano ; $i++){ 
                echo "<br>";
              for ($j=0; $j <$tamano ; $j++) {           
                  echo "m[$i][$j]";         
                }
            }
        }




    } // fin de clase






	
?>