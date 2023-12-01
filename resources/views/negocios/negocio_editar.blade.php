<x-layout.plantilla title="Editar negocio">
    <br />
    <div class="container" style="align-items: center">
        <div class="card" style="width: w-100;">
            <div class="card-header">
                <h3>Actualiza el formulario</h3>
            </div>
            @php
                $usuario = session('usuario');

                $horaApertura = $negocio['horaApertura'];
                $horaCierre = $negocio['horaCierre'];
                $horaAperturaFormateada = sprintf("%02d:00", $horaApertura); // HH:mm
                $horaCierreFormateada = sprintf("%02d:00", $horaCierre); // HH:mm
            @endphp
            <div class="card-body">
                <form action="{{ route('update_negocio') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="idNegocio" value="{{ $negocio['idNegocio'] }}">
                    <label for="categoria">Categoría:</label>
                    <input type="text" name="categoria" class="form-control" value="{{ $negocio['categoria'] }}" required />
                    <br />
                    <label for="nombre">Nombre del negocio:</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $negocio['nombre'] }}" required />
                    <br />
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" class="form-control" value="{{ $negocio['direccion'] }}" required />
                    <br />
                    <label for="horaApertura">Hora de apertura:</label>
                    <input type="time" name="horaApertura" class="form-control" value="{{ $horaAperturaFormateada }}" required />
                    <br />
                    <label for="horaCierre">Hora de cierre:</label>
                    <input type="time" name="horaCierre" class="form-control" value="{{ $horaCierreFormateada }}" required />
                    <br />
                    <label for="descripcion">Descripción:</label>
                    <input type="text" name="descripcion" class="form-control" value="{{ $negocio['descripcion'] }}" required />
                    <br />
                    <input type="checkbox" id="mostrarFoto">
                    <label for="mostrarFoto">Editar foto del negocio</label>
                    <br />
                    <br />
                    <div id="camposFoto" style="display: none;">
                        <label for="foto">Foto del negocio:</label>
                        <input type="file" name="foto" class="form-control" accept="image/*" />
                    </div>
                    <br />
                    <a href="{{ route('citas_negocio', $negocio['idNegocio']) }}" class="btn btn-secondary">Regresar</a>
                    <button class="btn btn-warning">Editar negocio</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const mostrarFotoCheckbox = document.getElementById('mostrarFoto');
        const camposFoto = document.getElementById('camposFoto');
    
        mostrarFotoCheckbox.addEventListener('change', function() {
            if (mostrarFotoCheckbox.checked) {
                camposFoto.style.display = 'block';
            } else {
                camposFoto.style.display = 'none';
            }
        });
    </script>

</x-layout.plantilla>