<?php

class EstadoCitaDAO{
    private $id;
    private $valor;
    
    public function __construct($id=0, $valor=""){
        $this -> id = $id;
        $this -> nombre = $valor;
    }
    
    public function consultar(){
        return "select idEstadoCita, valor
                from EstadoCita";
    }
}


?>