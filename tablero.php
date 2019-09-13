<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    class Tablero 
    {

        public $m;
        public $m1;
        public $tamano;
        public $turno;    	
    	
        public function __construct($tamano,$a,$turno)
    	{
            $this->tamano=$tamano;
            $this->m[$tamano][$tamano] =$a;
            $this->m1[$tamano][$tamano] =$a;
            $this->turno=$turno;
    	}

        function crearTablero(){
            for ($i=0; $i <$this->tamano ; $i++) { 
              for ($j=0; $j <$this->tamano; $j++) { 
                    if ($i%2==0) {
                        if ($j%2==0) {
                            $this->m[$i][$j]=0; // color marrón
                        }
                        else{                           
                            $this->m[$i][$j]=1; // color rojo
                        }
                    }
                    else{
                        if ($j%2==0) {
                            $this->m[$i][$j]=2;  // color azul                         
                        }
                        else{
                            $this->m[$i][$j]=0;  // color marrón                         
                        }
                    }
                    $this->m1[$i][$j] = $this->m[$i][$j];
                }
            }

        } // fin de creación de tablero

        function imprimirTablero(){ 
            echo "<table>";
                for ($i=0; $i<$this->tamano ; $i++){
                    echo "<tr>";
                    for($j = 0; $j<$this->tamano;$j++){
                        $number = $this->m[$i][$j];
                        echo "<th class='casillas casillas--$number' data-row='$i' data-col='$j'></th>";
                    }
                    /*for ($j=0; $j<$this->tamano ; $j++) {
                        if($this->m[$i][$j]==0){
                            //echo "<th><a onclick='mover(".$i.",".$j.",$this->turno)'><img src='img/Marron.png' width='30px' heigth='30px'/></a></th>";
                            echo "<th><img src='img/Marron.png' width='30px' heigth='30px'/></th>";
                        }
                        if($this->m[$i][$j]==1){
                            //echo "<th><a onclick='mover(".$i.",".$j.",$this->turno)'><img src='img/Rojo.png' width='30px' heigth='30px'/></a></th>";
                            echo "<th><img src='img/Rojo.png' width='30px' heigth='30px'/></th>";
                        }
                        if($this->m[$i][$j]==2){
                            //echo "<th><a onclick='mover(".$i.",".$j.",$this->turno)'><img src='img/Azul.png' width='30px' heigth='30px'/></a></th>";
                            echo "<th><img src='img/Azul.png' width='30px' heigth='30px'/></th>";
                        }
                    }*/
                    echo "</tr>";
                }
            echo "</table>";

        } // fin de imprimir

        function jugada($turno,$i,$j){

            if($this->m[$i][$j]==0){
                 if($turno == 2){
                    $this->m[$i][$j]=2;
                    $turno = 1;
                }
                else if($turno == 1){
                    $this->m[$i][$j]=1;
                    $turno = 2;
                }
                return $turno;
            }
            else{
                return 0;
            }
         
            $this->m1[$i][$j] = $this->m[$i][$j];
            //Tablero::imprimirTablero();
        }







    } // fin de clase






	
?>