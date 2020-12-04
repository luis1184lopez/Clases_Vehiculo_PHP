<?php
class Vehiculo{
    // Atributos
        public $nombre;
        public $color;
        public $peso;
        public $tamanio; 

    // Contructores sin parametro
    public function __construct(){
       $this->nombre="";
       $this->color="";
       $this->peso="";
       $this->tamanio=""; 
    }
    // Contructores con parametros
    public function Vehiculo($nombre,$color,$peso,$tamanio){
        $this->nombre=$nombre;
        $this->color=$color;
        $this->peso=$peso;
        $this->tamanio=$tamanio; 
     }
    //Metodos set
    public function setnombre($nombre){
        $this->nombre=$nombre;
    }
    public function setcolor($color){
        $this->color=$color;
    }
    public function setpeso($peso){
        if($peso<0){
            echo "Valor incorrecto, no puede ser un valor negativo";
        }else{ 
           $this->peso=$peso;
        }
    }
    public function settamanio($tamanio){
        if($tamanio<0){
            echo "Valor incorrecto, no puede ser un valor negativo";
        }else{
            $this->tamanio=$tamanio;
        }
    }
    //Metodos get
    public function getnombre(){
        return $this->nombre;
    }
    public function getcolor(){
        return $this->color;
    }
    public function getpeso(){
        return $this->peso;
    }
    public function gettamanio(){
       return $this->tamanio;
    }
    //Sobrecarga de métodos
    // Metodo validar si transporte es publico o privado
    public function validarTransporte($pasajeros){
        if ($pasajeros <= 5){
           echo "Transporte privado";
        }else
           echo "Transporte publico";
    }
    }
    // Crear una clase Avion derivada de la clase Vehiculo.
class Avion extends Vehiculo {

}
//Crear un objeto de la clase Vehiculo que envíe un mensaje si el vehiculo es de transporte privado o publico.
$vehiculo = new Vehiculo();
//Crear un objeto de la clase Avión
$avion = new Avion();

?>
