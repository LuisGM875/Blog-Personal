<?php
require_once "../Conexion.php";
require_once "../funcionesBlog.php";
session_start();
$obj=new MetodoBlog();
$obj2=new Conexion();
$ejem = $obj2->conectar();
$usuarioingresado = $_SESSION['usuario'];
$sql="SELECT Id_persona FROM usuarios WHERE correo = '$usuarioingresado'";
$buscandousu = mysqli_query($ejem,$sql);
$fila = mysqli_fetch_array($buscandousu,MYSQLI_ASSOC);
$numusuario = $fila['Id_persona'];
$id=$_GET['id'];

$datos=array(
    $numusuario,
    $id,
);

if($obj->delete($datos)==1){
    header("location:../vlog_persona.php");
}else{
    print "Fallo al borrar";
}