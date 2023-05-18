<?php
require_once "../Conexion.php";
require_once "../funciones.php";

session_start();
$obj=new Metodo();
$correo=$_POST['txtcorreoing'];
$contrasena=$_POST['txtcontrasenaing'];
$contrasena=hash('sha256',$contrasena);

if (! $_POST
    || trim($_POST['txtcorreoing'])   === ''
    || trim($_POST['txtcontrasenaing'])     === ''
) {
    header("location:../Iniciar_sesion.php");
}else{
        $datos=array($correo,
            $contrasena,
        );
        if($obj->search($datos)==1){
            $_SESSION['usuario'] = $correo;
            header("location:../vlog_persona.php");
        }else{
            print "Fallo al ingresar";
            header("location:../Iniciar_sesion.php");
        }
}