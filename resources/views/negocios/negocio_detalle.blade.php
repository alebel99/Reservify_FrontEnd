<x-layout.plantilla title="Negocio">

    <br />
    <div class="card" style="max-width: 100rem;">
        <img src="{{ asset('imagenes/' . $negocio['foto']) }}" class="card-img-top" height="400">
        <div class="card-header">
            <br/>
            <h3 class="card-tittle">{{ $negocio['nombre'] }}</h3>
            <br />
        </div>
        <div class="card-body">
            <p class="card-text"><b>Categoría</b></p>
            <p class="card-text">{{ $negocio['categoria'] }}</p>
            <p class="card-text"><b>Descripción</b></p>
            <p class="card-text">{{ $negocio['descripcion'] }}</p>  
            <p class="card-text"><b>Horario</b></p>
            <p class="card-text">Abre: 
                @if (strpos($negocio['horaApertura'], ':') === false)
                    {{ $negocio['horaApertura'] }}:00
                @else
                    {{ $negocio['horaApertura'] }}
                @endif
                | Cierra: 
                @if (strpos($negocio['horaCierre'], ':') === false)
                    {{ $negocio['horaCierre'] }}:00
                @else
                    {{ $negocio['horaCierre'] }}
                @endif
            </p>
            <p class="card-text"><b>Dirección</b></p>
            <p class="card-text">{{ $negocio['direccion'] }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('index_negocios') }}" class="btn btn-secondary">Regresar</a>
            <a href="{{ route('agendar_cita', $negocio['idNegocio']) }}" class="btn btn-success">Agendar Cita</a>
        </div>
    </div>

    <br/>

</x-layout.plantilla>