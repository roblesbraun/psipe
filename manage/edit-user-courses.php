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
    //Obtenemos el correo al que se quiere editar sus correos...
    $correo = $_POST['correo'];
    //Encontramos el ID de usuario...
    $queryID = "SELECT id_usuario FROM usuarios WHERE correo = '$correo';";
    $resultID = mysqli_query($conn, $queryID);
    $id = mysqli_fetch_array($resultID);
    $idUsuario = $id['id_usuario'];
    //Agregando un curso
    if(isset($_POST['addCourse'])){
        $curso = $_POST['curso'];
        $query = "INSERT INTO usuariosCursos (id_curso, id_usuario) VALUES ('$curso', '$idUsuario')";
        $result = mysqli_query($conn, $query);
    }
    //Eliminar acceso de un curso a tal usuario
    if(isset($_POST['eliminar'])){
        foreach ($_POST['idCurso'] as $idCurso) {
            $query = "DELETE FROM usuariosCursos WHERE id_usuario = $idUsuario AND id_curso = $idCurso;";
            $result = mysqli_query($conn, $query);
        }
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
    <div class="container mx-auto p-10">
        <a href="./select-user.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-xl text-center mb-10">Cursos de <?php echo $correo ?></h1>
        <!-- Cursos -->
        <form method="post" class="space-y-10">
            <div class="mb-6">
                <label for="Curso" class="block mb-2 text-sm font-medium text-psipeGray" required="">Cursos</label>
                <select name="curso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3">
                    <?php
                        $query = "SELECT idCurso, nombre FROM cursos;";
                        $result = mysqli_query($conn, $query);
                        while ($cursos = mysqli_fetch_array($result)){
                            echo '<option value='.$cursos['idCurso'].' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">'.$cursos['nombre'].'</option>';
                        }
                    ?>
                </select>
                <input type="hidden" name="correo" value="<?php echo $correo ?>">
            </div>
            <div class="flex justify-center space-x-3">
                <button type="submit" name="addCourse" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Agregar Curso</button>
            </div>
        </form>
        <!-- ,Cursos de tal usuario -->
        <form action="" method="post" class="mt-8">
            <p class="text-lg text-center font-bold m-5">Cursos agregados</p>
            <table class="rounded-t-lg m-5 mx-auto bg-gray-200 text-gray-800 w-full">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-5">ID</th>
                    <th class="px-4 py-5">Curso</th>
                    <th class="px-4 py-5 text-center">Eliminar</th>
                </tr>
                <?php
                    $query = "SELECT id_curso FROM usuariosCursos WHERE id_usuario = $idUsuario;";
                    $result = mysqli_query($conn, $query);
                    while ($courses = mysqli_fetch_array($result)){
                        $queryCourseDetails = "SELECT idCurso, nombre FROM cursos WHERE idCurso = ".$courses['id_curso'].";";
                        $resultCourseDetails = mysqli_query($conn, $queryCourseDetails);
                        while ($courseDetails = mysqli_fetch_array($resultCourseDetails)){
                            echo '<tr class="bg-gray-100 border-b border-gray-200">';
                                echo '<td class="px-4 py-5">'.$courseDetails['idCurso'].'</td>';
                                echo '<td class="px-4 py-5">'.$courseDetails['nombre'].'</td>';
                                echo '<td class="px-4 py-5 text-center"><input type="checkbox" name="idCurso[]" value="'.$courseDetails['idCurso'].'"></td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </table>
            <input type="hidden" name="correo" value="<?php echo $correo ?>">
            <div class="flex justify-center">
                <button type="submit" name="eliminar" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Eliminar</button>
            </div>
        </form>
    </div>
    <script src="../main.js"></script>
</body>
</html>