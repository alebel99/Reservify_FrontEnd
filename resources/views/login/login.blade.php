<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body style="background-color: rgba(240, 248, 255, 0.945)">
    <div style="position: absolute" class="justify-content-center">
        <br />
        <br />
        <br />
        <br />
        <div style="position: absolute">
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <img src="{{ asset('imagenes/reservify.png') }}" alt="Icono" class="text-center" width="200px" height="70px" style="margin-left: 425%; margin-bottom: 20px; border-radius: 60px">
        </div>
        <div style="margin-left: 50px; border-bottom: 2px solid gray">
            <h1 style="padding: 20px"><b>¡Únete a miles de clientes que usan Resevify para reservar en restaurantes y otros comercios!</b></h1>
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <img src="{{ asset('imagenes/login.png') }}" alt="Icono" class="text-center" width="450px" height="450px" style="margin-right: 10%; margin-bottom: 20px; border-radius: 60px">

        <div class="card p-4" style="width: 350px">
            @if ($mensaje = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $mensaje }}
                </div>
            @endif
            @if ($mensaje = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $mensaje }}
                </div>
            @endif
            @if ($mensaje = Session::get('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ $mensaje }}
                </div>
            @endif

            <form method="POST" action="{{ route('auth') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo:</label>
                    <input type="email" id="email" name="email" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-secondary">Iniciar sesión</button>
                </div>

                <div class="mb-3 text-center">
                    <a class="btn btn-success" href="{{ Route('register') }}">Registrarse</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>