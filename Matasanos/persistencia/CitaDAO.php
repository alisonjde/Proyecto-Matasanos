<?php

class CitaDAO{
    private $id;
    private $fecha;
    private $hora;
    private $paciente;
    private $medico;
    private $consultorio;

    public function __construct($id="", $fecha="", $hora="", $paciente="", $medico="", $consultorio="")
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->paciente = $paciente;
        $this->medico = $medico;
        $this->consultorio = $consultorio;
    }

    public function consultar()
    {
        return "select idCita, fecha, hora, p.nombre, m.nombre, co.nombre
                from Cita c
                inner join Paciente p on c.Paciente_idPaciente = p.idPaciente
                inner join Medico m on c.Medico_idMedico = m.idMedico
                inner join Consultorio co on c.Consultorio_idConsultorio = co.idConsultorio;";
    }


}


?>