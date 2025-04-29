<?php

class ConsultorioDAO{
    private $id;
    private $nombre;
    private $especialidad;
    
    public function __construct($id=0, $nombre="",$especialidad=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> especialidad = $especialidad;
    }
    
    public function consultar(){
        return "select idConsultorio, nombre, Especialidad_IdEspecialidad
                from Consultorio";
    }

    
    
}


?>