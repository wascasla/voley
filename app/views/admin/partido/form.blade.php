@extends ('admin/layout')

<?php

    if ($partido->exists):
        $form_data = array('route' => array('admin.partido.update', $torneo->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.partido.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') Crear partido @stop

@section ('content')

<h1>Crear partido para la fecha {{$fecha_id}}</h1>

<p>
    <a href="{{ route('admin.torneo.index') }}" class="btn btn-info">Lista de Torneos</a>
  </p>
  

{{ Form::model($partido, $form_data , array('role' => 'form')) }}

@include ('admin/errors', array('errors' => $errors))

  <div class="row">
    <div class="form-group col-md-4">
      {{Form::label('fechaPartido', 'Fecha de Juego')}}
      {{Form::input('date','fechaPartido', Input::old('fechaPartido'), array('class'=>'form-control', 'placeholder'=>'fecha de Juego', 'autocomplete'=>'off'))}}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('horaPartido', 'Hora del Partido') }}
      {{ Form::text('horaPartido', null, array('placeholder' => 'Hora del Partido', 'class' => 'form-control')) }}        
    </div>    
    <div class="form-group col-md-4">
      {{Form::label('datosPartido', 'Datos del Partido')}}
      {{Form::text('datosPartido', Input::old('datosPartido'), array('class'=>'form-control', 'placeholder'=>'Datos del Partido', 'autocomplete'=>'off'))}}
    </div>
    
   <div class="form-group col-md-4">
      {{ Form::label('equipoLocal', 'equipoLocal') }}
      {{ Form::select('equipoLocal', $equipos, null,['id'=>'equipoLocal',class' => 'form-control'] ) }}
    </div>
   
    

    <div class="form-group col-md-4">
        {{ Form::label('golEquipoLocal', 'Set Equipo Local') }}
        {{ Form::text('golEquipoLocal', Input::old('golEquipoLocal'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('equipoVisitante', 'equipoVisitante') }}
        <select class="form-control" name="equipoVisitante">
            @foreach($equipos as $equipo)
              <option value="{{$equipo->id}}">{{$equipo->nombreEquipo}}</option>
            @endforeach 
        </select>
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('golEquipoVisitante', 'Set Equipo Visitante') }}
        {{ Form::text('golEquipoVisitante', Input::old('golEquipoVisitante'), array('class' => 'form-control')) }}
    </div>


    

    

  </div>

  {{ Form::button($action , array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop