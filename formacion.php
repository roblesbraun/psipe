<?php
    include('./manage/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formación</title>
    <link rel="stylesheet" href="./tailwind.css">
</head>
<body>
    <!-- Navbar -->
    <!-- navbar goes here -->
    <nav class="bg-psipeGreen">
        <div class="px-3 mx-auto">
            <div class="flex justify-between">
                <!-- Recordar agrupar en contenedores las cosas que queremos que vayan del lado izquierdo y derecho -->
                <!-- Lado izquierdo -->
                <div class="flex space-x-4">
                    <!-- Logo -->
                    <a href="index.html" class="flex items-center py-5 px-2 text-gray-200 divide-x divide-black">
                        <img src="./img/psipeLogo.png" alt="" class="mr-2 w-14">
                        <span class="pl-2 font-extrabold text-black">Psipe</span>
                    </a>
                    <!-- Nav lado izquierdo, si se desea -->
                    <!-- <div class="hidden md:flex items-center space-x-1">
                        <a class="py-5 px-3 text-gray-200 hover:text-black" href="#">Features</a>
                        <a class="py-5 px-3 text-gray-200 hover:text-black" href="#">Pricing</a>
                    </div> -->
                </div>
                <!-- Lado derecho -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a class="rounded p-2 hover:bg-gray-300 transition duration-500 text-black" href="./prueba.php">Inicio</a>
                    <a class="rounded p-2 hover:bg-gray-300 transition duration-500 text-black" href="./pages/descripcion.html">Psipe</a>
                    <a class="rounded p-2 hover:bg-gray-300 transition duration-500 text-black" href="./pages/descripcion.html">Clínica</a>
                    <!-- Dropdown button -->
                    <div class="flex flex-col overflow-visible float-right items-start">
                        <button class="rounded p-2 dropBtn hover:bg-gray-300 transition duration-500 text-black" id="dropBtn">
                            Formación
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtn" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Dropdown -->
                        <div class="text-sm bg-psipeGreen hidden absolute mt-12 flex-col rounded min-w-max" id="dropdown">
                            <a href="./formacion.php" class="rounded px-2 py-1 hover:bg-gray-300 duration-500 text-black">Formación Online</a>
                            <a href="./formacion.php" class="rounded px-2 py-1 hover:bg-gray-300 duration-500 text-black">Formación Presencial</a>
                        </div>
                    </div>
                    <a href="./pages/estudioe.html" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Supervisión</a>
                    <a href="./pages/conclusiones.html" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Docentes</a>
                    <a href="./cursos.php" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Cursos</a>
                    <a href="./pages/referencias.html" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Contacto</a>
                    <a href="./pages/referencias.html" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Inscríbete</a>
                </div>
                <!-- Mobile button -->
                <div class="lg:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- mobile menu -->
        <div class="mobile-menu hidden lg:hidden p-1">
            <a href="./index.html" class="text-center block rounded hover:bg-gray-300  py-2 px-2 duration-500 text-black">Inicio</a>
            <a href="./pages/descripcion.html" class="rounded p-2 text-center block hover:bg-gray-300 transition duration-500 text-black">Psipe</a>
            <a href="./pages/conclusiones.html" class="text-center block rounded hover:bg-gray-300 p-2 mx-1 text-black duration-500">Clínica</a>
            <!-- Dropdown button 1-->
            <div class="text-center flex flex-col">
                <button class="rounded p-2 m-1 dropBtnM hover:bg-gray-300  text-black duration-500" id="dropBtnM">
                    Formación
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtnM" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Dropdown -->
                <div class="bg-psipeGreen hidden flex-col m-1 rounded text-sm" id="dropdownM">
                    <a href="./formacion.php" class="rounded px-2 py-1 hover:bg-gray-300 text-black duration-500">Formación Online</a>
                    <a href="./formacion.php" class="rounded px-2 py-1 hover:bg-gray-300 text-black duration-500">Formación Presencial</a>
                </div>
            </div>
            <a href="./pages/estudioe.html" class="text-center block rounded hover:bg-gray-300 p-2 m-1 text-black duration-500">Supervisión</a>
            <a href="./pages/referencias.html" class="text-center block rounded hover:bg-gray-300 p-2 mx-1 text-black duration-500">Docentes</a>
            <a href="./pages/referencias.html" class="text-center block rounded hover:bg-gray-300 p-2 mx-1 text-black duration-500">Contacto</a>
        </div>
    </nav>
    <!-- Fin de navbar -->

    <!-- Main container -->
    <div class="container mx-auto p-10">
        <h1 class="text-5xl text-psipeDarkGray mb-7 text-center">Cursos</h1>
        <!-- Course Cards Container-->
        <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-5 justify-items-center">
            <?php
                $query = "SELECT idCurso, nombre, docente, duracion, rutaImagen FROM cursos ORDER BY idCurso;";
                $result = mysqli_query($conn, $query);
                while ($cursos = mysqli_fetch_array($result)){
                    echo '<div class="w-80 rounded-lg overflow-hidden shadow-lg duration-500 bg-gray-100 hover:shadow-2xl hover:-translate-y-2 hover:scale-80">
                            <img class="w-80 h-64 rounded-lg rounded-b-none" src="./img/cursos/'.$cursos['rutaImagen'].'">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">'.$cursos['nombre'].'</div>
                                <p class="text-gray-700 text-base">
                                    Duración: '.$cursos['duracion'].' horas 
                                </p>
                                <p class="text-gray-700 text-base">
                                    Imparte: '.$cursos['docente'].'
                                </p>
                                <p class="text-gray-700 text-base">
                                    <a href="./docentes.php">Conoce a nuestra ponente</a>
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-5">
                                <a href="./course-view.php?idCurso='.$cursos['idCurso'].'" class="bg-psipeBlue hover:hover:bg-psipeGray text-white font-bold py-2 px-4 rounded-full">
                                    Ver Más
                                </a>
                            </div>
                        </div>';
                }
            ?>
        </div>
    </div>
    <script src="./main.js" ></script>
</body>
</html>