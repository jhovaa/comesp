<!-- resources/views/formularios/index.blade.php -->

@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Lista de Formularios</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Imprimir</th>
                                    <th>Hoja de Ruta</th>
                                    <th>Nombre Aeródromo</th>
                                    <th>Nombre Solicitante</th>
                                    <th>CI</th>
                                    <th>Correo Electrónico</th>
                                    <th>Teléfono</th>
                                    <th>Departamento</th>
                                    <th>Municipio</th>
                                    <th>Fecha de registro</th>
                                    <th>Designador Umbral Menor Elevación</th>
                                    <th>DU Menor Latitud Sur Grados</th>
                                    <th>DU Menor Latitud Sur Minutos</th>
                                    <th>DU Menor Latitud Sur Segundos</th>
                                    <th>DU Menor Longitud Oeste Grados</th>
                                    <th>DU Menor Longitud Oeste Minutos</th>
                                    <th>DU Menor Longitud Oeste Segundos</th>
                                    <th>Designador Umbral Mayor Elevación</th>
                                    <th>DU Mayor Latitud Sur Grados</th>
                                    <th>DU Mayor Latitud Sur Minutos</th>
                                    <th>DU Mayor Latitud Sur Segundos</th>
                                    <th>DU Mayor Longitud Oeste Grados</th>
                                    <th>DU Mayor Longitud Oeste Minutos</th>
                                    <th>DU Mayor Longitud Oeste Segundos</th>
                                    <th>Elevación Aeródromo</th>
                                    <th>EA Latitud Sur Grados</th>
                                    <th>EA Latitud Sur Minutos</th>
                                    <th>EA Latitud Sur Segundos</th>
                                    <th>EA Longitud Oeste Grados</th>
                                    <th>EA Longitud Oeste Minutos</th>
                                    <th>EA Longitud Oeste Segundos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formularios as $formulario)
                                <tr>
                                    <td><a href="{{ route('verPDF', ['id' => $formulario->id]) }}" target="_blank" class="btn btn-button btnVerPDF" style="background-color: #1b289a;color: white;"><i class="fas fa-print"></i></a></td>
                                    <td>{{ $formulario->hoja_ruta }}</td>
                                    <td>{{ $formulario->nombre_aerodromo }}</td>
                                    <td>{{ $formulario->nombre_solicitante }}</td>
                                    <td>{{ $formulario->ci }}</td>
                                    <td>{{ $formulario->correo_electronico }}</td>
                                    <td>{{ $formulario->telefono }}</td>
                                    <td>{{ $formulario->departamento }}</td>
                                    <td>{{ $formulario->municipio }}</td>
                                    <td>{{ $formulario->created_at }}</td>
                                    <td>{{ $formulario->designador_umbral_menor_elevacion }}</td>
                                    <td>{{ $formulario->du_menor_latitud_sur_grados }}</td>
                                    <td>{{ $formulario->du_menor_latitud_sur_minutos }}</td>
                                    <td>{{ $formulario->du_menor_latitud_sur_segundos }}</td>
                                    <td>{{ $formulario->du_menor_longitud_oeste_grados }}</td>
                                    <td>{{ $formulario->du_menor_longitud_oeste_minutos }}</td>
                                    <td>{{ $formulario->du_menor_longitud_oeste_segundos }}</td>
                                    <td>{{ $formulario->designador_umbral_mayor_elevacion }}</td>
                                    <td>{{ $formulario->du_mayor_latitud_sur_grados }}</td>
                                    <td>{{ $formulario->du_mayor_latitud_sur_minutos }}</td>
                                    <td>{{ $formulario->du_mayor_latitud_sur_segundos }}</td>
                                    <td>{{ $formulario->du_mayor_longitud_oeste_grados }}</td>
                                    <td>{{ $formulario->du_mayor_longitud_oeste_minutos }}</td>
                                    <td>{{ $formulario->du_mayor_longitud_oeste_segundos }}</td>
                                    <td>{{ $formulario->elevacion_aerodromo }}</td>
                                    <td>{{ $formulario->ea_latitud_sur_grados }}</td>
                                    <td>{{ $formulario->ea_latitud_sur_minutos }}</td>
                                    <td>{{ $formulario->ea_latitud_sur_segundos }}</td>
                                    <td>{{ $formulario->ea_longitud_oeste_grados }}</td>
                                    <td>{{ $formulario->ea_longitud_oeste_minutos }}</td>
                                    <td>{{ $formulario->ea_longitud_oeste_segundos }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
