<?php

require ("persistencia/ConsultorioDAO.php");


class Consultorio{
    private $id;
    private $nombre;
    private $especialidad;
    
    public function getId(){
        return $this -> id;
    }
    
    public function getNombre(){
        return $this -> nombre;
    }
    public function getEspecialidad(){
        return $this -> especialidad;
    }
    
    public function __construct($id=0, $nombre="", $especialidad= ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> especialidad = $especialidad;
    }

    public function consultar(){
        $conexion = new Conexion();
        $consultorioDAO = new ConsultorioDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($consultorioDAO -> consultar());
        $consultorios = array();
        while(($datos = $conexion -> registro()) != null){
            $consultorio = new Consultorio($datos[0], $datos[1], $this -> especialidad);
            array_push($consultorios, $consultorio);
        }
        $conexion -> cerrar();
        return $consultorios;
    }
    
    
    
}
?>