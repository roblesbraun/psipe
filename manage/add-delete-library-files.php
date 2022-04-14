<?php
    include('connection.php');
    $query = "SELECT idCurso FROM cursos ORDER BY idCurso limit 1;";
    $result = mysqli_query($conn, $query);
    $curso = mysqli_fetch_array($result);
    $idCurso = $curso['idCurso'];
    $query = "SELECT idBiblioteca, nombre FROM bibliotecaCurso ORDER BY idBiblioteca limit 1;";
    $result = mysqli_query($conn, $query);
    $biblioteca = mysqli_fetch_array($result);
    $idBiblioteca = $biblioteca['idBiblioteca'];
    $nombreBiblioteca = $biblioteca['nombre'];
    //Para agregar archivo a biblioteca...
    if(isset($_POST['submit'])){
        echo 'ENTREEE AL submit <br>';
        $idBiblioteca = $_POST['biblioteca'];
        $nombreArchivo = $_POST['nombreArchivo'];
        $archivo = $_FILES['archivo']['name'];
        $tmpArchivo = $_FILES['archivo']['tmp_name'];
        //Empieza el INSERT
        if ($idBiblioteca != '' and $nombreArchivo != '') {
            $query = "INSERT INTO bibliotecaCursoArchivos (nombre, idBiblioteca, rutaArchivo) VALUES ('$nombreArchivo', $idBiblioteca, 1);";
            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn));
            }
            // echo '<div class="alert alert-success" role="alert">Te has registrado exitosamente.</div>';
        }
        $query = "SELECT idArchivo FROM bibliotecaCursoArchivos ORDER BY idArchivo desc limit 1";
        $result = mysqli_query($conn, $query);
        $idArchivo = '';
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_array($result)){
                $idArchivo = $row[0];
            }
        }
        $query = "UPDATE bibliotecaCursoArchivos SET rutaArchivo = '".$idArchivo."-".$nombreArchivo."' WHERE idArchivo = ".$idArchivo.";";
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
        move_uploaded_file($tmpArchivo, '../img/bibliotecaCursos/'.$idArchivo.'-'.$nombreArchivo);
        header("Location: add-delete-library-files.php", true, 303);
    }
    //Para cambiar de curso...
    if(isset($_POST['curso'])){
        $idCurso = $_POST['curso'];
        $queryInicial = "SELECT idBiblioteca, nombre FROM bibliotecaCurso WHERE idCurso = $idCurso;";
        $result = mysqli_query($conn, $queryInicial);
        $biblioteca = mysqli_fetch_array($result);
        $idBiblioteca = $biblioteca['idBiblioteca'];
        $nombreBiblioteca = $biblioteca['nombre'];
    }
    //Para elegir idBiblioteca
    if(isset($_POST['biblioteca'])){
        $idBiblioteca = $_POST['biblioteca'];
        $query = "SELECT idBiblioteca, nombre, idCurso FROM bibliotecaCurso WHERE idBiblioteca = $idBiblioteca;";
        $result = mysqli_query($conn, $query);
        $biblioteca = mysqli_fetch_array($result);
        $idBiblioteca = $biblioteca['idBiblioteca'];
        $nombreBiblioteca = $biblioteca['nombre'];
        $idCurso = $biblioteca['idCurso'];
    }
    //Para eliminar un curso
    if(isset($_POST['eliminar'])){
        foreach ($_POST['idArchivo'] as $idArchivo) {
            $query= "SELECT rutaArchivo FROM bibliotecaCursoArchivos WHERE idArchivo = $idArchivo;";
            $result = mysqli_query($conn, $query);
            $rutaArchivo = mysqli_fetch_array($result);
            unlink('../img/bibliotecaCursos/'.$rutaArchivo['rutaArchivo'].'');
            $query = "DELETE FROM bibliotecaCursoArchivos WHERE idArchivo = $idArchivo;";
            $resultElim = mysqli_query($conn, $query);
        }
        header("Location: add-delete-library-files.php", true, 303);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Cursos</title>
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
        <h1 class="text-2xl text-center mb-5">Agregar archivos a biblioteca</h1>
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
        <!-- Select para biblioteca de tal curso... -->
        <form action="" method="post" class="mb-6">
            <div class="mb-6">
                <label for="biblioteca" class="block mb-2 text-sm font-medium text-psipeGray" required="">Biblioteca</label>
                <select name="biblioteca" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3" onchange="this.form.submit()">
                    <?php
                        $query = "SELECT idBiblioteca, nombre, idCurso FROM bibliotecaCurso WHERE idCurso = $idCurso ORDER BY idBiblioteca;";
                        $result = mysqli_query($conn, $query);
                        while ($bibliotecas = mysqli_fetch_array($result)){
                            if ($bibliotecas['idBiblioteca'] == $idBiblioteca) {
                                echo '<option value='.$bibliotecas['idBiblioteca'].' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" selected>'.$bibliotecas['nombre'].'</option>';
                            }
                            else {
                                echo '<option value='.$bibliotecas['idBiblioteca'].' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">'.$bibliotecas['nombre'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
        </form>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-6">
                <label for="nombreArchivo" class="block mb-2 text-sm font-medium text-psipeGray">Nombre del Archivo</label>
                <input type="text" name="nombreArchivo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Nombre del archivo como aparecera en biblioteca" required="">
                <input type="hidden" name="biblioteca" value="<?php echo $idBiblioteca ?>">
            </div>
            <div class="mb-6">
                <label for="archivo" class="block mb-2 text-sm font-medium text-psipeGray">Archivo</label>
                <input type="file" name="archivo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required="">
            </div>
            <div class="flex justify-center">
                <button type="submit" name="submit" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Subir</button>
            </div>
        </form>
        <!-- Despliegue de cursos actuales para poder eliminarlos -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <p class="text-lg text-center font-bold m-5">Cursos</p>
            <table class="rounded-t-lg m-5 mx-auto bg-gray-200 text-gray-800 w-full">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-5">ID</th>
                    <th class="px-4 py-5">Nombre</th>
                    <th class="px-4 py-5 text-center">Eliminar</th>
                </tr>
                <?php
                    $query = "SELECT idArchivo, nombre, idBiblioteca FROM bibliotecaCursoArchivos WHERE idBiblioteca= $idBiblioteca";
                    $result = mysqli_query($conn, $query);
                    while ($archivo = mysqli_fetch_array($result)){
                        echo '<tr class="bg-gray-100 border-b border-gray-200">';
                            echo '<td class="px-4 py-5">'.$archivo['idArchivo'].'</td>';
                            echo '<td class="px-4 py-5">'.$archivo['nombre'].'</td>';
                            echo '<td class="px-4 py-5 text-center"><input type="checkbox" name="idArchivo[]" value="'.$archivo['idArchivo'].'"></td>';
                        echo '</tr>';
                    }
                ?>
            </table>
            <div class="flex justify-center">
                <button type="submit" name="eliminar" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Eliminar</button>
            </div>
        </form>
    </div>
</body>
</html>