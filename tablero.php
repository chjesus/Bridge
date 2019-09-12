<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    class Tablero 
    {

        public $m;
        public $tamano;    	
    	
        public function __construct($tamano,$a)
    	{
            $this->tamano=$tamano;
            $this->m[$tamano][$tamano] =$a;
    	}

        function crearTablero(){
            for ($i=0; $i <$this->tamano ; $i++) { 
              for ($j=0; $j <$this->tamano; $j++) { 
                    if ($i%2==0) {
                        if ($j%2==0) {
                            $this->m[$i][$j]=0; 
                        }
                        else{                           
                            $this->m[$i][$j]=1;
                        }
                    }
                    else{
                        if ($j%2==0) {
                            $this->m[$i][$j]=2;                           
                        }
                        else{
                            $this->m[$i][$j]=0;                           
                        }
                    }
                }
            }
        }

        function imprimirTablero(){
            echo "<table>";
            for ($i=0; $i<$this->tamano ; $i++){ 
                echo "<tr>";
              for ($j=0; $j<$this->tamano ; $j++) {     
                    //echo $this->m[$i][$j]; 
                    if($this->m[$i][$j]==0){
                        echo "<td><a><img src='img/Marron.png' width='30px' heigth='30px'/></a></td>";

                    }
                    if($this->m[$i][$j]==1){
                        echo "<td><a><img src='img/Rojo.png' width='30px' heigth='30px'/></a></td>";

                    }
                    if($this->m[$i][$j]==2){
                        echo "<td><a><img src='img/Azul.png' width='30px' heigth='30px'/></a></td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }

    } // fin de clase






	
?>