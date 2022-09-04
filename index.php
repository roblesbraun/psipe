<?php
    include('./manage/connection.php');
    session_start();
    //Logout
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: login.php");
    }
    //Obtenemos el numero de contacto
    $queryInicial = "SELECT numero FROM contacto limit 1;";
    $result = mysqli_query($conn, $queryInicial);
    $resultArray = mysqli_fetch_array($result);
    $numero = $resultArray['numero'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psipe</title>
    <link rel="stylesheet" href="./tailwind.css">
    <link rel="icon" href="./img/psipeLogo.png">
    <?php require_once("./navbar.php"); ?>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" />
</head>
<body>
    <!-- Carousel -->
    <div id="default-carousel" class="relative" data-carousel="slide">
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <?php
                $queryIm = "SELECT idImagen, rutaImagen FROM carruselHome ORDER BY idImagen;";
                $resultIm = mysqli_query($conn, $queryIm);
                $rows = mysqli_num_rows($resultIm);
                if (mysqli_num_rows($resultIm) > 0) {
                    while ($imagen = mysqli_fetch_array($resultIm)){
                        echo '
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="./img/carruselHome/'.$imagen['rutaImagen'].'" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            ';
                    }
                }
            ?>
        </div>
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <?php
                for ($i = 0; $i < $rows; $i++) { 
                    if ($i == 0) {
                        echo '<button type="button" class="w-3 h-3 rounded-full bg-white dark:bg-gray-800" aria-current="true" aria-label="Slide '.($rows + 1).'" data-carousel-slide-to="'.$rows.'"></button>';
                    } else {
                        echo '<button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide '.($rows + 1).'" data-carousel-slide-to="'.$rows.'"></button>';
                    }
                }
            ?>
        </div>
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev="">
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next="">
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <!-- Main container -->
    <div class="container mx-auto py-10 px-16">
        <h1 class="font-bold text-3xl">Conócenos</h1>
        <p class="text-justify mt-3">
            Somos una institución privada latinoamericana conformada por
            especialistas en diversas disciplinas, cuyo compromiso central
            es garantizar la calidad del ejercicio profesional en lo
            relacionado a la salud mental y educación; buscando contribuir
            en la investigación científica y formación de especialistas a
            través de la educación continua y superior en áreas de
            <a href="./psicologia.php" class="font-bold">psicología</a>, <a href="./psicoanalisis.php" class="font-bold">psicoanálisis</a>, <a href="./pedagogia.php" class="font-bold">pedagogía</a>, <a href="./logopedia.php" class="font-bold">logopedia</a> y
            <a href="./neurociencias.php" class="font-bold">neurociencias</a>. <br><br>
            Por medio de la innovación en los campos de especialización,
            brindaremos nuevas aperturas y posibilidades, generando un
            enfoque académico multifacético, además de un proceso
            formativo integral (intelectual, académico, psicológico y social)
            enfocado en desarrollar el máximo potencial de nuestro
            alumnado, fomentando una práctica de excelencia que destaque
            por el ejercicio ético, crítico e investigativo; denotando una alta
            capacidad de mando y acción.
        </p>
        <h1 class="font-bold text-3xl mt-7">Nuestros Pilares</h1>
        <ul class="list-disc list-inside mt-3">
            <li>Investigación</li>
            <li>Innovación</li>
            <li>Educación</li>
            <li>Supervisión</li>
        </ul>
        <h1 class="font-bold text-3xl mt-7">Nuestros Ponentes</h1>
        <div class="mt-3">
            <div class="relative w-full flex gap-6 snap-x snap-proximity overflow-x-auto pb-8">
                <div class="snap-center shrink-0 first:pl-8 last:pr-8">
                    <img src="./img/docentes.jpg" class="shrink-0 h-44 md:h-80 lg:h-96 rounded-lg shadow-xl">
                    <h1 class="text-center">Ponente 1</h1>
                </div>
                <div class="snap-center shrink-0 first:pl-8 last:pr-8">
                    <img src="./img/docentes.jpg" class="shrink-0 h-44 md:h-80 lg:h-96 rounded-lg shadow-xl">
                    <h1 class="text-center">Ponente 2</h1>
                </div>
                <div class="snap-center shrink-0 first:pl-8 last:pr-8">
                    <img src="./img/docentes.jpg" class="shrink-0 h-44 md:h-80 lg:h-96 rounded-lg shadow-xl">
                    <h1 class="text-center">Ponente 3</h1>
                </div>
            </div>
        </div>
    </div>          
    <!-- WhatsApp Button -->
    <div class="container mx-auto">
        <a href="https://wa.me/<?php echo $numero?>" class="fixed w-12 h-12 bg-psipeBlue bottom-5 right-5 rounded-full flex justify-center items-center z-10 shadow-lg shadow-slate-500 hover:-translate-y-1 hover:shadow-md hover:shadow-slate-500 duration-300" target="_blank">
            <svg role="img" viewBox="0 0 24 24" class="h-7 w-7" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
        </a>
    </div>
    <script src="./main.js"></script>
    <?php require_once("./footer.php"); ?>
    <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
</body>
</html>