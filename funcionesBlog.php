<?php
include_once "Conexion.php";
class MetodoBlog{
    //CREATE publicacion
    public function create($datos){
        $c= new Conexion();
        $ejem = $c->conectar();
        $sql="INSERT INTO publicaciones(titulo,descripcion,link,Id_persona,imagen) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','0')";
        return $result=mysqli_query($ejem,$sql);
    }
    // READ publicacion
    public function read($sql){
        $c= new Conexion();
        $ejem = $c->conectar();
        $result=mysqli_query($ejem,$sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    // UPDATE publicacion
    public function update($datos){
        $c= new Conexion();
        $ejem = $c->conectar();
        $sql="UPDATE publicaciones SET titulo='$datos[0]',descripcion='$datos[1]',link='$datos[2]' where Id_persona='$datos[3]' and Id_publicacion='$datos[4]'";
        return $result=mysqli_query($ejem,$sql);
    }
    //DELETE publicacion
    public function delete($datos){
        $c= new Conexion();
        $ejem = $c->conectar();
        $sql="DELETE from publicaciones WHERE Id_persona='$datos[0]' and Id_publicacion='$datos[1]'";
        return $result=mysqli_query($ejem,$sql);
    }
}