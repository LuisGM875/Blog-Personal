<?php
require_once "Conexion.php";
require_once "funciones.php";
require_once "funcionesBlog.php";

$obj = new Conexion();
$ejem = $obj->conectar();
if (isset($_SESSION['usuario'])) {
    header("location:../Iniciar_sesion.php");
} else {
    session_start();
    $usuarioingresado = $_SESSION['usuario'];
    $sql = "SELECT Id_persona FROM usuarios WHERE correo = '$usuarioingresado'";
    $buscandousu = mysqli_query($ejem, $sql);
    $mostrar = mysqli_fetch_array($buscandousu);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vlog Personal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-white dark:bg-gray-900">
<div class="bg-gray-100 dark:bg-gray-700">
    <header>
        <nav class="bg-blue-300 border px-4 lg:px-6 py-2.5 dark:bg-purple-500">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a class="flex items-center justify-start">
                    <img src="img/persona.png" class="mr-3 h-6 sm:h-9 flex items-center">
                    <p class="flex items-center justify-start self-center text-xl whitespace-nowrap dark:text-white">
                        Bienvenido usuario
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
                    <a class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-400 dark:hover:bg-purple-950 dark:focus:ring-purple-500"
                       href="editarPersona.php">Editar usuario</a>
                    <button
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-400 dark:hover:bg-purple-950 dark:focus:ring-purple-500"
                        id="theme-toggle">Modo vista
                    </button>
                    <a class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-400 dark:hover:bg-purple-950 dark:focus:ring-purple-500"
                       href="Procesos/cerrarSesion.php">Cerrar sesion</a>
                    <a class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-400 dark:hover:bg-purple-950 dark:focus:ring-purple-500"
                       href="Procesos/borrarSesion.php">Borrar usuario</a>
                </div>
            </div>
        </nav>
    </header>

    <nav
        class="bg-blue-200 border border-black px-4 lg:px-12 py-2.5 dark:bg-gray-700 flex flex-col items-center justify-center ">
        <form class="w-full max-w-sm" method="post" action="Procesos_blog/crear.php" enctype="multipart/form-data">
            <div class="flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-arial text-left mb-1 md:mb-0 pr-4 dark:text-white">
                        Ingresa titulo a tu publicacion
                    </label>
                </div>
                <div class="md:w-4/6">
                    <input
                        class="bg-gray-200 appearance-none border border-gray-200 dark:border-gray-700 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 dark:text-black"
                        REQUIRED type="text" name="txttitulo">
                </div>
            </div>
            <div class="flex items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-black font-arial mb-1 md:mb-0 pr-4 dark:text-white">
                        ¿Qué piensas hoy?
                    </label>
                </div>
                <div class="md:w-2/3">
                <textarea
                    class="bg-gray-200 w-full px-0 text-sm text-black dark:bg-white focus:ring-0 dark:placeholder-gray-400 border border-gray-200 dark:border-gray-700 rounded-lg"
                    REQUIRED type="text" name="txtdescripcion">
                </textarea>
                </div>
            </div>
            <div class="flex items-center mb-6">
                <div class="md:w-2/3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UNA
                        IMAGEN</label>
                    <input type="file" name="imagen" required>
                    <p class="mt-1 text-sm text-gray-500 dark:text-white" id="file_input_help">SVG, PNG, JPG or GIF
                        (MAX. 800x400px)</p>
                </div>
            </div>
            <div class="flex items-center bg-gray-500 dark:bg-gray-700">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-green-400 hover:bg-green-300 dark:bg-purple-500 dark:hover:bg-purple-950 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Publicar
                    </button>
                </div>
            </div>
        </form>
    </nav>


    <div class="bg-blue-300 dark:bg-purple-500">
        <p class="text-center text-2xl">
            Mis Publicaciones
        </p>
        <?php
        $c = new MetodoBlog();
        $obj = new Conexion();
        $ejem = $obj->conectar();
        $usuarioingresado = $_SESSION['usuario'];
        $sql = "SELECT Id_persona FROM usuarios WHERE correo = '$usuarioingresado'";
        $sacarid = mysqli_query($ejem, $sql);

        if ($sacarid->num_rows == 1) {
            $fila = mysqli_fetch_array($sacarid, MYSQLI_ASSOC);
            $numusuario = $fila['Id_persona'];
        }

        $mostrarsql = "SELECT Id_publicacion,Id_persona,titulo,descripcion,link from publicaciones where Id_persona='$numusuario'";
        $datos = $c->read($mostrarsql);

        foreach ($datos as $fila) {
            ?>
            <div
                class="flex flex-col items-center mx-auto md:h-full dark:bg-white focus:ring-0 dark:placeholder-gray-400">
                <div class="rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                    <article class="bg-gray-200 rounded-lg border dark:bg-gray-900 dark:border-gray-500">
                        <div class="flex items-center mb-5 text-dark dark:text-gray-700">
                            <div class="dark:text-white">
                                <a class="dark:text-white"><?php print $fila['titulo'] ?></a>
                                <a class="dark:text-white"
                                   href="editar.php?id=<?php print $fila['Id_publicacion']; ?>">🖉️</a>
                                <a class="dark:text-white"
                                   href="Procesos_blog/delete.php?id=<?php print $fila['Id_publicacion']; ?>">🗑</a>
                                <p class="dark:text-white"><?php print $fila['descripcion'] ?></p>
                                <img class="w-7 h-7 rounded-lg flex items-center"
                                     src="data:image/jpg;base64,<?php print base64_encode($fila['link']); ?>"/>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <script src="scrip.js"></script>
</div>
</body>
</html>
