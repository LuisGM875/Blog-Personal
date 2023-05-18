<?php
require_once "../Conexion.php";
require_once "../funciones.php";

$obj=new Metodo();
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
    header("location:../Registro.php");
}else{
    if($contrasena==$validar){
        $datos=array($nombre,$edad,$correo,
            $contrasena,
        );
        if($obj->create($datos)==1){
            header("location:../Registro.php");
        }else{
            echo "Fallo al agregar";
        }
    }else{
        header("location:../Registro.php");
    }
}




