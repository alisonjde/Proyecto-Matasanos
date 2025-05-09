<?php
$id = $_SESSION["id"];
$admin = new Admin($id);
$admin -> consultar();

if($admin -> mensaje == True){
    header("Location: ?pid=" . base64_encode("presentacion/autenticar.php"));
}else{
    echo "Hola " . $admin -> getNombre() . " " . $admin -> getApellido();
}
?>
AQUI VA EL MENU
