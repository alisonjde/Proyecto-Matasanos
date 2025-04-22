<?php
require ("persistencia/MedicoDAO.php");
require ("logica/Persona.php");

class Medico extends Persona{
    private ?Especialidad $Especialidad;

    public function getEspecialidad(){
        return $this->Especialidad; 
    }

    public function __construct($id=0,$nombre="",$Apellido="",$correo="",$clave="", $Especialidad=null) {
     parent:: __construct($id,$nombre,$Apellido,$correo,$clave);
     $this->Especialidad = $Especialidad;
    }

    public function Consulta($especialidad): array{
        $conexion = new Conexion();
        $MedicoDao = new MedicoDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($MedicoDao->consulta($especialidad));
        $Medicos = array();
        while (($datos = $conexion -> registro()) != null){
            $Especialidad=new Especialidad($datos[5]);
            $medico= new Medico($datos[0],$datos[1],$datos[2],$datos[3],$datos[4], $Especialidad);
         array_push($Medicos, $medico);
        }
        $conexion -> cerrar();
        return $Medicos;
    }
}
?>