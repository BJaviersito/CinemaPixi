<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Capi.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">


    <title>Perfiles</title>
</head>

<body>

    <x-app-layout>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Crea tu Perfil") }}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <div class="container">
        <h1>¿Quién está viendo ahora?</h1>

        <div class="card-users">
            <div class="card">
                <a href="#">
                    <img src="img/rei.jpg">
                    <p>Walter</p>
                </a>
            </div>

            <div class="card-users2">
                <div class="card">
                    <a href="#">
                        <img src="img/5fb80e34333482d9548ba960f70f5926.jpg">
                        <p>Javier</p>
                    </a>
                </div>

            <div class="card">
                <a href="">
                    <img src="img/perfil02.png">
                    Infantil
                </a>
            </div>

            <div class="card">
                <a href="/Home">
                    <img src="img/perfil03.png">
                    Agregar perfil
                </a>
            </div>
        </div>
    </div>
</body>

</html>