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
    <link rel="stylesheet" href="styles.css">
    <title>Registrate</title>
</head>
<body class="bg-white dark:bg-gray-900">
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
    <script src="scrip.js"></script>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <img src="img/user.png" class="w-32 h-32 rounded-full mb-4 mx-auto" alt="user">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                    Registrate aqui
                </h1>
                <form action="Procesos/create.php" class="space-y-4 md:space-y-6" method="post">
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Nombre
                                de usuario: </label>
                        </div>
                        <div class="md:w-2/3">
                            <input required type="text" name="txtusuario"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Ingresa
                                edad: </label>
                        </div>
                        <div class="md:w-2/3">
                            <input
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                type="text" name="txtedad">
                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3">
                            <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Correo
                                electronico: </label>
                        </div>
                        <div class="md:w-2/3">
                            <input required
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                   type="text" name="txtcorreo">
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Contraseña: </label>
                        </div>
                        <div class="md:w-2/3">
                            <input required
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                   type="text" name="txtcontrasena" max=12>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4 dark:text-white">Validar
                                contraseña: </label>
                        </div>
                        <div class="md:w-2/3">
                            <input required
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                   type="text" name="txtvalidcontrasena" max=12>
                        </div>
                    </div>
                    <div class="text-center">
                        <button
                            class="shadow bg-blue-600 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Registrar
                        </button>
                        <button
                            class="shadow bg-blue-600 hover:bg-blue-300 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="button" onclick="location='Iniciar_sesion.php'">Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>