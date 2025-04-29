<?php

// require ("persistencia/Conexion.php");
require ("persistencia/CitaDAO.php");

class Cita{
    private $id;
    private $fecha;
    private $hora;
    private $paciente;
    private $medico;
    private $consultorio;

    public function getId(){
        return $this -> id;
    }

    public function getFecha(){
        return $this -> fecha;
    }

    public function getHora(){
        return $this -> hora;
    }
    public function getPaciente(){
        return $this -> paciente;
    }

    public function getMedico(){
        return $this -> medico;
    }

    public function getConsultorio(){
        return $this -> consultorio;
    }
    public function __construct($id = "", $fecha = "", $hora = "", $paciente = "", $medico = "", $consultorio = "") {
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> hora = $hora;
        $this -> paciente = $paciente;
        $this ->medico = $medico;
        $this ->consultorio = $consultorio;
    }

    public function consultar(){
        $conexion = new Conexion();
        $citaDAO = new CitaDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($citaDAO -> consultar());
        $citas = array();
        while(($datos = $conexion -> registro()) != null){
            $cita = new Cita($datos[0], $datos[1], $datos[2],$this -> paciente,$this -> medico,$this -> consultorio);
            array_push($citas, $cita);
        }
        $conexion -> cerrar();
        return $citas;
    }

}
?>