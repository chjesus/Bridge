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
                    if ($i%2==1) {
                        if ($j%2==1) {
                            $this->m[$i][$j]=0; // color marrón
                        }else{
                            $this->m[$i][$j]=1; // color rojo
                        }
                    }else{
                        if ($j%2==1) {
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

            if($this->m[$fil][$col] == 0){
                $this->m[$fil][$col] = $value;
                $_SESSION['Tablero'] = $this->m;
                return true;
            }

            return false;

        }

        public function  validarJuego($fil,$col,$validation){
            $this->m = $_SESSION['Tablero'];
            for($i = 1;$i<($_SESSION['tamano'])/2;$i++){
                if($validation){
                    if($this->m[$_SESSION['tamano']-1][$i+$i] == 1) return $this->validationVertical($fil,$col,1,3);
                    if($this->validarCaminos(1,3)) return true;
                }else{
                    if($this->m[$i+$i][$_SESSION['tamano']-1] == 2) return $this->validationHorizontal($fil,$col,2,4);
                    if($this->validarCaminos(2,4)) return true;
                }
            }
            return false;
        }

        public function validarCaminos($comp,$newComp){
            $this->m = $_SESSION['Tablero'];

            for($i = $_SESSION['tamano'];$i>0;$i--){
                for($j = $_SESSION['tamano'];$j>0;$j--){
                    if($this->m[$i][$j] == $newComp){
                        if($this->m[$i-1][$j] == $comp) return $this->validationVertical($i-1,$j,$comp,$newComp);
                        if($this->m[$i+1][$j] == $comp) return $this->validationVertical($i+1,$j,$comp,$newComp);
                        if($this->m[$i][$j-1] == $comp) return $this->validationVertical($i,$j-1,$comp,$newComp);
                        if($this->m[$i][$j+1] == $comp) return $this->validationVertical($i,$j+1,$comp,$newComp);
                    }
                }
            }
        }
        public function validationVertical($fil,$col,$comp,$newComp){
            $this->m = $_SESSION['Tablero'];
            if($fil == 1 && $this->m[$fil][$col] == $comp) return true;

            if($this->m[$fil][$col] == $comp){
                $this->m[$fil][$col] = $newComp;
                $_SESSION['Tablero'] = $this->m;
                if($this->m[$fil-1][$col] == $comp) return $this->validationVertical($fil-1,$col,$comp,$newComp);
                if($this->m[$fil][$col-1] == $comp) return $this->validationHorizontal($fil,$col-1,$comp,$newComp);
                if($this->m[$fil][$col+1] == $comp) return $this->validationHorizontal($fil,$col+1,$comp,$newComp);
            }

            $fil++;
            if($this->m[$fil][$col] == $comp || $this->m[$fil][$col] == $newComp){
                $this->m[$fil][$col] = $newComp;
                $_SESSION['Tablero'] = $this->m;
                if($this->m[$fil][$col-1] == $comp) return $this->validationHorizontal($fil,$col-1,$comp,$newComp);
                if($this->m[$fil][$col+1] == $comp) return $this->validationHorizontal($fil,$col+1,$comp,$newComp);
                if($this->m[$fil+1][$col] == $comp) return $this->validationVertical($fil+1,$col,$comp,$newComp);
            }
            return false;
        }
        public function validationHorizontal($fil,$col,$comp,$newComp){
            $this->m = $_SESSION['Tablero'];
            if(($fil == 1 && $this->m[$fil][$col] == $comp) || ($col == 1 && $this->m[$fil][$col] == 2)) return true;

            if($this->m[$fil][$col] == $comp || $this->m[$fil][$col] == $newComp){
                $this->m[$fil][$col] = $newComp;
                $_SESSION['Tablero'] = $this->m;
                if($this->m[$fil][$col-1] == $comp) return $this->validationHorizontal($fil,$col-1,$comp,$newComp);
                if($this->m[$fil-1][$col] == $comp) return $this->validationVertical($fil-1,$col,$comp,$newComp);
                if($this->m[$fil+1][$col] == $comp) return $this->validationVertical($fil+1,$col,$comp,$newComp);
            }

            $col++;
            if($this->m[$fil][$col] == $comp || $this->m[$fil][$col] == $newComp){
                $this->m[$fil][$col] = $newComp;
                $_SESSION['Tablero'] = $this->m;
                if($this->m[$fil][$col+1] == $comp) return $this->validationHorizontal($fil,$col+1,$comp,$newComp);
                if($this->m[$fil+1][$col] == $comp) return $this->validationVertical($fil+1,$col,$comp,$newComp);
                if($this->m[$fil-1][$col] == $comp) return $this->validationVertical($fil-1,$col,$comp,$newComp);
            }
            return false;
        }
    } // fin de clase
?>