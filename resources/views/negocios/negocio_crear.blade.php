<x-layout.plantilla title="Crear negocio">
    <br />
    <div class="container" style="align-items: center">
        <div class="card" style="width: w-100;">
            <div class="card-header">
                <h3>Rellena el formulario</h3>
            </div>
            @php
                $usuario = session('usuario');
            @endphp
            <div class="card-body">
                <form action="{{ route('negocios.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="idNegocio" value="">
                    <input type="hidden" name="idUsuario" value="{{ $usuario }}"/>
                    <label for="categoria">Categoría:</label>
                    <input type="text" name="categoria" class="form-control" required />
                    <br />
                    <label for="nombre">Nombre del negocio:</label>
                    <input type="text" name="nombre" class="form-control" required />
                    <br />
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" class="form-control" required />
                    <br />
                    <label for="horaApertura">Hora de apertura:</label>
                    <input type="time" name="horaApertura" class="form-control" required />
                    <br />
                    <label for="horaCierre">Hora de cierre:</label>
                    <input type="time" name="horaCierre" class="form-control" required />
                    <br />
                    <label for="descripcion">Descripción:</label>
                    <input type="text" name="descripcion" class="form-control" required />
                    <br />
                    <label for="foto">Foto del negocio:</label>
                    <input type="file" name="foto" class="form-control" accept="image/*" required />
                    <br />
                    <a href="{{ route('index_negocios') }}" class="btn btn-secondary">Regresar</a>
                    <button class="btn btn-success">Crear negocio</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.plantilla>