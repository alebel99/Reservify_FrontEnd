<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body style="background-color: rgb(117, 117, 117)">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <img src="{{ asset('imagenes/logo.jpg') }}" alt="Icono" class="text-center" width="350px" height="350px" style="margin-right: 50px; border-radius: 60px">

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
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
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