<?php
require_once "../Conexion.php";
require_once "../funcionesBlog.php";
session_start();
$id=$_GET['Id_publicacion'];

$obj=new MetodoBlog();
$obj2=new Conexion();
$ejem = $obj2->conectar();
$usuarioingresado = $_SESSION['usuario'];
$sql="SELECT Id_persona FROM usuarios WHERE correo = '$usuarioingresado'";
$buscandousu = mysqli_query($ejem,$sql);
$fila = mysqli_fetch_array($buscandousu,MYSQLI_ASSOC);
$numusuario = $fila['Id_persona'];

$titulo=$_POST['txttitulo'];
$descripcion=$_POST['txtdescripcion'];
$id=$_POST['Id_publicacion'];

if (! $_POST
    || trim($_POST['txttitulo'])   === ''
    || trim($_POST['txtdescripcion'])     === ''
) {
    header("location:../vlog_persona.php");
}
$datosImagen = file_get_contents($_FILES['imagen']['tmp_name']);
$imagen=addslashes($datosImagen);
$datos=array($titulo,
    $descripcion,
    $imagen,
    $numusuario,
    $id,
);

if($obj->update($datos)==1){
    header("location:../vlog_persona.php");
}else{
    echo "Fallo al agregar";
}