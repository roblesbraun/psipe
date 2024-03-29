<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="./tailwind.css">
</head>
<body>
    <footer class="shadow-lg bg-psipeGreen">
        <div class="flex flex-col sm:flex-row md:flex-row lg:flex-row justify-around items-cente py-3">
            <div class="my-4">
                <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                    <img src="./img/psipeLogo.png" alt="Logo de Psipe" class="w-12">
                    <span class="ml-3 text-xl">Psipe</span>
                </a>
            </div>
            <div class="flex flex-col my-4 text-center">
                <a href="./index.php" class="hover:text-slate-50 duration-300">Inicio</a>
                <a href="./psipe.php" class="hover:text-slate-50 duration-300">Psipe</a>
                <a href="./clinica.php" class="hover:text-slate-50 duration-300">Clínica</a>
                <a href="./formacion.php" class="hover:text-slate-50 duration-300">Formación</a>
            </div>
            <div class="flex flex-col my-4 text-center">
                <a href="./supervision.php" class="hover:text-slate-50 duration-300">Supervisión</a>
                <a href="./docentes.php" class="hover:text-slate-50 duration-300">Docentes</a>
                <a href="./contacto.php" class="hover:text-slate-50 duration-300">Contacto</a>
            </div>
        </div>
        <div class="flex justify-between items-center sm:flex-row flex-col">
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:py-2 sm:mt-0">
                © 2022 Instituto Psipe
            </p>
            <div class="flex p-4">
                <a href="https://www.facebook.com/pages/category/Education/Instituto-Psipe-100395431666801/" class="text-gray-500 hover:animate-bounce">
                    <svg fill="#1877F2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>Facebook</title>
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
                <!-- <a href="https://www.youtube.com/c/AnimeBassTabs" class="ml-3 text-gray-500 hover:animate-bounce">
                    <svg fill="#FF0000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>YouTube</title>
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
                <a href="https://open.spotify.com/playlist/0YvkHxXwqqbmJh2pWlq9Od?si=4Smp4u_7RhWPnTHDBqMB3Q&nd=1" class="ml-3 text-gray-500 hover:animate-bounce">
                    <svg fill="#1DB954" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>Spotify</title>
                        <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                    </svg>
                </a>
                <a href="https://twitter.com/animebasstabs" class="ml-3 text-gray-500 hover:animate-bounce">
                    <svg fill="#1DA1F2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>Twitter</title>
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>
                </a> -->
                <a href="https://www.instagram.com/institutopsipe/" class="ml-3 text-gray-500 hover:animate-bounce">
                    <img src="./img/instagram.png" alt="Instagram Logo" class="w-5 h-5">
                </a>
            </div>
        </div>
    </footer>
</body>
</html>