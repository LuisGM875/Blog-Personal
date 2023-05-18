<?php
require_once "../Conexion.php";
require_once "../funciones.php";
session_start();
$obj=new Metodo();
$obj2=new Conexion();
$ejem = $obj2->conectar();
$usuarioingresado = $_SESSION['usuario'];
$sql="SELECT Id_persona FROM usuarios WHERE correo = '$usuarioingresado'";
$buscandousu = mysqli_query($ejem,$sql);
$fila = mysqli_fetch_array($buscandousu,MYSQLI_ASSOC);
$numusuario = $fila['Id_persona'];

$nombre=$_POST['txtusuario'];
$edad=$_POST['txtedad'];
$correo=$_POST['txtcorreo'];
$contrasena=$_POST['txtcontrasena'];
$validar=$_POST['txtvalidcontrasena'];

$contrasena=hash('sha256',$contrasena);
$validar=hash('sha256',$validar);

if (! $_POST
    || trim($_POST['txtusuario'])     === ''
    || trim($_POST['txtedad'])     === ''
    || trim($_POST['txtcorreo'])   === ''
    || trim($_POST['txtcontrasena'])     === ''
    || trim($_POST['txtvalidcontrasena'])     === ''
) {
    header("location:../vlog_persona.php");
}else{
    if($contrasena==$validar){
        $datos=array($nombre,$edad,$correo,$contrasena,$numusuario);
        if($obj->update($datos)==1){
            echo $numusuario;
            header("location:../vlog_persona.php");
        }else{
            echo "Fallo al agregar";
        }
    }else{
        header("location:../vlog_persona.php");
    }
}