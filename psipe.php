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
</head>
<body>
    <!-- Main container -->
    <div class="container mx-auto p-10">
        <h1 class="font-bold text-3xl">¿Quiénes somos?</h1>
        <p class="text-justify mt-3">
            Somos una institución privada americana comprometida con la investigación científica y formación continua de
            excelencia de profesionistas en el ámbito de la psicología, logopedia, pedagogía y neurociencias.
            Fungimos de manera activa en el campo de la intervención integral a nivel individual, grupal y familiar.
        </p>
        <h1 class="font-bold text-3xl mt-7">Misión</h1>
        <p class="text-justify mt-3">
            Brindar una experiencia educativa actualizada e integral, a partir de una oferta académica diversificada, con
            información relevante y actualizada transmitida por académicos con un alto nivel educativo y con basta
            experiencia, calificados en áreas de docencia e investigación. Comprometidos en garantizar un quehacer ético y
            de alta calidad de nuestro alumnado. <br><br>

            Formar profesionistas preparados y especializados en áreas específicas para enfrentarse de manera óptima con las
            exigencias de la vida profesional, con la capacidad de responder a las demandas del campo psíquico, educativo y
            de salud, desde una posición flexible, humanista e innovadora. ejerciendo una práctica destacable.
        </p>
        <h1 class="font-bold text-3xl mt-7">Visión</h1>
        <p class="text-justify mt-3">
            Consolidarnos como una institución educativa líder a nivel nacional e internacional en
            la transmisión del conocimiento en el área de la psicología, psicoanálisis, pedagogía,
            psicopedagogía, comunicación humana y neurociencias.
            Generar un impacto en la comunidad científica, contribuyendo en el constructo teórico en diversos campos
            relacionados con la educación y salud.
            Ser agentes activos en pro a la construcción de una sociedad inclusiva.
        </p>
        <h1 class="font-bold text-3xl mt-7">Valores</h1>
        <p class="text-justify mt-3">
            Brindar un espacio académico basado en la TOLERANCIA, RESPETO, EMPATÍA, SOLIDARIDAD Y JUSTICIA, generar
            un ambiente de DISCIPLINA, COMPROMISO Y RESPONSABILIDAD, que forje especialistas a través del ejemplo, que
            brinden un ejercicio profesional con base a la INTEGRIDAD Y CONFIANZA de sus propias habilidades y
            capacitación.
        </p>
        <h1 class="font-bold text-3xl mt-7">Filosofía</h1>
        <p class="text-justify mt-3">
            Con compromiso y lealtad a nuestros valores, a nuestros alumnos y a la sociedad, contribuiremos a que niños,
            jóvenes y adultos tengan acceso a una atención, en tanto a la educación y salud mental, de calidad; además, de
            que se desarrollen en una sociedad inclusiva, que les ayude a desarrollar sus potencialidades.
        </p>
        <h1 class="font-bold text-3xl mt-7">Clínica</h1>
        <p class="text-justify mt-3">
            Con el objetivo de contribuir en la investigación; así como en la transmisión de la importancia de la práctica
            asertiva, la investigación y el conocimiento en áreas relacionadas con la educación y salud mental; generando en
            los interesados un proceso formativo actualizado y multifacético; surge el Instituto PSIPE.<br><br>

            Comprometidos a generar un impacto social y académico. A contribuir en la formación integral (intelectual,
            académica, psicológica y social) de nuestro alumnado, permitiendo y facilitando que los profesionistas puedan
            desarrollar su máximo potencial, con el objetivo de generar un quehacer profesional ético y de calidad por medio
            de una actitud crítica e investigativa, con capacidad de mando y acción.<br><br>

            Generar espacios de estudio, difusión y capacitación para el público en general, fortaleciendo a la construcción de
            la inclusión social y familiar.<br><br>
            
            A través de la innovación en los campos de especialización, brindar nuevas aperturas y posibilidades.
            Con fiel arraigo y lealtad a nuestros valores, a través de nuestros pilares: investigación, innovación, educación y
            supervisión; fungiremos como líderes en el campo.
        </p>
    </div>
    <!-- WhatsApp Button -->
    <div class="container mx-auto">
        <a href="https://wa.me/<?php echo $numero?>" class="fixed w-12 h-12 bg-psipeBlue bottom-5 right-5 rounded-full flex justify-center items-center z-10 shadow-lg shadow-slate-500 hover:-translate-y-1 hover:shadow-md hover:shadow-slate-500 duration-300" target="_blank">
            <svg role="img" viewBox="0 0 24 24" class="h-7 w-7" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
        </a>
    </div>
    <script src="./main.js"></script>
    <?php require_once("./footer.php"); ?>
</body>
</html>