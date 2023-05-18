<?php
require_once "conexion.php";
require_once "funciones.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-blue-300">
<div class="bg-white dark:bg-gray-700">
    <header>
        <nav class="bg-blue-300 border px-4 lg:px-6 py-2.5 dark:bg-purple-500">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <button
                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-400 dark:hover:bg-purple-950 dark:focus:ring-purple-500"
                    id="theme-toggle">Modo vista
                </button>
            </div>
        </nav>
    </header>
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <img src="img/user.png" class="w-32 h-32 rounded-full mb-4 mx-auto" alt="user">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                Iniciar sesión con tu cuenta
            </h1>
            <form action="Procesos/init-sesion.php" class="space-y-4 md:space-y-6" method="post">
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Correo
                            electronico:</label>
                    </div>
                    <div class="md:w-2/3">
                        <input required type="text" name="txtcorreoing"
                               class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 dark:text-white">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Contraseña
                            :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input required
                               class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                               type="password" name="txtcontrasenaing" max=12>
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button
                            class="shadow bg-blue-600 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Iniciar sesión
                        </button>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">No tienes una cuenta?
                        <a href="Registro.php" class="font-medium text-blue-400 hover:underline dark:text-primary-500">Registrate
                            aquí
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script src="scrip.js"></script>
</body>
</html>