<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('partidos') }}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('partidos') }}">View All Nerds</a></li>
        <li><a href="{{ URL::to('partidos/create') }}">Create a Nerd</a>
    </ul>
</nav>

<h1>Edit {{ $partido->id }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($partido, array('route' => array('partidos.update', $partido->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('fechaPartido', 'fechaPartido') }}
        {{ Form::input('date','fechaPartido', Input::old('fechaPartido'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('horaPartido', 'horaPartido') }}
        {{ Form::text('horaPartido', Input::old('horaPartido'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('datosPartido', 'datosPartido') }}
        {{ Form::text('datosPartido', Input::old('datosPartido'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('fecha_id', 'Fecha') }}        
        <select class="form-control" name="fecha_id">
            @foreach($fechas as $fecha)
              <option value="{{$fecha->id}}">{{$fecha->nombre}}</option>
            @endforeach 
        </select>
    </div>

    <div class="form-group">
        {{ Form::label('equipoLocal', 'equipoLocal') }}
        
        <select class="form-control" name="equipoLocal">
            @foreach($equipos as $equipo)
              <option value="{{$equipo->id}}">{{$equipo->nombreEquipo}}</option>
            @endforeach 
        </select>
    </div>

    <div class="form-group">
        {{ Form::label('golEquipoLocal', 'golEquipoLocal') }}
        {{ Form::email('golEquipoLocal', Input::old('golEquipoLocal'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('equipoVisitante', 'equipoVisitante') }}
        <select class="form-control" name="equipoVisitante">
            @foreach($equipos as $equipo)
              <option value="{{$equipo->id}}">{{$equipo->nombreEquipo}}</option>
            @endforeach 
        </select>
    </div>

    <div class="form-group">
        {{ Form::label('golEquipoVisitante', 'golEquipoVisitante') }}
        {{ Form::email('golEquipoVisitante', Input::old('golEquipoVisitante'), array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Edit the Partido!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>