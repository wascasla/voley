@extends ('admin/layout')

<?php

    if ($fecha->exists):
        $form_data = array('route' => array('admin.fecha.update', $fecha->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.fecha.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') Crear fecha @stop

@section ('content')

<h1>Crear fecha</h1>


  

{{ Form::model($fecha, $form_data , array('role' => 'form')) }}

@include ('admin/errors', array('errors' => $errors))

  <div class="row">
    
    <div class="form-group col-md-4">
      {{ Form::label('nombre', 'Nombre Fecha') }}
      {{ Form::text('nombre', null, array('placeholder' => 'Introduce el nombre de la Fecha', 'class' => 'form-control')) }}        
    </div>    
    <div class="form-group col-md-4">
      {{Form::label('datosJornada', 'datosJornada')}}
      {{Form::text('datosJornada', Input::old('datosJornada'), array('class'=>'form-control', 'placeholder'=>'datosJornada', 'autocomplete'=>'off','id' => 'datepicker'))}}
    </div>      
    <div class="form-group col-md-4">
      
      <div class="form-group"><!-- Creamos un select para escoger cual vendedor es dueño del producto -->
          {{Form::label('torneo_id', 'Torneo')}}
          <select class="form-control" name="torneo_id">
            @foreach($torneos as $torneo)
              <option value="{{$torneo->id}}">{{$torneo->nombreTorneo}}</option>
            @endforeach 
          </select>
        </div>
    </div>

    

  </div>

  {{ Form::button($action , array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop