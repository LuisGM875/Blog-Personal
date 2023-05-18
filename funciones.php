<?php
include_once "Conexion.php";
class Metodo{
    public function create($datos){
        $c= new Conexion();
        $ejem = $c->conectar();
        $sql="INSERT INTO usuarios (nombre,edad,correo,contrasena) 
                VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";
        return $result=mysqli_query($ejem,$sql);
    }

    public function search($datos){
        $c= new Conexion();
        $ejem = $c->conectar();
        $sql="SELECT Id_persona,nombre from usuarios WHERE correo='$datos[0]' AND contrasena='$datos[1]'";
        $result=mysqli_query($ejem,$sql);
        return $numrows=mysqli_num_rows($result);
    }

    public function update($datos){
        $c= new Conexion();
        $ejem = $c->conectar();
        $sql="UPDATE usuarios SET nombre='$datos[0]', edad='$datos[1]',correo='$datos[2]',contrasena='$datos[3]' where Id_persona='$datos[4]'";
        return $result=mysqli_query($ejem,$sql);
    }

    public function delete($datos){
        $c= new Conexion();
        $ejem = $c->conectar();
        $sql="DELETE from usuarios WHERE Id_persona='$datos[0]'";
        return $result=mysqli_query($ejem,$sql);
    }

    public function delete2($datos){
        $c= new Conexion();
        $ejem = $c->conectar();
        $sql="DELETE from publicaciones WHERE Id_persona='$datos[0]'";
        return $result=mysqli_query($ejem,$sql);
    }

}