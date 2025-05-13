<?php
$id = $_SESSION["id"];
$medico = new Medico($id);
$medico -> consultar();

if($medico -> getConfirmar() == false){
    header("Location: ?pid=" . base64_encode("presentacion/autenticar.php"));
}else{
    echo "Hola " . $medico -> getNombre() . " " . $medico -> getApellido();
    echo "Usted tiene la especialidad: " . $medico -> getEspecialidad() -> getNombre();
}
?>