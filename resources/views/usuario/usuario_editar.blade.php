<x-layout.plantilla title="Editar usuario">
    <br />
    <div class="container" style="align-items: center; margin-left: 10%">
        <div class="card" style="width: 80%;">
            <div class="card-header">
                <h3>Actualiza la información de tu usuario</h3>
            </div>
            <div class="card-body">
                <form action="{{ Route('usuario_update') }}" method="post">
                    @csrf
                    <input type="hidden" name="idUsuario" value="{{ $usuario['idUsuario'] }}">
                    <input type="hidden" name="idNegocio" value="{{ $usuario['idNegocio'] }}">
                    <div style="margin-left: 45%">
                        <img src="{{ asset('imagenes/profile.png') }}" alt="Icono"  width="100px" height="100px">
                    </div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $usuario['nombre'] }}" required />
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" class="form-control" value="{{ $usuario['apellidos'] }}" required />
                    <label for="correo">Correo:</label>
                    <input type="email" name="correo" class="form-control" value="{{ $usuario['correo'] }}" required />
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" value="{{ $usuario['telefono'] }}" required />
                    <br />
                    <input type="checkbox" id="mostrarPass">
                    <label for="mostrarPass">Editar contraseña</label>
                    <br />
                    <br />
                    <div id="camposPass" style="display: none;">
                        <label for="password">Contraseña:</label>
                        <input type="text" name="password" class="form-control" />
                    </div>
                    <br />
                    <a href="{{ route('index_negocios') }}" class="btn btn-secondary">Regresar</a>
                    <button class="btn btn-warning">Editar usuario</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const mostrarPassCheckbox = document.getElementById('mostrarPass');
        const camposPass = document.getElementById('camposPass');
    
        mostrarPassCheckbox.addEventListener('change', function() {
            if (mostrarPassCheckbox.checked) {
                camposPass.style.display = 'block';
            } else {
                camposPass.style.display = 'none';
            }
        });
    </script>

</x-layout.plantilla>