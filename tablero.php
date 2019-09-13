<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    class Tablero {

        public $m;
        public $m1;
        public $tamano;
    	
        public function __construct($tamano,$a)	{
            $this->tamano=$tamano+2;
            $this->m[$tamano][$tamano] =$a;
            $this->m1[$tamano][$tamano] =$a;

    	}

        function crearTablero(){
            for ($i=0; $i <$this->tamano ; $i++) { 
                for ($j=0; $j <$this->tamano; $j++) {
                    if ($i%2==0) {
                        if ($j%2==0) {
                            $this->m[$i][$j]=0; // color marrón
                        }else{
                            $this->m[$i][$j]=1; // color rojo
                        }
                    }else{
                        if ($j%2==0) {
                            $this->m[$i][$j]=2;  // color azul                         
                        }else{
                            $this->m[$i][$j]=0;  // color marrón                         
                        }
                    }
                    $this->m1[$i][$j] = $this->m[$i][$j];
                }
            }
            for($i=0; $i <$this->tamano ; $i++){
                $this->m[0][$i] = 9;
                $this->m[$this->tamano-1][$i] = 9;
                $this->m[$i][0] = 9;
                $this->m[$i][$this->tamano-1] = 9;
            }
            $_SESSION['Tablero'] = $this->m;
        } // fin de creación de tablero

        function imprimirTablero(){
            $this->m = $_SESSION['Tablero'];
            echo "<table>";
                for ($i=0; $i<$this->tamano ; $i++){
                    echo "<tr>";
                    for($j = 0; $j<$this->tamano;$j++){
                        $number = $this->m[$i][$j];
                        echo "<th class='casillas casillas--$number' data-row='$i' data-col='$j'></th>";
                    }
                    echo "</tr>";
                }
            echo "</table>";

        } // fin de imprimir

        public function pintarJugada($value,$fil,$col){
            $this->m = $_SESSION['Tablero'];

            if($this->m[$fil][$col] == 0) $this->m[$fil][$col] = $value;

            $_SESSION['Tablero'] = $this->m;
        }

    } // fin de clase
?>