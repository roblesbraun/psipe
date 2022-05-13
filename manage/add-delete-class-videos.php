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
    $query = "SELECT idCurso FROM cursos ORDER BY idCurso limit 1;";
    $result = mysqli_query($conn, $query);
    $curso = mysqli_fetch_array($result);
    $idCurso = $curso['idCurso'];
    $query = "SELECT idModulo, nombre, rangoClases, idCurso FROM modulos WHERE idCurso = $idCurso ORDER BY idModulo limit 1;";
    $result = mysqli_query($conn, $query);
    $modulo = mysqli_fetch_array($result);
    $idModulo = $modulo['idModulo'];
    $query = "SELECT idClase, nombre, presentacion, video, idModulo FROM clases WHERE idModulo = $idModulo ORDER BY idClase limit 1;";
    $result = mysqli_query($conn, $query);
    $idClase = '';
    // if (mysqli_num_rows($result) > 0) {
    //     $clase = mysqli_fetch_array($result);
    //     $idClase = $clase['idClase'];
    //     $nombreClase = $clase['nombre'];
    //     $presentacion = $clase['presentacion'];
    //     $video = $clase['video'];
    // }
    // else {
    //     $nombreClase = '';
    //     $presentacion = '';
    //     $video = '';
    // }
    //Para agregar video de clase...
    if(isset($_POST['submit'])){
        $idClase = $_POST['idClase'];
        $nombreVideo = $_POST['nombreVideo'];
        $linkVideo = $_POST['linkVideo'];
        $videoYT = 'https://www.youtube.com/embed/'.substr($linkVideo, 32, strlen($linkVideo)-1);
        $query = "INSERT INTO videosClase (nombre, link, idClase) VALUES ('$nombreVideo', '$videoYT', $idClase);";
        $result = mysqli_query($conn, $query);
    }
    //Para cambiar de curso...
    if(isset($_POST['curso'])){
        $idCurso = $_POST['curso'];
        $queryInicial = "SELECT idModulo, nombre, rangoClases FROM modulos WHERE idCurso = $idCurso;";
        $result = mysqli_query($conn, $queryInicial);
        $modulo = mysqli_fetch_array($result);
        $idModulo = $modulo['idModulo'];
        $nombreModulo = $modulo['nombre'];
        $rangoClases = $modulo['rangoClases'];
        $nombreClase = '';
        $presentacion = '';
        $video = '';
    }
    //Para elegir idModulo
    if(isset($_POST['modulo'])){
        $idModulo = $_POST['modulo'];
        $query = "SELECT idModulo, nombre, rangoClases, idCurso FROM modulos WHERE idModulo = $idModulo;";
        $result = mysqli_query($conn, $query);
        $modulo = mysqli_fetch_array($result);
        $idModulo = $modulo['idModulo'];
        $nombreModulo = $modulo['nombre'];
        $rangoClases = $modulo['rangoClases'];
        $idCurso = $modulo['idCurso'];
        $nombreClase = '';
        $presentacion = '';
        $video = '';
    }
    //Para elegir idClase
    if(isset($_POST['clase'])){
        $idClase = $_POST['clase'];
        $query = "SELECT idClase, nombre, presentacion, video, idModulo FROM clases WHERE idClase = $idClase;";
        $result = mysqli_query($conn, $query);
        $clase = mysqli_fetch_array($result);
        $idClase = $clase['idClase'];
        $nombreClase = $clase['nombre'];
        $presentacion = $clase['presentacion'];
        $video = $clase['video'];
        $idModulo = $clase['idModulo'];
        $query = "SELECT idCurso FROM modulos WHERE idModulo = $idModulo;";
        $result = mysqli_query($conn, $query);
        $curso = mysqli_fetch_array($result);
        $idCurso = $curso['idCurso'];
    }
    //Para eliminar videos de una clase
    if(isset($_POST['eliminar'])){
        foreach ($_POST['idVideo'] as $idVideo) {
            $query= "DELETE FROM videosClase WHERE idVideo = $idVideo;";
            $result = mysqli_query($conn, $query);
        }
        header("Location: add-delete-class-videos.php", true, 303);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar/Eliminar Videos de Clases</title>
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
        <a href="./manage-courses.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-2xl text-center mb-5">Agregar/Eliminar videos de Clases</h1>
        <!-- FORM -->
        <form action="" method="post" class="mb-6">
            <div class="mb-6">
                <label for="curso" class="block mb-2 text-sm font-medium text-psipeGray" required="">Curso</label>
                <select name="curso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3" onchange="this.form.submit()">
                    <?php
                        $query = "SELECT idCurso, nombre FROM cursos ORDER BY idCurso;";
                        $result = mysqli_query($conn, $query);
                        while ($cursos = mysqli_fetch_array($result)){
                            if ($cursos['idCurso'] == $idCurso) {
                                echo '<option value='.$cursos['idCurso'].' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" selected>'.$cursos['nombre'].'</option>';
                            }
                            else {
                                echo '<option value='.$cursos['idCurso'].' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">'.$cursos['nombre'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
        </form>
        <!-- Select para modulo de tal curso... -->
        <form action="" method="post" class="mb-6">
            <div class="mb-6">
                <label for="modulo" class="block mb-2 text-sm font-medium text-psipeGray" required="">Módulos</label>
                <select name="modulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3" onchange="this.form.submit()">
                    <?php
                        $query = "SELECT idModulo, nombre, idCurso FROM modulos WHERE idCurso = $idCurso ORDER BY idModulo;";
                        $result = mysqli_query($conn, $query);
                        while ($modulos = mysqli_fetch_array($result)){
                            if ($modulos['idModulo'] == $idModulo) {
                                echo '<option value='.$modulos['idModulo'].' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" selected>'.$modulos['nombre'].'</option>';
                            }
                            else {
                                echo '<option value='.$modulos['idModulo'].' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">'.$modulos['nombre'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
        </form>
        <!-- Select para clase de tal modulo... -->
        <form action="" method="post" class="mb-6">
            <div class="mb-6">
                <label for="clase" class="block mb-2 text-sm font-medium text-psipeGray" required="">Clases</label>
                <select name="clase" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3" onchange="this.form.submit()">
                    <option selected disabled>Elija la clase a editar...</option>
                    <?php
                        $query = "SELECT idClase, nombre, presentacion, video, idModulo FROM clases WHERE idModulo = $idModulo ORDER BY idClase ASC;";
                        $result = mysqli_query($conn, $query);
                        while ($clases = mysqli_fetch_array($result)){
                            if ($clases['idClase'] == $idClase) {
                                echo '<option value='.$clases['idClase'].' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" selected>'.$clases['nombre'].'</option>';
                            }
                            else {
                                echo '<option value='.$clases['idClase'].' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">'.$clases['nombre'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
        </form>
        <form action="" method="post">
            <div class="mb-6">
                <label for="nombreVideo" class="block mb-2 text-sm font-medium text-psipeGray">Nombre del Video</label>
                <input type="text" name="nombreVideo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required="">
                <input type="hidden" name="idClase" value="<?php echo $idClase ?>">
            </div>
            <div class="mb-6">
                <label for="linkVideo" class="block mb-2 text-sm font-medium text-psipeGray">Link del video</label>
                <input type="text" name="linkVideo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required="">
            </div>
            <div class="flex justify-center">
                <button type="submit" name="submit" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Agregar</button>
            </div>
        </form>
        <!-- Despliegue de archivos actuales de tal clase para poder eliminarlos -->
        <form action="" method="post">
            <p class="text-lg text-center font-bold m-5">Imagenes</p>
            <table class="rounded-t-lg m-5 mx-auto bg-gray-200 text-gray-800 w-full">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-5">ID</th>
                    <th class="px-4 py-5">Imagen</th>
                    <th class="px-4 py-5 text-center">Eliminar</th>
                </tr>
                <?php
                    if ($idClase != '') {
                        $query = "SELECT nombre, idVideo FROM videosClase WHERE idClase = $idClase";
                        $result = mysqli_query($conn, $query);
                        while ($videos = mysqli_fetch_array($result)){
                            echo '<tr class="bg-gray-100 border-b border-gray-200">';
                                echo '<td class="px-4 py-5">'.$videos['idVideo'].'</td>';
                                echo '<td class="px-4 py-5">'.$videos['nombre'].'</td>';
                                echo '<td class="px-4 py-5 text-center"><input type="checkbox" name="idVideo[]" value="'.$videos['idVideo'].'"></td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </table>
            <div class="flex justify-center">
                <button type="submit" name="eliminar" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Eliminar</button>
            </div>
        </form>
    </div>
    <script src="../main.js"></script>
</body>
</html>