<x-layout.plantilla title="Agendar Cita">
    <br />
    <div class="container" style="align-items: center">
      <div class="card" style="width: w-100;">
        <div class="card-header">
            Agenda tu cita en:
            <h3>{{ $negocio['nombre'] }}</h3>
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
            <form action="{{ route('guardar_cita') }}" method="post">
                @csrf
                <input type="hidden" name="idNegocio" value="{{ $negocio['idNegocio'] }}">
                <input type="hidden" name="idUsuario" value="{{ $usuario }}"/>
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" class="form-control" min="{{ $fechaActual->toDateString() }}" required />
                <label for="hora">Hora:</label>
                <input type="time" name="hora" class="form-control" min="{{ $horaAperturaFormateada }}" max="{{ $horaCierreFormateada }}" required />
                <br/>
                <label>Acude a esta direccion:</label>
                <p>{{$negocio['direccion']}}</p>
                <a href="{{ route('ver_negocio', $negocio['idNegocio'])}}" class="btn btn-secondary">Regresar</a>
                <button class="btn btn-success">Agendar</button>
            </form>
        </div>
        <div class="card-footer">
            <label>Recuerda acudir a tiempo a tu cita</label>
        </div>
    </div>

    </div>
    
</x-layout.plantilla>