<x-layout.plantilla title="Inicio">
    <br>
    <img src="{{ asset('imagenes/banner.png') }}" alt="Icono"  width="100%" height="450px">
    <br>
    <br />
    <div class="col-sm-12">
        @if ($mensaje = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $mensaje }}
            </div>
        @endif
        @if ($mensaje = Session::get('successEdit'))
            <div class="alert alert-warning" role="alert">
                {{ $mensaje }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <h1>Reservify - Reserva fácil</h1>
    <h3>Aquí podrás ver los negocios disponibles y agendar citas</h3>
    <br />

    <div class="row row-cols-1 row-cols-md-3 g-3">

        @foreach ($negocios as $negocio)
            <div class="col">
                <div class="card h-100" style="border: 3px solid black">
                    <img src="{{ $negocio['foto'] }}" class="card-img-top" height="200">
                    <div class="card-body">
                        <h3 class="card-title">{{ $negocio['nombre'] }}</h3>
                        <br />
                        <p class="card-text"><b>Categoría:</b> {{ $negocio['categoria'] }}</p>
                        <p class="card-text"><b>Dirección:</b> {{ $negocio['direccion'] }}</p>
                        <p class="card-text"><b>Hora de apertura:</b>
                            @if (strpos($negocio['horaApertura'], ':') === false)
                                {{ $negocio['horaApertura'] }}:00
                            @else
                                {{ $negocio['horaApertura'] }}
                            @endif
                        </p>
                        <p class="card-text"><b>Hora de cierre:</b>
                            @if (strpos($negocio['horaCierre'], ':') === false)
                                {{ $negocio['horaCierre'] }}:00
                            @else
                                {{ $negocio['horaCierre'] }}
                            @endif
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('ver_negocio', $negocio['idNegocio']) }}" class="btn btn-secondary">Ver Negocio</a>
                        <a href="{{ route('agendar_cita', $negocio['idNegocio']) }}" class="btn btn-success">Agendar cita</a>
                    </div>
                </div>
         </div>
        @endforeach

    </div>
    <br>
</x-layout.plantilla>
