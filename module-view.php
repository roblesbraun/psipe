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
    $idModulo = $_GET['idModulo'];
    $query = "SELECT * FROM modulos WHERE idModulo = $idModulo";
    $result = mysqli_query($conn, $query);
    $modulo = mysqli_fetch_array($result);
    $idCurso = $modulo['idCurso'];
    $query = "SELECT nombre FROM cursos WHERE idCurso = $idCurso";
    $result = mysqli_query($conn, $query);
    $curso = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./tailwind.css">
    <?php require_once("./navbar.php"); ?>
</head>
<body>

    <!-- Main container -->
    <div class="container mx-auto p-10">
        <a href="./course-view.php?idCurso=<?php echo $idCurso ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-3xl text-psipeDarkGray mb-7 text-center"><?php echo $curso['nombre'] ?></h1>
        <h1 class="text-2xl text-psipeGreen mb-7"><?php echo $modulo['nombre'] ?></h1>
        <!-- Container clases -->
        <div class="grid grid-cols-3 gap-7">
            <?php
                $query = "SELECT idClase, nombre FROM clases WHERE idModulo = $idModulo";
                $result = mysqli_query($conn, $query);
                while ($clases = mysqli_fetch_array($result)) {
                    echo '<a href="./class-view.php?idClase='.$clases['idClase'].'" class="bg-psipeGreen text-xl p-3 rounded-lg text-center">'.$clases['nombre'].'</a>';
                }
            ?>
        </div>
    </div>
    <script src="./main.js" ></script>
</body>
</html>