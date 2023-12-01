<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservify - {{ $title ?? '' }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <style>
            input[type=time]::-webkit-datetime-edit-ampm-field {
                display: none;
            }
        </style>
    </head>
    @php
        $usuario = session('usuario');
        $negocio = session('negocio')
    @endphp
    <body style="background-color: rgb(117, 117, 117)">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Reservify
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('index_negocios') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success" href="{{ Route('usuario_editar', $usuario)}}">Mi usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info" href="{{ Route('ver_citas_usuario', $usuario) }}">Mis citas</a>
                        </li>
                        @if ($negocio == 0)
                            <li class="nav-item">
                                <a class="nav-link text-success" href="{{ Route('negocios.create') }}">Crear negocio</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-warning" href="{{ route('citas_negocio', $negocio) }}">Mi negocio</a>
                            </li>
                        @endif
                    </ul>
                    <div class="ms-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="{{ Route('index') }}">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>        

        <div class="container fluid">
            {{ $slot }}
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>