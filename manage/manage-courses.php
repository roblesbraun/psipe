<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <link rel="stylesheet" href="../tailwind.css">
</head>
<body>
    <!-- Navbar -->
    <!-- navbar goes here -->
    <nav class="bg-slate-300 shadow-lg">
        <div class="px-3 mx-auto">
            <div class="flex justify-between">
                <!-- Recordar agrupar en contenedores las cosas que queremos que vayan del lado izquierdo y derecho -->
                <!-- Lado izquierdo -->
                <div class="flex space-x-4">
                    <!-- Logo -->
                    <a href="./dashboard.php" class="flex items-center py-5 px-2 text-gray-200 divide-x divide-black">
                        <img src="../img/psipeLogo.png" alt="" class="mr-2 w-14">
                        <span class="pl-2 font-extrabold text-black">Psipe Dashboard</span>
                    </a>
                    <!-- Nav lado izquierdo, si se desea -->
                    <!-- <div class="hidden md:flex items-center space-x-1">
                        <a class="py-5 px-3 text-gray-200 hover:text-black" href="#">Features</a>
                        <a class="py-5 px-3 text-gray-200 hover:text-black" href="#">Pricing</a>
                    </div> -->
                </div>
                <!-- Lado derecho -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a class="rounded p-2 hover:bg-gray-300 transition duration-500 text-black" href="./dashboard.php">Dashboard</a>
                    <a class="rounded p-2 hover:bg-gray-300 transition duration-500 text-black" href="#">Cerrar Sesión</a>
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
            <a href="./dashboard.php" class="text-center block rounded hover:bg-gray-300  py-2 px-2 duration-500 text-black">Dashboard</a>
            <a href="#" class="rounded p-2 text-center block hover:bg-gray-300 transition duration-500 text-black">Cerrar Sesión</a>
        </div>
    </nav>
    <!-- Fin de navbar -->
    <div class="container mx-auto p-10 space-y-8">
        <h1 class="text-2xl text-center">Administrar Cursos</h1>
        <!-- Cursos -->
        <h1 class="text-xl">Cursos</h1>
        <div class="grid grid-cols-4 gap-5 justify-items-start">
            <a href="./add-delete-course.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-center items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Agregar/Eliminar Cursos</p>
                </div>
            </a>
            <a href="./edit-courses.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-center items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Editar Cursos</p>
                </div>
            </a>
        </div>
        <!-- Biblitecas -->
        <h1 class="text-xl">Biblioteca de Cursos</h1>
        <div class="grid grid-cols-4 gap-5 justify-items-start">
            <a href="./add-delete-course-library.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-start items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Agregar/Eliminar Biblioteca de Cursos</p>
                </div>
            </a>
            <a href="./edit-course-library.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-start items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Modificar Biblioteca de Cursos</p>
                </div>
            </a>
            <a href="./add-delete-library-files.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-start items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Agregar archivos a Biblioteca</p>
                </div>
            </a>
        </div>
        <!-- Modulos -->
        <h1 class="text-xl">Modulos</h1>
        <div class="grid grid-cols-4 gap-5 justify-items-start">
            <a href="./add-delete-modules.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-start items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Agregar/Eliminar Modulos</p>
                </div>
            </a>
            <a href="./edit-modules.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-start items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Modificar Modulos</p>
                </div>
            </a>
            <a href="./add-delete-module-topic.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-start items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Agregar temario de Modulos</p>
                </div>
            </a>
            <a href="./edit-module-topic.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-start items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Editar tema de un Módulo</p>
                </div>
            </a>
        </div>
        <!-- Clases-->
        <h1 class="text-xl">Clases</h1>
        <div class="grid grid-cols-4 gap-5 justify-items-start">
            <a href="./add-delete-classes.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-start items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Agregar/Eliminar Clases</p>
                </div>
            </a>
            <a href="./edit-classes.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-center items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Editar Clases</p>
                </div>
            </a>
            <a href="./add-delete-library-files.php">
                <div class="h-44 w-32 rounded-xl bg-gray-300 flex flex-col space-y-8 justify-start items-center shadow duration-300 hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1 p-3">
                    <div class="bg-psipeGreen rounded-full h-14 w-14 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </div>
                    <p class="text-center text-xs lg:text-base md:text-sm mt-2">Agregar archivos a Biblioteca</p>
                </div>
            </a>
        </div>
    </div>
    <script src="../main.js"></script>
</body>
</html>