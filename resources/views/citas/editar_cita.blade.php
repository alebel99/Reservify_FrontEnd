<x-layout.plantilla title="Agendar Cita">
    <br />
    <div class="container" style="align-items: center">
      <div class="card" style="width: w-100;">
        <div class="card-header">
            Edita tu cita:
        </div>
        @php
            $usuario = session('usuario');
            $fechaActual = \Carbon\Carbon::now();
            $horaApertura = $negocio['horaApertura'];
            $horaCierre = $negocio['horaCierre'];
            $horaAperturaFormateada = str_pad($horaApertura, 2, "0", STR_PAD_LEFT) . ":00";
            $horaCierreFormateada = str_pad($horaCierre, 2, "0", STR_PAD_LEFT) . ":00";
        @endphp
        <div class="card-body">
            <form action="{{ route('update_cita') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $cita['id'] }}">
                <input type="hidden" name="idNegocio" value="{{ $cita['id_negocio'] }}">
                <input type="hidden" name="idUsuario" value="{{ $usuario }}"/>
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" class="form-control" value="{{ $cita['fecha'] }}" min="{{ $fechaActual->toDateString() }}" required />
                <label for="hora">Hora:</label>
                <input type="time" name="hora" class="form-control" value="{{ $cita['hora'] }}" min="{{ $horaAperturaFormateada }}" max="{{ $horaCierreFormateada }}" required />
                <br/>
                <a href="{{ route('ver_citas_usuario', $cita['id_usuario'])}}" class="btn btn-secondary">Regresar</a>
                <button class="btn btn-warning">Editar</button>
            </form>
        </div>
        <div class="card-footer">
            <label>Recuerda acudir a tiempo a tu cita</label>
        </div>
    </div>

    </div>
    
</x-layout.plantilla>