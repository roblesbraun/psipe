<?php
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
    include('connection.php');
    if(isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $carrera = $_POST['carrera'];
        $experiencia = $_POST['experiencia'];
        $nombreImagen = $_FILES['imagen']['name'];
        $tmpImagen = $_FILES['imagen']['tmp_name'];
        echo '<p>Nombre del docente es:'.$nombre.'</p>';
        echo '<p>Carrera es:'.$carrera.'</p>';
        echo '<p>Experiencia es:'.$experiencia.'</p>';
        if ($nombre != '' and $carrera != '' and $experiencia != '') {
            $query = "INSERT INTO docentes (nombre, carrera, experiencia, rutaImagen) VALUES ('$nombre', '$carrera', '$experiencia', 1);";
            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn));
            }
            // echo '<div class="alert alert-success" role="alert">Te has registrado exitosamente.</div>';
            $success = 1;
        }
        $query = "SELECT idDocente FROM docentes ORDER BY idDocente desc limit 1";
        $result = mysqli_query($conn, $query);
        $idDocente = '';
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)){
                $idDocente = $row[0];
            }
        }
        $query = "UPDATE docentes SET rutaImagen = '".$idDocente."-".$nombreImagen."' WHERE idDocente = ".$idDocente.";";
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        move_uploaded_file($tmpImagen, '../img/docentes/'.$idDocente.'-'.$nombreImagen);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    <div class="container mx-auto p-10">
        <h1 class="text-2xl font-bold text-center mb-3">Agregar un Docente</h1>
        <!-- FORM -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <div class="mb-6">
                <label for="nombre" class="block mb-2 text-sm font-medium text-psipeGray">Nombre del Docente</label>
                <input type="text" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Maria" required="">
            </div>
            <div class="mb-6">
                <label for="carrera" class="block mb-2 text-sm font-medium text-psipeGray">Carrera</label>
                <input type="text" name="carrera" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Psicologa" required="">
            </div>
            <div class="mb-6">
                <label for="experiencia" class="block mb-2 text-sm font-medium text-psipeGray">Experiencia</label>
                <input type="text" name="experiencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Experiencia..." required="">
            </div>
            <div class="mb-6">
                <label for="imagen" class="block mb-2 text-sm font-medium text-psipeGray">Imagen</label>
                <input type="file" name="imagen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Experiencia..." required="">
            </div>
            <button type="submit" name="submit" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
        <!-- Despliegue de cursos actuales para poder eliminarlos -->
        <form action="">
            <p class="text-lg text-center font-bold m-5">Cursos</p>
            <table class="rounded-t-lg m-5 mx-auto bg-gray-200 text-gray-800 w-full">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-5">Id</th>
                    <th class="px-4 py-5">Docente</th>
                    <th class="px-4 py-5 text-center">Eliminar</th>
                </tr>
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-4 py-5">1</td>
                    <td class="px-4 py-5">Maria</td>
                    <td class="px-4 py-5 text-center"><input type="checkbox"></td>
                </tr>
            </table>
        </form>
    </div>
    <script src="../main.js"></script>
</body>
</html>