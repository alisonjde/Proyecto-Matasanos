<?php
require_once("logica/Persona.php");
//require_once("persistencia/Conexion.php");
require_once("persistencia/PacienteDAO.php");

class Paciente extends Persona {


    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "",){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
    }
    
    public function consultar(){
        $conexion = new Conexion();
        $pacienteDAO = new PacienteDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($pacienteDAO -> consultar());
        $pacientes = array();
        while (($datos = $conexion->registro()) != null) {
            $paciente = new Paciente(
                $datos[0], // id
                $datos[1], // nombre
                $datos[2], // apellido
                $datos[3], // correo
            );
            array_push($pacientes, $paciente);
        }
        $conexion->cerrar();
        return $pacientes;
    }

}
?>
