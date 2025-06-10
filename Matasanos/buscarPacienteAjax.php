<?php 
require ("logica/Persona.php");
require ("logica/Paciente.php");

$filtro = $_GET["filtro"];
$filtros = explode(" ", $filtro);
$paciente = new Paciente();
$pacientes = $paciente->buscar($filtros);

if(count($pacientes) > 0){
    echo "<table class='table table-striped table-hover mt-3'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Correo</th></tr>";
    foreach($pacientes as $pac){
        echo "<tr>";
        echo "<td>" . $pac->getId() . "</td>";
        
        $nombre = $pac->getNombre();
        $apellido = $pac->getApellido();
        
        $filtrosEscapados = array_map(function($f) {
            return preg_quote($f, '/');
        }, $filtros);
        
        $patron = '/(' . implode('|', $filtrosEscapados) . ')/i';

        $nombre = preg_replace_callback($patron, function($coincidencias) {
            return "<strong>" . $coincidencias[0] . "</strong>";
        }, $nombre);
        
        $apellido = preg_replace_callback($patron, function($coincidencias) {
            return "<strong>" . $coincidencias[0] . "</strong>";
        }, $apellido);
        
        echo "<td>" . $nombre . "</td>";
        echo "<td>" . $apellido . "</td>";
        echo "<td>" . $pac->getCorreo() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
}else{
    echo "<div class='alert alert-danger mt-3' role='alert'>No hay resultados</div>";
}
?>
