@extends ('admin/layout2')

@section ('title') Torneo {{ $torneo->nombreTorneo }} @stop

@section ('content')

<h2>Torneo #{{ $torneo->id }}</h2>

<p>nombreTorneo: {{ $torneo->nombreTorneo }}</p>
<p>fechaInicio: {{ $torneo->fechaInicio }}</p>

<p>
  <a href="{{ route('admin.torneo.edit', $torneo->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

<p>
    <a href="{{ route('admin.torneo.index') }}" class="btn btn-info">Lista de Torneos</a>
  </p>
  


<h2>Lista de Equipos</h2>
  <table class="table table-striped">
    <tr>
        <th>Equipo</th>
        <th>Delegado</th>
        <th>Telefono</th>
        
        <th>Acciones</th>
    </tr>
    @foreach ($equipos as $equipo)
    <tr>
        <td>{{ $equipo->nombreEquipo }}</td>
        <td>{{ $equipo->delegado }}</td>
        <td>{{ $equipo->telefono }}</td>
        
        <td>
          <a href="{{ route('admin.torneo.show', $torneo->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('admin.torneo.edit', $torneo->id) }}" class="btn btn-primary">
            Editar
          </a>
           <a href="#" data-id="{{ $torneo->id }}" class="btn btn-danger btn-delete">
              Eliminar
          </a>
        </td>
    </tr>
    @endforeach
  </table>

<p>
    <a href="{{ route('admin.equipo.create') }}" class="btn btn-info">Agregar Equipo</a>
  </p>
  

{{ Form::model($torneo, array('route' => array('admin.torneo.destroy', $torneo->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar torneo', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}




<h2>Lista de Fechas</h2>
  <table class="table table-striped">
    <tr>
        <th>nombre</th>
        <th>datosJornada</th>
        <th>torneo_id</th>
        <th>cargado</th>
        
        <th>Acciones</th>
    </tr>
    @foreach ($fechas as $fecha)
    <tr>
        <td>{{ $fecha->nombre }}</td>
        <td>{{ $fecha->datosJornada }}</td>
        <td>{{ $fecha->torneo_id }}</td>
        <td>{{ $fecha->cargado }}</td>
        
        <td>
          <a href="{{ route('admin.fecha.show', $fecha->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('admin.fecha.edit', $fecha->id) }}" class="btn btn-primary">
            Editar
          </a>
           <a href="#" data-id="{{ $fecha->id }}" class="btn btn-danger btn-delete">
              Eliminar
          </a>
        </td>
    </tr>
    @endforeach
  </table>

<p>
    <a href="{{ route('admin.fecha.create') }}" class="btn btn-info">Agregar fecha</a>
  </p>

@stop