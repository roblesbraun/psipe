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
    $carpetaBiblio = './img/bibliotecaCursos/';
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
    <title>Biblioteca <?php echo $curso['nombre'] ?></title>
    <link rel="stylesheet" href="./tailwind.css">
    <link rel="icon" href="./img/psipeLogo.png">
    <?php require_once("./navbar.php"); ?>
</head>
<body>
    
    <!-- Main Container -->
    <div class="container mx-auto p-10">
        <a href="./course-view.php?idCurso=<?php echo $idCurso ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-3xl text-center">Biblioteca <?php echo $curso['nombre'] ?></h1>
        <!-- Container tablas, biblioteca, sesiones en vivo -->
        <div class="flex flex-col gap-5 mt-8 md:flex-row lg:flex-row">
            <div class="flex flex-col">
                <div class="rounded-lg p-5 flex flex-col">
                    <h1 class="text-2xl mb-3">Material</h1>
                    <ul class="list-disc list-inside">
                        <?php
                            $queryBiblioteca = "SELECT idBiblioteca FROM bibliotecaCurso WHERE idCurso = $idCurso;";
                            $resultBiblioteca = mysqli_query($conn, $queryBiblioteca);
                            $bibliotecas = mysqli_fetch_array($resultBiblioteca);
                            $idBiblioteca = $bibliotecas['idBiblioteca'];
                            $queryArchivosBiblioteca = "SELECT rutaArchivo, nombre FROM bibliotecaCursoArchivos WHERE idBiblioteca = $idBiblioteca;";
                            $resultArchivosBiblioteca = mysqli_query($conn, $queryArchivosBiblioteca);
                            while ($archivos = mysqli_fetch_array($resultArchivosBiblioteca)) {
                                echo '<a href="./download.php?file='.urlencode($archivos['rutaArchivo']).'&carpetaArchivos='.$carpetaBiblio.'" class="flex space-x-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue flex-none" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z" />
                                        </svg>
                                        <p class="flex items-center text-clip">
                                            '.$archivos['nombre'].'
                                        </p>
                                    </a>';
                            }
                            $query = "SELECT idModulo FROM modulos WHERE idCurso = $idCurso";
                            $result = mysqli_query($conn, $query);
                            while ($modulos = mysqli_fetch_array($result)) {
                                $queryMod = "SELECT idClase FROM clases WHERE idModulo = ".$modulos['idModulo']."";
                                $resultMod = mysqli_query($conn, $queryMod);
                                while ($clases = mysqli_fetch_array($resultMod)) {
                                    $queryArchivos = "SELECT nombre, rutaArchivo FROM bibliotecaClase WHERE idClase = ".$clases['idClase'].";";
                                    $resultArchivos = mysqli_query($conn, $queryArchivos);
                                    while ($archivos = mysqli_fetch_array($resultArchivos)){
                                        echo '<a href="./download.php?file='.urlencode($archivos['rutaArchivo']).'&carpetaArchivos='.$carpetaArchivos.'" class="flex space-x-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue flex-none" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z" />
                                                </svg>
                                                <p class="flex items-center text-clip">
                                                    '.$archivos['nombre'].'
                                                </p>
                                            </a>';
                                    }
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="./main.js"></script>
</body>
</html>