<?php
    include('./manage/connection.php');
    session_start();
    //Logout
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: login.php");
    }
    $carpetaArchivos = './img/bibliotecaCursos/';
    $idBiblioteca = $_GET['idBiblioteca'];
    $idCurso = $_GET['idCurso'];
    //Obtenemos el nombre del curso
    $query = "SELECT * FROM cursos WHERE idCurso = $idCurso";
    $result = mysqli_query($conn, $query);
    $curso = mysqli_fetch_array($result);
    $nombreCurso = $curso['nombre'];
    //Obtenemos nombre de biblioteca de curso
    $query = "SELECT * FROM bibliotecaCurso WHERE idBiblioteca = $idBiblioteca";
    $result = mysqli_query($conn, $query);
    $biblioteca = mysqli_fetch_array($result);
    $nombreBiblioteca = $biblioteca['nombre'];
    //Archivos de la bilioteca
    $query = "SELECT * FROM bibliotecaCursoArchivos WHERE idBiblioteca = $idBiblioteca";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Curso</title>
    <link rel="stylesheet" href="./tailwind.css">
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
        <h1 class="text-3xl text-center mb-7"><?php echo $nombreCurso ?></h1>
        <h1 class="text-xl mb-7"><?php echo $nombreBiblioteca ?></h1>
        <ul class="list-disc list-inside">
            <?php
                while ($archivos = mysqli_fetch_array($result)){
                    echo '<li class="mb-3"><a href="./download.php?file='.urlencode($archivos['rutaArchivo']).'&carpetaArchivos='.$carpetaArchivos.'" class="text-lg underline decoration-transparent decoration-2 hover:decoration-psipeBlue">'.$archivos['nombre'].'</a></li>';
                }
            ?>
        </ul>
    </div>
    <script src="./main.js"></script>
</body>
</html>