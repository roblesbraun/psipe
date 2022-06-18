<?php
    include('connection.php');
    session_start();
    if (!(isset($_SESSION["login"]))) {
        header("Location: login.php");
    }
    // else {
    //     echo $_SESSION["login"];
    // }
    //Logout
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: login.php");
    }
    $user = '';
    $mailUser = '';
    $passwordUser = '';
    //Agregar un usuario
    if(isset($_POST['submit'])){
        $idUsuario = $_POST['idUsuario'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $newPassword = $_POST['newPassword'];
        if ($newPassword != '') {
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            $query = "UPDATE usuarios SET correo = '$correo', password = '$hash' WHERE id_usuario = $idUsuario";
            $result = mysqli_query($conn, $query);
        }
        else {
            $query = "UPDATE usuarios SET correo = '$correo' WHERE id_usuario = $idUsuario";
            $result = mysqli_query($conn, $query);
        }
    }
    //Traer datos del usuario a editar
    if(isset($_POST['editar'])){
        $user = $_POST['idUsuario'];
        $query = "SELECT * FROM usuarios WHERE id_usuario = $user;";
        $result = mysqli_query($conn, $query);
        $infoUser = mysqli_fetch_array($result);
        $mailUser = $infoUser['correo'];
        $passwordUser = $infoUser['password'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../tailwind.css">
    <link rel="icon" href="../img/psipeLogo.png">
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
                    <form action="" method="post" class="m-0">
                        <div>
                            <button type="submit" name="logout" class="rounded p-2 hover:bg-gray-300 transition duration-500 text-black flex items-center justify-center">Cerrar Sesión</button>
                        </div>
                    </form>
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
            <a href="./dashboard.php" class="text-center block rounded hover:bg-gray-300 py-2 px-2 duration-500 text-black">Dashboard</a>
            <div class="block rounded hover:bg-gray-300">
                <form action="" method="post" class="flex items-center justify-center m-0">
                    <button type="submit" name="logout" class="text-center block rounded hover:bg-gray-300 py-2 duration-500 text-black">Cerrar Sesión</button>
                </form>
            </div>
            <!-- <form action="" method="post" class="flex items-center justify-center">
                <div class="block rounded hover:bg-gray-300 bg">
                    <button type="submit" name="logout" class="text-center block rounded hover:bg-gray-300 py-2 px-2 duration-500 text-black">Cerrar Sesión</button>
                </div>
            </form> -->
        </div>
    </nav>
    <!-- Fin de navbar -->
    <div class="container mx-auto p-10">
        <a href="./manage-users.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-psipeBlue" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
            </svg>
        </a>
        <h1 class="text-2xl text-center mb-5">Administración de Usuarios</h1>
        <!-- FORM -->
        <form action="" method="post" class="mb-6">
            <input type="hidden" name="idUsuario" value="<?php echo $user ?>">
            <div class="mb-6">
                <label for="correo" class="block mb-2 text-sm font-medium text-psipeGray" required="">Correo</label>
                <input type="email" name="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required="" value="<?php echo $mailUser ?>">
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-psipeGray">Contraseña</label>
                <input type="text" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required="" value="<?php echo $passwordUser ?>">
            </div>
            <div class="mb-6">
                <label for="newPassword" class="block mb-2 text-sm font-medium text-psipeGray">Nueva Contraseña (solo llenar este campo si se desea cambiar la contraseña)</label>
                <input type="text" name="newPassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
            </div>
            <div class="flex justify-center space-x-3">
                <button type="submit" name="submit" class="text-white bg-psipeBlue hover:bg-psipeGreen font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Editar</button>
            </div>
        </form>
        <!-- Despliegue de archivos actuales de tal clase para poder eliminarlos -->
        <p class="text-lg text-center font-bold m-5">Usuarios</p>
        <input type="text" id="myInput" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" onkeyup="myFunction()" placeholder="Busca el correo...">
        <table class="rounded-t-lg m-5 mx-auto bg-gray-200 text-gray-800 w-full" id="myTable">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-5">ID</th>
                <th class="px-4 py-5">Correo</th>
                <th class="px-4 py-5 text-center">Editar</th>
            </tr>
            <?php
                $query = "SELECT id_usuario, correo FROM usuarios;";
                $result = mysqli_query($conn, $query);
                while ($usuario = mysqli_fetch_array($result)){
                    echo '<tr class="bg-gray-100 border-b border-gray-200">';
                        echo '<td class="px-4 py-5">'.$usuario['id_usuario'].'</td>';
                        echo '<td class="px-4 py-5">'.$usuario['correo'].'</td>';
                        echo '<td class="px-4 py-5 text-center">
                                <form method="post">
                                    <input type="hidden" name="idUsuario" value="'.$usuario['id_usuario'].'">
                                    <button type="submit" name="editar" class="text-white bg-psipeBlue rounded-lg text-sm w-full sm:w-auto p-2 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </div>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }
    </script>
    <!-- <script src="../main.js"></script> -->
</body>
</html>