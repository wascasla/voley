@extends('plantilla')


@section('title') 
	Posiciones
@stop


@section('imagen-titulo') 
{{ HTML::image('assets/media/titulos/img_tit_posiciones.jpg', 'Torneo',array('class' => 'img-responsive','width' => '178', 'height' => '75') )}}
@stop

@section('content') 

    <table  class="table table-bordered letraBlanca">
        
        <thead>
            <tr>
                <th>POS</th>
                <th>EQUIPO</th>
                <th>PUNTOS</th>
                <th>PJ</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
                <th>DIF</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $fix)
                        <tr>
                            <td>{{ $fix->nombre }}</td>
                            <td>{{ $fix->fechaPartido }}</td>
                            <td>{{ $fix->nombreLocal }}</td>
                            <td>{{ $fix->golEquipoLocal }}</td>
                            <td>{{ $fix->golEquipoVisitante }}</td>
                            <td>{{ $fix->nombreVisitante }}</td>
                            <td>{{ $fix->cargado }}</td>
                        </tr>
            @endforeach 
            @stop
        </tbody>
    </table>
                               
@stop