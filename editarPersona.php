<?php
require_once "conexion.php";
require_once "funciones.php";

session_start();
$obj = new Metodo();
$obj2 = new Conexion();
$ejem = $obj2->conectar();
$usuarioingresado = $_SESSION['usuario'];

$sql = "SELECT Id_persona FROM usuarios WHERE correo= '$usuarioingresado'";
$buscandousu = mysqli_query($ejem, $sql);
$fila = mysqli_fetch_array($buscandousu, MYSQLI_ASSOC);
$numusuario = $fila['Id_persona'];

$sql2 = "SELECT nombre,edad,correo,contrasena FROM usuarios WHERE Id_persona = '$numusuario'";
$result = mysqli_query($ejem, $sql2);
$ver = mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>
        EDITAR
    </title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-white dark:bg-gray-900">
<div class="bg-gray-100 dark:bg-gray-700">
<header>
    <nav class="bg-blue-300 border border-gray-300 px-4 lg:px-6 py-2.5 dark:bg-purple-400">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a class="flex items-center justify-start">
                <img src="img/persona.png" class="mr-3 h-6 sm:h-9 flex items-center" alt="">
                <p class="flex items-center justify-start self-center text-xl whitespace-nowrap dark:text-white">Usuario
                    <?php
                    $obj=new Conexion();
                    $ejem = $obj->conectar();
                    $usuarioingresado = $_SESSION['usuario'];
                    $sql="SELECT nombre FROM usuarios WHERE correo = '$usuarioingresado'";
                    $buscandousu = mysqli_query($ejem,$sql);
                    $fila = mysqli_fetch_array($buscandousu,MYSQLI_ASSOC);
                    $numusuario = $fila['nombre'];
                    print $numusuario;
                    ?>
                </p>
            </a>
            <div class="flex items-center lg:order-2 space-x-4">
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-500 dark:hover:bg-purple-950 dark:focus:ring-purple-500" id="theme-toggle">Modo vista</button>
                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-500 dark:hover:bg-purple-950 dark:focus:ring-purple-800" href="Procesos/cerrarSesion.php">Cerrar sesion</a>
            </div>
        </div>
    </nav>
</header>
<script src="scrip.js"></script>
<div class="flex flex-col items-center justify-center px-2 py-4 mx-2 md:h-screen lg:py-0">
<div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-900 dark:border-gray-700">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
            Configura tu cuenta
        </h1>
        <form action="Procesos/configurarPErsona.php" class="space-y-4 md:space-y-6" method="post">
            <input type="text" hidden="" value="<?php print $numusuario?>" name="Id_publicacion">
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Nombre de usuario: </label>
                </div>
                <div class="md:w-2/3">
                    <input required type="text" name="txtusuario" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="<?php print $ver[0]?>">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Ingresa edad: </label>
                </div>
                <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="txtedad" value="<?php print $ver[1]?>">
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Correo electronico: </label>
                </div>
                <div class="md:w-2/3">
                    <input required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="txtcorreo" value="<?php print $ver[2]?>">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Contraseña: </label>
                </div>
                <div class="md:w-2/3">
                    <input required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="txtcontrasena" max=12 >
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Validar contraseña: </label>
                </div>
                <div class="md:w-2/3">
                    <input required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="txtvalidcontrasena" max=12>
                </div>
            </div>
            <div class="text-center">
                <button class="shadow bg-blue-600 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded dark:bg-purple-400">Cambiar datos</button>
                <button class="shadow bg-blue-600 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded dark:bg-purple-400" type="button" onclick="location='vlog_persona.php'">Cancelar</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</body>
</html>