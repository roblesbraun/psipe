<?php
    include('connection.php');
    if(isset($_POST['submit'])){
        $nombreCurso = $_POST['nombreCurso'];
        $duracion = $_POST['duracion'];
        $nombreDocente = $_POST['nombreDocente'];
        $dia = $_POST['dia'];
        $horario = $_POST['horario'];
        $horasPresenciales = $_POST['horasPresenciales'];
        $horasAsincronas = $_POST['horasAsincronas'];
        $numeroClases = $_POST['numeroClases'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaTermino = $_POST['fechaTermino'];
        $linkClase = $_POST['linkClase'];
        $nombreImagen = $_FILES['imagen']['name'];
        $tmpImagen = $_FILES['imagen']['tmp_name'];
        // echo '<p>Nombre del curso es:'.$nombreCurso.'</p>';
        if ($nombreCurso != '' and $duracion != '' and $nombreDocente != '' and $dia != '' and $horario != '' and $horasPresenciales != '' and $horasAsincronas != '' and $numeroClases != '' and $fechaInicio != '' and $fechaTermino != '' and $linkClase != '') {
            $query = "INSERT INTO cursos (nombre, docente, duracion, dia, horario, horasPresenciales, horasAsincronas, numeroClases, fechaInicio, fechaTermino, linkClase, rutaImagen) VALUES ('$nombreCurso', '$nombreDocente', $duracion, '$dia', '$horario', $horasPresenciales, $horasAsincronas, $numeroClases, '$fechaInicio', '$fechaTermino', '$linkClase', 1);";
            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn));
            }
            // echo '<div class="alert alert-success" role="alert">Te has registrado exitosamente.</div>';
        }
        $query = "SELECT idCurso FROM cursos ORDER BY idCurso desc limit 1";
        $result = mysqli_query($conn, $query);
        $idCurso = '';
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)){
                $idCurso = $row[0];
            }
        }
        $query = "UPDATE cursos SET rutaImagen = '".$idCurso."-".$nombreImagen."' WHERE idCurso = ".$idCurso.";";
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        move_uploaded_file($tmpImagen, '../img/cursos/'.$idCurso.'-'.$nombreImagen);
        header("Location: add-delete-course.php", true, 303);
    }
    //Para eliminar un curso
    if(isset($_POST['eliminar'])){
        echo 'ENTre';
        foreach ($_POST['idCurso'] as $idCurso) {
            $query= "SELECT rutaImagen FROM cursos WHERE idCurso = $idCurso;";
            $result = mysqli_query($conn, $query);
            $rutaImagen = mysqli_fetch_array($result);
            unlink('../img/cursos/'.$rutaImagen['rutaImagen'].'');
            $query = "DELETE FROM cursos WHERE idCurso = $idCurso;";
            $resultElim = mysqli_query($conn, $query);
        }
        header("Location: add-delete-course.php", true, 303);
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
    <div class="container mx-auto p-10">
        <a href="./manage-courses.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-2xl text-center mb-5">Agregar un Curso</h1>
        <!-- FORM -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="mb-10">
            <div class="mb-6">
                <label for="nombreCuros" class="block mb-2 text-sm font-medium text-psipeGray">Nombre del Diplomado</label>
                <input type="text" name="nombreCurso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Diplomado Terapia de Lenguaje Aplicada" required="">
            </div>
            <div class="mb-6">
                <label for="duracion" class="block mb-2 text-sm font-medium text-psipeGray">Duracion (en horas)</label>
                <input type="number" name="duracion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="80" required="">
            </div>
            <div class="mb-6">
                <label for="nombreDocente" class="block mb-2 text-sm font-medium text-psipeGray">Nombre de los Docentes</label>
                <input type="text" name="nombreDocente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Nombre del docente" required="">
            </div>
            <div class="mb-6">
                <label for="dia" class="block mb-2 text-sm font-medium text-psipeGray" required="">Dia</label>
                <select name="dia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="Lunes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">Lunes</option>
                    <option value="Martes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">Martes</option>
                    <option value="Miércoles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">Miércoles</option>
                    <option value="Jueves" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">Jueves</option>
                    <option value="Viernes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">Viernes</option>
                    <option value="Sábado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">Sábado</option>
                    <option value="Domingo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">Domingo</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="horario" class="block mb-2 text-sm font-medium text-psipeGray">Horario</label>
                <input type="text" name="horario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="7:00 a 9:00 p.m." required="">
            </div>
            <div class="mb-6">
                <label for="horasPresenciales" class="block mb-2 text-sm font-medium text-psipeGray">Horas presenciales</label>
                <input type="number" name="horasPresenciales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="40" required="">
            </div>
            <div class="mb-6">
                <label for="horasAsincronas" class="block mb-2 text-sm font-medium text-psipeGray">Horas asíncronas</label>
                <input type="number" name="horasAsincronas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="40" required="">
            </div>
            <div class="mb-6">
                <label for="numeroClases" class="block mb-2 text-sm font-medium text-psipeGray">Número de clases</label>
                <input type="number" name="numeroClases" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="20" required="">
            </div>
            <div class="mb-6">
                <label for="fechaInicio" class="block mb-2 text-sm font-medium text-psipeGray">Fecha de Inicio</label>
                <input type="date" name="fechaInicio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required="">
            </div>
            <div class="mb-6">
                <label for="fechaTermino" class="block mb-2 text-sm font-medium text-psipeGray">Fecha de Término</label>
                <input type="date" name="fechaTermino" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required="">
            </div>
            <div class="mb-6">
                <label for="linkClase" class="block mb-2 text-sm font-medium text-psipeGray">Enlace de Sesiones</label>
                <input type="url" name="linkClase" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Enlace" required="">
            </div>
            <div class="mb-6">
                <label for="imagen" class="block mb-2 text-sm font-medium text-psipeGray">Imagen</label>
                <input type="file" name="imagen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Enlace de Zoom" required="">
            </div>
            <div class="flex justify-center">
                <button type="submit" name="submit" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Agregar</button>
            </div>
        </form>
        <!-- Despliegue de cursos actuales para poder eliminarlos -->
        <form action="" method="post">
            <p class="text-lg text-center font-bold m-5">Cursos</p>
            <table class="rounded-t-lg m-5 mx-auto bg-gray-200 text-gray-800 w-full">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-5">#</th>
                    <th class="px-4 py-5">Nombre</th>
                    <th class="px-4 py-5 text-center">Eliminar</th>
                </tr>
                <?php
                    $query = "SELECT idCurso, nombre FROM cursos ORDER BY idCurso;";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result)>0) {
                        while ($cursos = mysqli_fetch_array($result)){
                            echo '<tr class="bg-gray-100 border-b border-gray-200">';
                                echo '<td class="px-4 py-5">'.$cursos['idCurso'].'</td>';
                                echo '<td class="px-4 py-5">'.$cursos['nombre'].'</td>';
                                echo '<td class="px-4 py-5 text-center"><input type="checkbox" name="idCurso[]" value="'.$cursos['idCurso'].'"></td>';
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