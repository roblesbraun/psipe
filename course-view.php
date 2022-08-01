<?php
    include('./manage/connection.php');
    session_start();
    //Si no esta iniciada la sesion, te redirige a la pagina de login
    if (!(isset($_SESSION["login"]))) {
        header("Location: login.php");
    }
    //Logout
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: login.php");
    }
    $carpetaArchivos = './img/bibliotecaClase/';
    $idCurso = $_GET['idCurso'];
    $query = "SELECT * FROM cursos WHERE idCurso = $idCurso";
    $result = mysqli_query($conn, $query);
    $curso = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Curso</title>
    <link rel="stylesheet" href="./tailwind.css">
    <link rel="icon" href="./img/psipeLogo.png">
    <?php require_once("./navbar.php"); ?>
</head>
<body>
    
    <!-- Main Container -->
    <div class="container mx-auto p-10">
        <a href="./mis-cursos.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-3xl text-center"><?php echo $curso['nombre'] ?></h1>
        <!-- Container tablas, biblioteca, sesiones en vivo -->
        <div class="flex flex-col gap-5 mt-8 justify-center md:flex-row lg:flex-row">
            <table class="table-auto rounded-t-lg w-full bg-psipeGreen text-gray-800 text-center text-sm h-72 md:w-1/2 lg:w-1/2">
                <tr class="border-b-2 border-gray-300">
                    <th class="px-4 py-3">Imparte</th>
                    <th class="px-4 py-3"><?php echo $curso['docente'] ?></th>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <td class="px-4 py-3">Día</td>
                    <td class="px-4 py-3"><?php echo $curso['dia'] ?></td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <td class="px-4 py-3">Horario</td>
                    <td class="px-4 py-3"><?php echo $curso['horario'] ?></td>
                </tr>
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-4 py-3">Horas presenciales</td>
                    <td class="px-4 py-3"><?php echo $curso['horasPresenciales'] ?></td>
                </tr>
                <tr class="bg-white border-b border-gray-200">
                    <td class="px-4 py-3">Horas asíncronas</td>
                    <td class="px-4 py-3"><?php echo $curso['horasAsincronas'] ?></td>
                </tr>
            </table>
            <div class="flex flex-col gap-5 w-full md:w-1/2 lg:w-1/2">
                <div class="bg-psipeGreen rounded-lg p-5 flex flex-col">
                    <h1 class="text-2xl mb-3">Biblioteca</h1>
                    <a href="./course-library-view.php?idCurso=<?php echo $idCurso?>" class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue inline flex-none" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z" />
                        </svg>
                        <p>En esta sección encontraras material de apoyo de todo el diplomado. Haz clic aquí.</p>
                    </a>
                </div>
                <div class="">
                    <table class="rounded-t-lg w-full mx-auto mb-0 bg-psipeGreen text-gray-800 text-center text-sm">
                        <tr class="border-b-2 border-gray-300 col-span-2">
                            <th class="px-4 py-3" colspan="2">Sesiones en vivo</th>
                        </tr>
                        <tr class="bg-white border-b border-gray-200">
                            <td class="px-4 py-3">Enlace</td>
                            <td class="px-4 py-3"> <a href="<?php echo $curso['linkClase'] ?>">Haz click aqui!</a> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modulo y sus temarios -->
        <div class="mt-10 flex flex-col lg:w-1/2">
            <?php
                $queryModulos = "SELECT nombre, rangoClases, idModulo FROM modulos WHERE idCurso = $idCurso";
                $result = mysqli_query($conn, $queryModulos);
                while ($modulos = mysqli_fetch_array($result)){
                    echo '<a href="./module-view.php?idModulo='.$modulos['idModulo'].'" class="bg-psipeGreen p-2 rounded-lg text-xl mt-7">'.$modulos['nombre'].'</a>';
                    echo '<p class="mt-3 mb-5">'.$modulos['rangoClases'].'</p>';
                    // echo '<p class="flex items-center space-x-3">';
                        $queryTemarios = "SELECT nombre FROM temarioModulos WHERE idModulo = ".$modulos['idModulo'].";";
                        $resultTemarios = mysqli_query($conn, $queryTemarios);
                        while ($temas = mysqli_fetch_array($resultTemarios)) {
                            echo '<p class="flex items-center space-x-3">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue flex-none" viewBox="0 0 20 20" fill="currentColor">';
                                    echo '<path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z" />';
                                echo '</svg>';
                                echo '<span>'.$temas['nombre'].'</span>';
                            echo '</p>';
                        }
                        // echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">';
                        //     echo '<path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z" />';
                        // echo '</svg>';
                        // echo '<span>'.$modulos['rangoClases'].'</span>';
                    // echo '</p>';
                }
            ?>
        </div>
    </div>
    <script src="./main.js"></script>
</body>
</html>