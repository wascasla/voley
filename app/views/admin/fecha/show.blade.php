@extends ('admin/layout')

@section ('title') Fecha {{ $fecha->nombre }} @stop

@section ('content')

<h2>fecha #{{ $fecha->nombre }}</h2>

<p>nombre: {{ $fecha->nombre }}</p>
<p>datosJornada: {{ $fecha->datosJornada }}</p>

<p>
  <a href="{{ route('admin.fecha.edit', $fecha->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

<p>
    <a href="{{ route('admin.torneo.index') }}" class="btn btn-info">Lista de Torneos</a>
  </p>
  


<h2>Lista de Partidos</h2>
  <table class="table table-striped">
    <tr>
        <th>fechaPartido</th>
        <th>horaPartido</th>
        <th>datosPartido</th>
        <th>equipoLocal</th>
        <th>SET EquipoLocal</th>
        <th>SET EquipoVisitante</th>
        <th>equipoVisitante</th>
        <th>cargado</th>
        
        <th>Acciones</th>
    </tr>
    @foreach ($partidos as $partido)
    <tr>
        <td>{{ $partido->fechaPartido }}</td>
        <td>{{ $partido->horaPartido }}</td>
        <td>{{ $partido->datosPartido }}</td>
        <td>{{ $partido->equipoLocal }}</td>
        <td>{{ $partido->golEquipoLocal }}</td>
        <td>{{ $partido->golEquipoVisitante }}</td>
        <td>{{ $partido->equipoVisitante }}</td>
        <td>{{ $partido->cargado }}</td>
        
        
        <td>
          <a href="{{ route('admin.partido.show', $partido->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('admin.partido.edit', $partido->id) }}" class="btn btn-primary">
            Editar
          </a>
           <a href="#" data-id="{{ $partido->id }}" class="btn btn-danger btn-delete">
              Eliminar
          </a>
        </td>
    </tr>
    @endforeach
  </table>

<p>
    <a href="{{ route('hola',array($fecha->id,$fecha->torneo_id)) }}" class="btn btn-info">Agregar Partido</a>
  </p>
  

{{ Form::model($fecha, array('route' => array('admin.fecha.destroy', $fecha->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar fecha', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}


@stop