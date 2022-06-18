<?php
    include('./manage/connection.php');
    session_start();
    //Logout
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Cursos</title>
    <link rel="stylesheet" href="./tailwind.css">
    <link rel="icon" href="./img/psipeLogo.png">
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
                    <a href="index.php" class="flex items-center py-5 px-2 text-gray-200 divide-x divide-black">
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
                    <a class="rounded p-2 hover:bg-gray-300 transition duration-500 text-black" href="./index.php">Inicio</a>
                    <a class="rounded p-2 hover:bg-gray-300 transition duration-500 text-black" href="./psipe.php">Psipe</a>
                    <a class="rounded p-2 hover:bg-gray-300 transition duration-500 text-black" href="./clinica.php">Clínica</a>
                    <!-- Dropdown button -->
                    <!-- <div class="flex flex-col overflow-visible float-right items-start">
                        <button class="rounded p-2 dropBtn hover:bg-gray-300 transition duration-500 text-black" id="dropBtn">
                            Formación
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtn" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        Dropdown
                        <div class="text-sm bg-psipeGreen hidden absolute mt-12 flex-col rounded min-w-max" id="dropdown">
                            <a href="./formacion.php" class="rounded px-2 py-1 hover:bg-gray-300 duration-500 text-black">Formación Online</a>
                            <a href="./formacion.php" class="rounded px-2 py-1 hover:bg-gray-300 duration-500 text-black">Formación Presencial</a>
                        </div>
                    </div> -->
                    <a href="./formacion.php" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Formación</a>
                    <?php
                        if ((isset($_SESSION["login"]))) {
                            echo '<a href="./mis-cursos.php" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Mis Cursos</a>';
                        }
                    ?>
                    <a href="./supervision.php" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Supervisión</a>
                    <a href="./docentes.php" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Docentes</a>
                    <a href="./contacto.php" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Contacto</a>
                    <?php
                        if ((isset($_SESSION["login"]))) {
                            echo $_SESSION["login"];
                            echo '<form action="" method="post" class="m-0">
                                    <button name="logout" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Cerrar Sesión</button>
                                </form>';
                        }
                        else {
                            echo '<a href="./login.php" class="py-2 px-3 text-black rounded hover:bg-gray-300 hover:text-black transition duration-500">Iniciar Sesión</a>';
                        }
                    ?>
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
            <a href="./index.php" class="text-center block rounded hover:bg-gray-300  py-2 px-2 duration-500 text-black">Inicio</a>
            <a href="./psipe.php" class="rounded p-2 text-center block hover:bg-gray-300 transition duration-500 text-black">Psipe</a>
            <a href="./clinica.php" class="text-center block rounded hover:bg-gray-300 p-2 mx-1 text-black duration-500">Clínica</a>
            <a href="./formacion.php" class="text-center block rounded hover:bg-gray-300 p-2 mx-1 text-black duration-500">Formación</a>
            <?php
                if ((isset($_SESSION["login"]))) {
                    echo '<a href="./mis-cursos.php" class="text-center block rounded hover:bg-gray-300 p-2 mx-1 text-black duration-500">Mis Cursos</a>';
                }
            ?>
            <!-- Dropdown button 1-->
            <!-- <div class="text-center flex flex-col">
                <button class="rounded p-2 m-1 dropBtnM hover:bg-gray-300  text-black duration-500" id="dropBtnM">
                    Formación
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline dropBtnM" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                Dropdown
                <div class="bg-psipeGreen hidden flex-col m-1 rounded text-sm" id="dropdownM">
                    <a href="./formacion.php" class="rounded px-2 py-1 hover:bg-gray-300 text-black duration-500">Formación Online</a>
                    <a href="./formacion.php" class="rounded px-2 py-1 hover:bg-gray-300 text-black duration-500">Formación Presencial</a>
                </div>
            </div> -->
            <a href="./supervision.php" class="text-center block rounded hover:bg-gray-300 p-2 m-1 text-black duration-500">Supervisión</a>
            <a href="./docentes.php" class="text-center block rounded hover:bg-gray-300 p-2 mx-1 text-black duration-500">Docentes</a>
            <a href="./contacto.php" class="text-center block rounded hover:bg-gray-300 p-2 mx-1 text-black duration-500">Contacto</a>
            <?php
                if ((isset($_SESSION["login"]))) {
                    echo '<div class="block rounded hover:bg-gray-300 duration-500">
                            <form action="" method="post" class="flex items-center justify-center m-0">
                                <button type="submit" name="logout" class="text-center block rounded py-2 w-full text-black">Cerrar Sesión</button>
                            </form>
                        </div>';
                }
                else {
                    echo '<a href="./login.php" class="text-center block rounded hover:bg-gray-300 p-2 mx-1 text-black duration-500">Iniciar Sesión</a>';
                }
            ?>
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
    
    <!-- WhatsApp Button -->
    <div class="container mx-auto p-10">
        <a href="https://wa.me/525569158438" class="fixed w-12 h-12 bg-psipeBlue bottom-5 right-5 rounded-full flex justify-center items-center z-10 shadow-lg shadow-slate-500 hover:-translate-y-1 hover:shadow-md hover:shadow-slate-500 duration-300" target="_blank">
            <svg role="img" viewBox="0 0 24 24" class="h-7 w-7" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
        </a>
    </div>
    <script src="./main.js"></script>
</body>
</html>