<!-- Navbar -->
<!-- navbar goes here -->
<nav class="bg-psipeGreen">
    <div class="px-3 mx-auto shadow-lg">
        <div class="flex justify-between">
            <!-- Recordar agrupar en contenedores las cosas que queremos que vayan del lado izquierdo y derecho -->
            <!-- Lado izquierdo -->
            <div class="flex space-x-4">
                <!-- Logo -->
                <a href="index.php" class="flex items-center py-3 px-2 text-gray-200 divide-x divide-black">
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
    <div class="flex flex-wrap bg-green-700/25 px-5 py-0.5 space-x-3 justify-end shadow-lg">
        <a href="./psicologia.php" class="hover:text-slate-50 duration-300 text-xs md:text-base">Psicología</a>
        <a href="./psicoanalisis.php" class="hover:text-slate-50 duration-300 text-xs md:text-base">Psicoanálisis</a>
        <a href="./pedagogia.php" class="hover:text-slate-50 duration-300 text-xs md:text-base">Pedagogía</a>
        <a href="./psicopedagogia.php" class="hover:text-slate-50 duration-300 text-xs md:text-base">Psicopedagogía</a>
        <a href="./logopedia.php" class="hover:text-slate-50 duration-300 text-xs md:text-base">Logopedia</a>
        <a href="./neurociencias.php" class="hover:text-slate-50 duration-300 text-xs md:text-base">Neurociencias</a>
    </div>
    <!-- mobile menu -->
    <div class="mobile-menu hidden lg:hidden p-1 shadow-lg">
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