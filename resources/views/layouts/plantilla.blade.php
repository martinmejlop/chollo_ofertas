<!DOCTYPE html>
<html lang="es">

<head>
     <!-- Aquí está la librería de bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <!-- Fonts -->
 <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600; 700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>


</head>

<body>
    <div class="container">
        <p class="p-2 bg-primary text-white">Chollo ░▒▓ Ofertas</p>
        <nav>
            <!-- AQUÍ TENÉIS QUE INCLUIR EL MENÚ DE NAVEGACIÓN -->
            @include('partials.nav')

        </nav>
        @yield('contenido')

        <!-- AQUÍ MOSTRAR LOS ERRORES -->

        @if (session('mensaje'))
            <div class='alert alert-success'>
                {{ session('mensaje') }}
            </div>
        @endif



    </div>
</body>
</html>
