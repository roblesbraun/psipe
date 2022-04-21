<?php
    include('connection.php');
    $idCursoSelect = '';
    $query = "SELECT * FROM cursos ORDER BY idCurso ASC limit 1;";
    $result = mysqli_query($conn, $query);
    $resultQuery = mysqli_fetch_array($result);
    $idCurso = $resultQuery['idCurso'];
    $nombreCurso = $resultQuery['nombre'];
    $nombreDocente = $resultQuery['docente'];
    $duracion = $resultQuery['duracion'];
    $dia = $resultQuery['dia'];
    $horario = $resultQuery['horario'];
    $horasPresenciales = $resultQuery['horasPresenciales'];
    $horasAsincronas = $resultQuery['horasAsincronas'];
    $linkClase = $resultQuery['linkClase'];
    $rutaImagen = $resultQuery['rutaImagen'];
    if(isset($_POST['curso'])){
        $idCurso = $_POST['curso'];
        $idCursoSelect = $idCurso;
        $query = "SELECT * FROM cursos WHERE idCurso = $idCurso";
        $result = mysqli_query($conn, $query);
        $resultQuery = mysqli_fetch_array($result);
        $idCurso = $resultQuery['idCurso'];
        $nombreCurso = $resultQuery['nombre'];
        $nombreDocente = $resultQuery['docente'];
        $duracion = $resultQuery['duracion'];
        $dia = $resultQuery['dia'];
        $horario = $resultQuery['horario'];
        $horasPresenciales = $resultQuery['horasPresenciales'];
        $horasAsincronas = $resultQuery['horasAsincronas'];
        $linkClase = $resultQuery['linkClase'];
        $rutaImagen = $resultQuery['rutaImagen'];
    }
    if(isset($_POST['submit'])){
        $idCurso = $_POST['curso'];
        $nombreCurso = $_POST['nombreCurso'];
        $nombreDocente = $_POST['nombreDocente'];
        $duracion = $_POST['duracion'];
        $dia = $_POST['dia'];
        $horario = $_POST['horario'];
        $horasPresenciales = $_POST['horasPresenciales'];
        $horasAsincronas = $_POST['horasAsincronas'];
        $linkClase = $_POST['linkClase'];
        $imagenVieja = $_POST['imagenVieja'];
        $nombreImagen = $_FILES['imagen']['name'];
        $tmpImagen = $_FILES['imagen']['tmp_name'];
        $rutaImagen = "$idCurso-$nombreImagen";
        echo $rutaImagen;
        if ($nombreImagen != '' and $tmpImagen != ''){
            echo 'Entre';
            unlink('../img/cursos/'.$imagenVieja.'');
            $query = "UPDATE cursos SET nombre = '$nombreCurso', docente = '$nombreDocente', duracion = '$duracion', dia = '$dia', horario = '$horario', horasPresenciales = '$horasPresenciales', horasAsincronas = '$horasAsincronas', linkClase = '$linkClase', rutaImagen = '$rutaImagen' WHERE idCurso = $idCurso";
            $result = mysqli_query($conn, $query);
            move_uploaded_file($tmpImagen, '../img/cursos/'.$rutaImagen.'');
        }
        else {
            $query = "UPDATE cursos SET nombre = '$nombreCurso', docente = '$nombreDocente', duracion = '$duracion', dia = '$dia', horario = '$horario', horasPresenciales = '$horasPresenciales', horasAsincronas = '$horasAsincronas', linkClase = '$linkClase' WHERE idCurso = $idCurso";
            $result = mysqli_query($conn, $query);
        }
        header("Location: edit-courses.php", true, 303);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
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
        <h1 class="text-2xl text-center mb-5">Editar Curso</h1>
        <form action="" name="editar" method="post">
            <div class="flex flex-col md:flex-row md:space-x-7 lg:space-x-7">
                <div class="mb-6 w-full">
                    <label for="curso" class="block mb-2 text-sm font-medium text-psipeGray" required="">Curso a Editar</label>
                    <select name="curso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3" onchange="this.form.submit()">
                        <?php
                            $query = "SELECT idCurso, nombre FROM cursos ORDER BY idCurso;";
                            $result = mysqli_query($conn, $query);
                            while ($cursos= mysqli_fetch_array($result)){
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
            </div>
        </form>
        <!-- FORM -->
        <form action="" method="post" enctype="multipart/form-data" class="mb-10">
            <div class="mb-6">
                <label for="nombreCurso" class="block mb-2 text-sm font-medium text-psipeGray">Nombre del Diplomado</label>
                <input type="text" name="nombreCurso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Diplomado Terapia de Lenguaje Aplicada" value="<?php echo $nombreCurso ?>" required="">
                <input type="hidden" name="curso" value="<?php echo $idCurso ?>">
            </div>
            <div class="mb-6">
                <label for="duracion" class="block mb-2 text-sm font-medium text-psipeGray">Duracion (en horas)</label>
                <input type="number" name="duracion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="80" value="<?php echo $duracion ?>" required="">
            </div>
            <div class="mb-6">
                <label for="nombreDocente" class="block mb-2 text-sm font-medium text-psipeGray">Nombre del Docente</label>
                <input type="text" name="nombreDocente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Nombre del docente" value="<?php echo $nombreDocente ?>" required="">
            </div>
            <div class="mb-6">
                <label for="dia" class="block mb-2 text-sm font-medium text-psipeGray" required="">Dia</label>
                <input type="dia" name="dia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Nombre del docente" value="<?php echo $dia;?>" required="">
            </div>
            <div class="mb-6">
                <label for="horario" class="block mb-2 text-sm font-medium text-psipeGray">Horario</label>
                <input type="text" name="horario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="7:00 a 9:00 p.m." value="<?php echo $horario;?>" required="">
            </div>
            <div class="mb-6">
                <label for="horasPresenciales" class="block mb-2 text-sm font-medium text-psipeGray">Horas presenciales</label>
                <input type="number" name="horasPresenciales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="40" value="<?php echo $horasPresenciales;?>"  required="">
            </div>
            <div class="mb-6">
                <label for="horasAsincronas" class="block mb-2 text-sm font-medium text-psipeGray">Horas asíncronas</label>
                <input type="number" name="horasAsincronas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="40" value="<?php echo $horasAsincronas;?>" required="">
            </div>
            <div class="mb-6">
                <label for="linkClase" class="block mb-2 text-sm font-medium text-psipeGray">Enlace de Sesiones</label>
                <input type="url" name="linkClase" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Enlace" value="<?php echo $linkClase;?>" required="">
            </div>
            <label for="imagen" class="block mb-2 text-sm font-medium text-psipeGray">Imagen</label></label>
            <div class="flex justify-center space-x-7 items-center mb-6">
                <img src="../img/cursos/<?php echo $rutaImagen;?>" class="rounded-full w-20 h-20" alt="">
                <input type="hidden" name="imagenVieja" value="<?php echo $rutaImagen;?>">
                <div class="w-full">
                    <input type="file" name="imagen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Enlace">
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" name="submit" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Actualizar</button>
            </div>
        </form>
</body>
</html>