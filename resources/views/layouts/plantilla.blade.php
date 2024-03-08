<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('titulo')</title>
    <style>
        .container {
            max-width: 100%; /* Ancho máximo del contenido */
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        img{
    width: 200px; /* Ancho deseado */
    height: auto; /* Para mantener la proporción de aspecto */
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

    </div>

    <footer class="fixed-bottom bg-dark text-white text-center py-2">©CholloOfertas 2024</footer>
</body>
</html>
