<?php
session_start();
require_once "../Conexion.php";
require_once "../funciones.php";
session_start();

$obj = new Metodo();
$obj2 = new Conexion();
$ejem = $obj2->conectar();
$usuarioEliminar = $_SESSION['usuario'];

$sql = "SELECT Id_persona FROM usuarios WHERE correo = '$usuarioEliminar'";
$buscandousu = mysqli_query($ejem, $sql);
$fila = mysqli_fetch_array($buscandousu, MYSQLI_ASSOC);
$numusuario = $fila['Id_persona'];

$datos=array(
    $numusuario,
);

if($obj->delete($datos)==1){
    print "Se elimino cuenta";
}else{
    print "Fallo al borrar";
}
if($obj->delete2($datos)==1){
    session_destroy();
    header("location: ../Iniciar_sesion.php");
}else{
    print "Fallo borrar publicaciones";
}
