<x-layout.plantilla title="Inicio">
    <br />
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @if ($mensaje = Session::get('successEdit'))
                        <div class="alert alert-warning" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif
                    @if ($mensaje = Session::get('successDelete'))
                        <div class="alert alert-danger" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif
                </div>
            </div>
            <h5 class="card-title">Citas del usuario</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Negocio</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>       
                        <th scope="col" style="text-align: center;">Editar</th>
                        <th scope="col" style="text-align: center;">Eliminar</th>                 
                    </tr>
                </thead>
                <tbody>
                    @if (empty($citas))
                        <tr><td colspan="7"><h3 class="text-center text-warning"><b>No tienes citas, ¡Agenda una!</b></h3></td></tr>
                    @else
                        @foreach ($citas as $cita)
                            @php
                                $fechaCita = \Carbon\Carbon::createFromFormat('d/m/Y', $cita['fecha']);
                                $fechaActual = \Carbon\Carbon::now();
                                $fechaActual = $fechaActual->copy()->subDay();
                                $citasPasadas = [];
                            @endphp

                            @if ($fechaCita->lt($fechaActual))
                                <tr>
                                    <td>{{ $cita['nombreNegocio'] }}</td>
                                    <td>{{ $cita['categoriaNegocio'] }}</td>
                                    <td>{{ $cita['direccionNegocio'] }}</td>
                                    <td><p class="text-danger">CITA CADUCADA - {{ $cita['fecha'] }}</p></td>
                                    <td>{{ $cita['hora'] }}</td>
                                    <td></td>
                                    <td style="text-align: center;"><a href="{{ route('eliminar_cita', ['idCita' => $cita['id'], 'idUsuario' => $cita['id_usuario']]) }}"><i class="bi bi-trash3-fill link-danger"></i></a></td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $cita['nombreNegocio'] }}</td>
                                    <td>{{ $cita['categoriaNegocio'] }}</td>
                                    <td>{{ $cita['direccionNegocio'] }}</td>
                                    <td>{{ $cita['fecha'] }}</td>
                                    <td>{{ $cita['hora'] }}</td>
                                    <td style="text-align: center;"><a href="{{ route('editar_cita', $cita['id']) }}"><i class="bi bi-pencil-square link-warning"></i></a></td>
                                    <td style="text-align: center;"><a href="{{ route('eliminar_cita', ['idCita' => $cita['id'], 'idUsuario' => $cita['id_usuario']]) }}"><i class="bi bi-trash3-fill link-danger"></i></a></td>
                                </tr>
                            @endif
                            
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('index_negocios') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
    <p></p>
    <p></p>


</x-layout.plantilla>