<?php
class Vehiculo{
    // Atributos
        public $nombre;
        public $color;
        public $peso;
        public $tamanio; 

    // Constructor que verificará si lleva parámetros o no y en base a eso redireccionará 
    public function __construct() {
        //obtengo un array con los parámetros enviados a la función
        $params = func_get_args();
        //saco el número de parámetros que estoy recibiendo
        $num_params = func_num_args();
        //atendiendo al siguiente modelo __construct0() __construct4()...
        $funcion_constructor ='__construct'.$num_params;
        //compruebo si hay un constructor con ese número de parámetros
        if (method_exists($this,$funcion_constructor)) {
            //si esa función existe, la invoco, reenviando los parámetros que recibí en el constructor
            call_user_func_array(array($this,$funcion_constructor),$params);
        }
    }

    // Contructor sin parametro
    private function __construct0() {
        $this->setnombre("");
        $this->setcolor("");
        $this->setpeso(0);
        $this->settamanio(0);         
    }

    // Contructor con parametros
    private function __construct4($nombre,$color,$peso,$tamanio) {
        $this->setnombre($nombre);
        $this->setcolor($color);
        $this->setpeso($peso);
        $this->settamanio($tamanio);           
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
    //Funcion __call que recoge el número de pasajeros del vehículo
    function __call($metodo, $argumentos) {

        // Metodo validar si transporte es publico o privado
        if ($metodo == 'getTipoTransporte') {
            if ($argumentos[0]<=5) {
                return "Transporte privado";
            }
            else {
                return "Transporte público";
            }                                   
        }

        // Metodo validar si el tipo de vehículo es autobus, avión o barco
        if ($metodo == 'getTipoVehiculo') {            
            if ($argumentos[0]<100) {
                return "autobus";
            }
            elseif($argumentos[0]>=100 && $argumentos[0]<=555) {
                return "avión";
            }
            elseif($argumentos[0]>555 && $argumentos[0]<=30000) {
                return "barco";
            }
            else {
                return "otro";
            }                                   
        }
    }
}

// Crear una clase Avion derivada de la clase Vehiculo.
class Avion extends Vehiculo {
    public $turbinas;

    public function setTurbinas($cantidad){
        if($cantidad<0){
            echo "Valor incorrecto, no puede ser un valor negativo <br>";
        }else{
            $this->turbinas=$cantidad;
        }
    }

    public function getTurbinas(){
        return $this->turbinas;
    }
}

//Crear un objeto de la clase Vehiculo que envíe un mensaje si el vehiculo es de transporte privado o publico.
$vehiculo = new Vehiculo();
//Crear un objeto de la clase Avión
$avion = new Avion();

?>
