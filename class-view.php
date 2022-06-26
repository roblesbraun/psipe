<?php
    include('./manage/connection.php');
    session_start();
    //Logout
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: login.php");
    }
    $carpetaArchivos = './img/bibliotecaClase/';
    $idClase = $_GET['idClase'];
    $query = "SELECT * FROM clases WHERE idClase = $idClase";
    $result = mysqli_query($conn, $query);
    $clase = mysqli_fetch_array($result);
    $idModulo = $clase['idModulo'];
    //Nombre del Modulo
    $queryModulo = "SELECT nombre, idCurso FROM modulos WHERE idModulo = ".$clase['idModulo'].";";
    $resultModulo = mysqli_query($conn, $queryModulo);
    $modulo = mysqli_fetch_array($resultModulo);
    //Nombre del curso
    $queryCurso = "SELECT nombre FROM cursos WHERE idCurso = ".$modulo['idCurso'].";";
    $resultCurso = mysqli_query($conn, $queryCurso);
    $curso = mysqli_fetch_array($resultCurso);
    //Archivos de bilioteca de clase
    $query = "SELECT nombre, rutaArchivo FROM bibliotecaClase WHERE idClase = $idClase";
    $result = mysqli_query($conn, $query);
    //Imagenes de clase, si es que las hay
    $query = "SELECT rutaImagen FROM carruselClase WHERE idClase = $idClase";
    $resultImagenes = mysqli_query($conn, $query);
    //Videos de clase, si es que las hay
    $query = "SELECT nombre, link FROM videosClase WHERE idClase = $idClase";
    $resultVideos = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $clase['nombre'] ?></title>
    <link rel="stylesheet" href="./tailwind.css">
    <?php require_once("./navbar.php"); ?>
</head>
<body>
    <!-- Main container -->
    <div class="container mx-auto p-10">
        <a href="./module-view.php?idModulo=<?php echo $idModulo ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-3xl text-psipeDarkGray mb-7 text-center"><?php echo $curso['nombre'] ?></h1>
        <h1 class="text-2xl text-psipeBlue mb-2">Modulo: <?php echo $modulo['nombre'] ?></h1>
        <h1 class="text-xl mb-7"><?php echo $clase['nombre'] ?></h1>
        <p class="mb-3"><?php echo $clase['instrucciones'] ?></p>
        <!-- Container video y biblioteca -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 gap-7 mb-5">
            <div>
                <!-- <h1 class="text-xl text-psipeBlue">Vídeo de la Sesión</h1> -->
                <iframe class="w-full h-44 md:h-80 lg:h-96 rounded-lg" src="<?php echo $clase['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="bg-psipeGreen rounded-lg p-4">
                <h1 class="text-2xl mb-3">Biblioteca de Clase</h1>
                <?php
                    while ($archivos = mysqli_fetch_array($result)){
                        echo '<a href="./download.php?file='.urlencode($archivos['rutaArchivo']).'&carpetaArchivos='.$carpetaArchivos.'">
                                <p class="flex items-center space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z" />
                                    </svg>
                                    <span>'.$archivos['nombre'].'</span>
                                </p>
                            </a>';
                    }
                ?>
            </div>
            <div>
                <h1 class="text-xl text-psipeBlue">Presentación</h1>
                <iframe src="<?php echo $clase['presentacion'] ?>" frameborder="0" class="w-full h-48 md:h-80 lg:h-96 rounded-lg" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
            </div>
            <div class="">
                <?php
                    if (mysqli_num_rows($resultImagenes)>0) {
                        // echo '<div class="flex flex-nowrap overflow-scroll overflow-y-hidden space-x-7 snap-mandatory snap-x">';
                        echo '<div class="relative w-full flex gap-6 snap-x snap-proximity overflow-x-auto pb-8">';
                        while ($imagenes = mysqli_fetch_array($resultImagenes)){
                            echo '<div class="snap-center shrink-0 first:pl-8 last:pr-8">';
                                echo '<img src="./img/carruselClase/'.$imagenes['rutaImagen'].'" class="shrink-0 h-44 md:h-80 lg:h-96 rounded-lg shadow-xl">';
                            echo '</div>';
                        }
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
        <?php
            if (mysqli_num_rows($resultVideos)>0) {
                echo '<h1 class="text-xl text-center text-psipeBlue mt-10">Videos de Clase</h1>';
                echo '<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">';
                while ($videos = mysqli_fetch_array($resultVideos)){
                    echo '<div>';
                        echo '<h1 class="text-lg text-center mt-10">'.$videos['nombre'].'</h1>';
                        echo '<iframe class="w-full h-44 md:h-80 lg:h-96 rounded-lg" src="'.$videos['link'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                    echo '</div>';
                }
                echo '</div>';
            }
        ?>
        <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <div>
                <h1>Video</h1>
                <iframe src="https://www.youtube.com/embed/_e0C4XZq1XA" class="w-full h-80 rounded-lg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div>
                <h1>Video</h1>
                <iframe src="https://www.youtube.com/embed/_e0C4XZq1XA" class="w-full h-80 rounded-lg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div> -->
        <!-- <iframe src="https://www.youtube.com/embed/_e0C4XZq1XA" class="w-1/2 md:w-full rounded-lg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
    </div>
    <script src="./main.js" ></script>
</body>
</html>