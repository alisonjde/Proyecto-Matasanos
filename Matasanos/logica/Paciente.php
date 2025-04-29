<?php
require_once("logica/Persona.php");
//require_once("persistencia/Conexion.php");
require_once("persistencia/PacienteDAO.php");

class Paciente extends Persona {


    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "",){
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
    }
    


}
?>
