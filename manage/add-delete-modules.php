<?php
    include('connection.php');
    $queryInicial = "SELECT idCurso FROM cursos ORDER BY idCurso limit 1;";
    $result = mysqli_query($conn, $queryInicial);
    $curso = mysqli_fetch_array($result);
    $idCurso = $curso['idCurso'];
    if(isset($_POST['submit'])){
        $idCurso = $_POST['curso'];
        $nombre = $_POST['nombreModulo'];
        $rangoClases = $_POST['rangoClases'];
        $temario = $_POST['temario'];
        $query = "INSERT INTO modulos (nombre, rangoClases, temario, idCurso) VALUES ('$nombre', '$rangoClases', '$temario', $idCurso)";
        $result = mysqli_query($conn, $query);
    }
    if(isset($_POST['curso'])){
        $idCurso = $_POST['curso'];
    }
    //Para eliminar un modulo
    //Checamos que no tenga ni temas, ni archivos...
    $canDelete = 0;
    $errorMessage = '';
    if(isset($_POST['eliminar'])){
        $canDelete = 0;
        $errorMessage = '';
        foreach ($_POST['idClase'] as $idClase) {
            $queryImgs = "SELECT * FROM carruselClase WHERE idClase = $idClase;";
            $resultImgs = mysqli_query($conn, $queryImgs);
            $queryBiblio = "SELECT * FROM bibliotecaClase WHERE idClase = $idClase;";
            $resultBiblio = mysqli_query($conn, $queryBiblio);
            if (mysqli_num_rows($resultImgs)>0 or mysqli_num_rows($resultBiblio)>0) {
                $canDelete = 1;
                $errorMessage = '<p class="text-red-500 text-center">No se puede eliminar, ya que una o mas clases, tienen archivos y/o imagenes sin eliminar.</p>';
                break;
            }
        }
        if ($canDelete == 0) {
            foreach ($_POST['idClase'] as $idClase) {
                $query = "DELETE FROM clases WHERE idClase = $idClase;";
                $resultElim = mysqli_query($conn, $query);
            }
        }
    }
    if(isset($_POST['eliminar'])){
        foreach ($_POST['idModulo'] as $idModulo) {
            $query = "DELETE FROM modulos WHERE idModulo = $idModulo;";
            $resultElim = mysqli_query($conn, $query);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulos de Cursos</title>
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
        <h1 class="text-2xl text-center mb-5">Agregar Módulos de Cursos</h1>
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
        <form action="" method="post">
            <div class="mb-6">
                <label for="nombreModulo" class="block mb-2 text-sm font-medium text-psipeGray">Nombre del Modulo</label>
                <input type="text" name="nombreModulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Lenguaje corporal" required="">
                <input type="hidden" name="curso" value="<?php echo $idCurso ?>">
            </div>
            <div class="mb-6">
                <label for="rangoClases" class="block mb-2 text-sm font-medium text-psipeGray">Rango de Clases</label>
                <input type="text" name="rangoClases" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Clases 1-3" required="">
            </div>
            <div class="mb-6">
                <label for="temario" class="block mb-2 text-sm font-medium text-psipeGray">Temario</label>
                <textarea name="temario" id="" cols="30" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"></textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit" name="submit" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Agregar</button>
            </div>
        </form>
        <!-- Despliegue de cursos actuales para poder eliminarlos -->
        <form action="" method="post">
            <p class="text-lg text-center font-bold m-5">Modulos</p>
            <table class="rounded-t-lg m-5 mx-auto bg-gray-200 text-gray-800 w-full">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-5">ID</th>
                    <th class="px-4 py-5">Nombre</th>
                    <th class="px-4 py-5 text-center">Eliminar</th>
                </tr>
                <?php
                    $query = "SELECT idModulo, nombre FROM modulos WHERE idCurso = $idCurso";
                    $result = mysqli_query($conn, $query);
                    while ($modulo = mysqli_fetch_array($result)){
                        echo '<tr class="bg-gray-100 border-b border-gray-200">';
                            echo '<td class="px-4 py-5">'.$modulo['idModulo'].'</td>';
                            echo '<td class="px-4 py-5">'.$modulo['nombre'].'</td>';
                            echo '<td class="px-4 py-5 text-center"><input type="checkbox" name="idModulo[]" value="'.$modulo['idModulo'].'"></td>';
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