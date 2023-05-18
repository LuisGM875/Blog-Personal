<?php
require_once "conexion.php";
require_once "funcionesBlog.php";

session_start();
$obj = new MetodoBlog();
$obj2 = new Conexion();
$ejem = $obj2->conectar();
$usuarioingresado = $_SESSION['usuario'];
$sql = "SELECT Id_persona FROM usuarios WHERE correo = '$usuarioingresado'";
$buscandousu = mysqli_query($ejem, $sql);
$fila = mysqli_fetch_array($buscandousu, MYSQLI_ASSOC);
$numusuario = $fila['Id_persona'];


$sql3 = "SELECT Id_publicacion FROM publicaciones WHERE Id_persona = '$numusuario'";
$buscandopub = mysqli_query($ejem, $sql3);
$fila2 = mysqli_fetch_array($buscandopub, MYSQLI_ASSOC);
$numpubli = $_GET['id'];

$sql2 = "SELECT titulo, descripcion, link FROM publicaciones WHERE Id_persona = '$numusuario' AND Id_publicacion = '$numpubli'";
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
<body class="bg-gray-100 dark:bg-gray-700">
<div class="bg-gray-100 dark:bg-gray-700">
    <header>
        <nav class="bg-blue-300 border border-gray-300 px-4 lg:px-6 py-2.5 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a class="flex items-center justify-start">
                    <img src="img/persona.png" class="mr-3 h-6 sm:h-9 flex items-center" alt="">
                    <p class="flex items-center justify-start self-center text-xl whitespace-nowrap dark:text-white">
                        Usuario
                        <?php
                        $obj = new Conexion();
                        $ejem = $obj->conectar();
                        $usuarioingresado = $_SESSION['usuario'];
                        $sql = "SELECT nombre FROM usuarios WHERE correo = '$usuarioingresado'";
                        $buscandousu = mysqli_query($ejem, $sql);
                        $fila = mysqli_fetch_array($buscandousu, MYSQLI_ASSOC);
                        $numusuario = $fila['nombre'];
                        print $numusuario;
                        ?>
                    </p>
                </a>
                <div class="flex items-center lg:order-2 space-x-4">
                    <button
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-500 dark:hover:bg-purple-950 dark:focus:ring-purple-500"
                        id="theme-toggle">Modo vista
                    </button>
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-500 dark:hover:bg-purple-950 dark:focus:ring-purple-800"
                       href="Procesos/cerrarSesion.php">Cerrar sesion</a>
                </div>
            </div>
        </nav>
    </header>
    <nav class="bg-blue-500 px-4 lg:px-12 py-2.5 dark:bg-purple-500 flex flex-col items-center justify-center">
        <h1 class="dark:text-white">✏️ EDITAR PUBLICACIÓN ✏️</h1>
    </nav>
    <script src="scrip.js"></script>
    <div class="flex flex-col items-center justify-center px-2 py-4 mx-2 md:h-screen lg:py-0">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-5 lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-900 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <form action="Procesos_blog/update.php" method="post" class="" enctype="multipart/form-data">
                        <input type="text" hidden="" value="<?php print $numpubli ?>" name="Id_publicacion">
                        <div class="flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-black font-arial text-left mb-1 md:mb-0 pr-4 dark:text-white">
                                    Ingresa titulo a tu publicacion
                                </label>
                            </div>
                            <div class="md:w-4/6">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 dark:text-dark"
                                    REQUIRED type="text" name="txttitulo" value="<?php print $ver[0] ?>">
                            </div>
                        </div>
                        <div class="flex items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-black font-arial mb-1 md:mb-0 pr-4 dark:text-white">
                                    Descripcion
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <textarea
                                    class="bg-gray-200 w-full px-0 text-sm text-black border-0 dark:bg-white focus:ring-0 dark:placeholder-gray-400"
                                    REQUIRED type="text" name="txtdescripcion"><?php print $ver[1] ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="md:w-2/3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UNA
                                IMAGEN</label>
                            <input type="file" name="imagen" required>
                            <p class="mt-1 text-sm text-gray-500 dark:text-white" id="file_input_help">SVG, PNG, JPG or
                                GIF
                                (MAX. 800x400px)</p>
                        </div>
                        <div class="flex items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button
                                    class="shadow bg-green-400 hover:bg-green-300 dark:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded dark:hover:bg-purple-950 dark:focus:ring-purple-800">
                                    Publicar
                                </button>
                                <button
                                    class="shadow bg-green-400 hover:bg-green-300 dark:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded dark:hover:bg-purple-950 dark:focus:ring-purple-800"
                                    type="button" onclick="location='vlog_persona.php'">Cancelar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>