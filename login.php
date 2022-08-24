<?php
    include('./manage/connection.php');
    session_start();
    if ((isset($_SESSION["login"]))) {
        echo $_SESSION["login"];
    }
    $errorMessage = '';
    //Iniciar sesión
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM usuarios WHERE correo = '$email';";
        $result = mysqli_query($conn, $query);
        $userInfo = mysqli_fetch_array($result);
        if ($userInfo) {
            //Unhash password and autenticate the user
            $hashedPassword = $userInfo['password'];
            $verify = password_verify($password, $hashedPassword);
            if ($userInfo['correo'] == $email and $verify) {
                $_SESSION["login"] = 1;
                $_SESSION["idUser"] = $userInfo['id_usuario'];
                header("Location: index.php");
            }
            else {
                $errorMessage = 'Correo y/o contraseña incorrectos.';
            }
        }
        else {
            $errorMessage = 'Tu cuenta aún no ha sido registrada.';
        }
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
    <title>Log In</title>
    <link rel="stylesheet" href="./tailwind.css">
    <link rel="icon" href="./img/psipeLogo.png">
    <?php require_once("./navbar.php"); ?>
</head>
<body>
    <div class="bg-cover bg-center w-full h-56 md:h-96 lg:h-96" style="background-image: url('./img/lenguaje.webp');"></div>
    <!-- component -->
    <form action="" method="post">
        <div class="flex min-h-screen items-center justify-center">
            <div class="min-h-1/2 border border-psipeBlue rounded-2xl shadow-lg shadow-gray-400">
                <div class="mx-4 sm:mx-24 md:mx-34 lg:mx-56 flex items-center space-y-4 py-16 font-semibold text-black flex-col">
                    <img src="./img/psipeLogo.png" class="w-25 h-20" alt="Logo Psipe">
                    <h1 class="text-psipeBlue text-2xl">Inicia sesión en Psipe</h1>
                    <input class="w-full p-2 rounded-md border border-psipeGray focus:border-psipeBlue" placeholder="Correo" type="email" name="email" id="">
                    <input class="w-full p-2 rounded-md border border-psipeGray " placeholder="Contraseña" type="password" name="password" id="">
                    <button class="w-full p-2 bg-gray-50 rounded-full font-bold text-psipeBlue border border-psipeBlue" type="submit" name="submit" id="">Iniciar Sesión</button>
                    <?php
                        if ($errorMessage != '') {
                            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">'.$errorMessage.'</strong>
                                </div>';
                        }
                    ?>
                    <p>¿Tu cuenta aun no funciona?</p>
                    <a class="font-semibold text-sky-700" href="https://wa.me/525569158438">Contacta a tu colaborador favorito!</a>
                </div>
            </div>
        </div>
    </form>
    <div class="container mx-auto p-10">
        <a href="https://wa.me/<?php echo $numero?>" class="fixed w-12 h-12 bg-psipeBlue bottom-5 right-5 rounded-full flex justify-center items-center z-10 shadow-lg shadow-slate-500 hover:-translate-y-1 hover:shadow-md hover:shadow-slate-500 duration-300" target="_blank">
            <svg role="img" viewBox="0 0 24 24" class="h-7 w-7" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
        </a>
    </div>
    <script src="./main.js"></script>
    <?php require_once("./footer.php"); ?>
</body>
</html>