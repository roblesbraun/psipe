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
    <title>Psicología</title>
    <link rel="stylesheet" href="./tailwind.css">
    <link rel="icon" href="./img/psipeLogo.png">
    <?php require_once("./navbar.php"); ?>
</head>
<body>
    <!-- Main Container -->
    <img src="https://bl6pap003files.storage.live.com/y4mCcpDXztZ9AAXrfD3tL-fbXlsM7FcIKRcipeO8wZrbPqRrdJN4VSoelVOHW9YXAoH7cPOIidLC7H9EKsfsdX07pWBoq0_4mTV0PqddqfWdH5kDBTvvBfmbLrDbEMAvkDRWCbl_gi4dUgMnXrDsXpLyqEHYPfG7FTdpVU80NsA7J5qUbUa5dY62iZBnEba-JgbkvQUcPJYWMsePmDHh8KIYA/7.%20Psicolog%C3%ADa.png?psid=1&width=2880&height=1330" alt="Logo instituto Psipe" class="h-96 w-full">
    <div class="container mx-auto p-10">
        <div class="mt-7">
            <blockquote class="relative">
                <svg class="absolute top-0 left-0 transform -translate-x-6 -translate-y-8 h-16 w-16 text-gray-300 width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M7.39762 10.3C7.39762 11.0733 7.14888 11.7 6.6514 12.18C6.15392 12.6333 5.52552 12.86 4.76621 12.86C3.84979 12.86 3.09047 12.5533 2.48825 11.94C1.91222 11.3266 1.62421 10.4467 1.62421 9.29999C1.62421 8.07332 1.96459 6.87332 2.64535 5.69999C3.35231 4.49999 4.33418 3.55332 5.59098 2.85999L6.4943 4.25999C5.81354 4.73999 5.26369 5.27332 4.84476 5.85999C4.45201 6.44666 4.19017 7.12666 4.05926 7.89999C4.29491 7.79332 4.56983 7.73999 4.88403 7.73999C5.61716 7.73999 6.21938 7.97999 6.69067 8.45999C7.16197 8.93999 7.39762 9.55333 7.39762 10.3ZM14.6242 10.3C14.6242 11.0733 14.3755 11.7 13.878 12.18C13.3805 12.6333 12.7521 12.86 11.9928 12.86C11.0764 12.86 10.3171 12.5533 9.71484 11.94C9.13881 11.3266 8.85079 10.4467 8.85079 9.29999C8.85079 8.07332 9.19117 6.87332 9.87194 5.69999C10.5789 4.49999 11.5608 3.55332 12.8176 2.85999L13.7209 4.25999C13.0401 4.73999 12.4903 5.27332 12.0713 5.85999C11.6786 6.44666 11.4168 7.12666 11.2858 7.89999C11.5215 7.79332 11.7964 7.73999 12.1106 7.73999C12.8437 7.73999 13.446 7.97999 13.9173 8.45999C14.3886 8.93999 14.6242 9.55333 14.6242 10.3Z" fill="currentColor"/>
                </svg>
                
                <div class="relative z-10">
                    <p class="text-purple-800 sm:text-xl"><em>
                        “Todas las personas hablan de la mente sin titubear, pero se quedan perplejos cuando les piden que la definan” - B.F. Skinner.
                    </p></em>
                </div>
            </blockquote>
        </div>
        <h1 class="font-bold text-2xl text-psipeBlue mt-7">Psicología</span></h1>
        <p class="text-justify mt-3">
            La psicología se compone de una vasta variedad de enfoques, todos relacionados
            entre sí por mantener un campo de estudio y acción relacionado con los aspectos
            biológicos, sociales y culturales que influyen en el desarrollo y expresión integral
            de un ser humano, considerando la complejidad de la estructura psíquica;
            generando metodologías teóricas y de abordaje tanto a nivel individual, como
            grupal y social. <br><br>

            La psicología nos provee de armas que nos permiten propiciar y mejorar la salud
            mental de la población, y de manera consecuente, la calidad de vida; y aunque
            esta área, la clínica, es una de las principales y más conocidas, existe una amplia
            gama de ramas; entre las cuales mencionamos, de manera enunciativa pero no
            limitativa: la experimental, biológica, social, comunitaria, del deporte, educativa,
            <a href="./psicopedagogia.php" class="text-blue-400 underline">psicopedagógica</a>, del desarrollo, forense, de marketing, organizacional, la
            sexología, neuropsicología; y como se mencionó a inicios de párrafo, de la salud y
            clínica; esta última, a su vez, se conforma por diversas corrientes, las cuáles
            suelen requerir de amplios procesos de capacitación considerando elementos
            como: el diagnóstico, ciclo vital y tipo de enfoque (individual, familiar o grupal). <br><br>
            
            La psicología como ciencia tiene apenas, poco más de 140 años; por su puesto, a
            pesar de, en comparativa con otras ciencias, ser relativamente nueva, se ha
            mantenido en un proceso constante de evolución; por una parte a consecuencia 
            de la labor investigativa y de análisis de diversos autores; y por otra, por el
            dinamismo y crecimiento que ha mantenido de manera paralela al desarrollo,
            variación y transformación de las necesidades y expresiones humanas y sociales.
        </p>
    </div>

    <!-- WhatsApp Button -->
    <div class="container mx-auto p-10">
        <a href="https://wa.me/<?php echo $numero?>" class="fixed w-12 h-12 bg-psipeBlue bottom-5 right-5 rounded-full flex justify-center items-center z-10 shadow-lg shadow-slate-500 hover:-translate-y-1 hover:shadow-md hover:shadow-slate-500 duration-300" target="_blank">
            <svg role="img" viewBox="0 0 24 24" class="h-7 w-7" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
        </a>
    </div>
    <script src="./main.js"></script>
    <?php require_once("./footer.php"); ?>
</body>
</html>