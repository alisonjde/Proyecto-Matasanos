<?php
class MedicoDAO{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $especialidad;

    public function __construct($id=0, $nombre="",$apellido="",$correo="",$clave="", $especialidad="") {
    $this->id= $id;
    $this->nombre= $nombre;
    $this->apellido= $apellido;
    $this->correo= $correo;
    $this->clave= $clave;
    $this->especialidad= $especialidad;
    }


    public function consulta($especialidad): string {
        return 
        "SELECT idMedico, nombre, apellido, correo, clave, Especialidad_id
         FROM Medico WHERE Especialidad_id = {$especialidad}
         order by apellido asc;";
    }
    
}
?>