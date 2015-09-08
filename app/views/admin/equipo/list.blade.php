@extends ('admin/layout')

@section ('title') Lista de Torneos @stop

@section ('content')

  <h1>Lista de Torneos</h1>

  <p>
    <a href="{{ route('admin.torneo.create') }}" class="btn btn-primary">Crear un nuevo Torneo</a>
  </p>

  
  <table class="table table-striped">
    <tr>
        <th>Torneo</th>
        <th>Fecha Inicio</th>
        <th>Fecha Registro</th>
        <th>Direccion</th>
        <th>Acciones</th>
    </tr>
    @foreach ($torneos as $torneo)
    <tr>
        <td>{{ $torneo->nombreTorneo }}</td>
        <td>{{ $torneo->fechaRegistro }}</td>
        <td>{{ $torneo->fechaInicio }}</td>
        <td>{{ $torneo->direccion }}</td>
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

{{ Form::open(array('route' => array('admin.torneo.destroy', 'TORNEO_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop