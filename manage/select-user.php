<?php
    include('connection.php');
    session_start();
    if (!(isset($_SESSION["login"]))) {
        header("Location: login.php");
    }
    // else {
    //     echo $_SESSION["login"];
    // }
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
    <title>Manage Courses</title>
    <link rel="stylesheet" href="../tailwind.css">
    <link rel="icon" href="../img/psipeLogo.png">
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
                    <form action="" method="post" class="m-0">
                        <div>
                            <button type="submit" name="logout" class="rounded p-2 hover:bg-gray-300 transition duration-500 text-black flex items-center justify-center">Cerrar Sesión</button>
                        </div>
                    </form>
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
            <a href="./dashboard.php" class="text-center block rounded hover:bg-gray-300 py-2 px-2 duration-500 text-black">Dashboard</a>
            <div class="block rounded hover:bg-gray-300">
                <form action="" method="post" class="flex items-center justify-center m-0">
                    <button type="submit" name="logout" class="text-center block rounded hover:bg-gray-300 py-2 duration-500 text-black">Cerrar Sesión</button>
                </form>
            </div>
            <!-- <form action="" method="post" class="flex items-center justify-center">
                <div class="block rounded hover:bg-gray-300 bg">
                    <button type="submit" name="logout" class="text-center block rounded hover:bg-gray-300 py-2 px-2 duration-500 text-black">Cerrar Sesión</button>
                </div>
            </form> -->
        </div>
    </nav>
    <!-- Fin de navbar -->
    <div class="container mx-auto p-10 flex flex-col items-center">
        <div class="space-y-10">
            <h1 class="text-2xl text-center mt-20">Administración de Usuarios y sus Cursos</h1>
            <!-- Cursos -->
            <form method="post" class="space-y-10" action="edit-user-courses.php">
                <div class="mb-6 w-full">
                    <label for="user" class="block mb-2 text-sm font-medium text-psipeGray">Usuario</label>
                    <input name="correo" list="users" id="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>
                <div class="flex justify-center space-x-3">
                    <button type="submit" name="submit" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Siguiente</button>
                </div>
                <datalist id="users">
                    <?php
                        $query = "SELECT correo FROM usuarios;";
                        $result = mysqli_query($conn, $query);
                        while ($correos = mysqli_fetch_array($result)) {
                            echo '<option value="'.$correos['correo'].'">';
                        }
                    ?>
                </datalist>
            </form>
        </div>
    </div>
    <script src="../main.js"></script>
</body>
</html>