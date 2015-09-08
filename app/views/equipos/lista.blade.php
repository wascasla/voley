@extends('plantillaAdmin')
@section('contenido')
<div class="row marketing">
    <h3>Crear Equipo</h3>
    {{ Form::open(array('url' => 'equipo')) }}
        @if (Session::get('mensaje') )
          <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
        <div class="form-group">
          {{Form::label('nombreEquipo', 'Descripcion')}}
          {{Form::text('nombreEquipo', Input::old('nombreEquipo'), array('class'=>'form-control', 'placeholder'=>'nombreEquipo', 'autocomplete'=>'off'))}}
        </div>     
        @if( $errors->has('nombreEquipo') )
              <div class="alert alert-danger">
              @foreach($errors->get('nombreEquipo') as $error )   
                  * {{ $error }}</br>
              @endforeach
              </div>
        @endif
        <div class="form-group">
          {{Form::label('telefono', 'Telefono')}}
          {{Form::text('telefono', Input::old('telefono'), array('class'=>'form-control', 'placeholder'=>'telefono del equipo', 'autocomplete'=>'off'))}}
        </div>
        @if( $errors->has('telefono') )
              <div class="alert alert-danger">
              @foreach($errors->get('telefono') as $error )   
                  * {{ $error }}</br>
              @endforeach
              </div>
        @endif
        <div class="form-group">
          {{Form::label('delegado', 'Delegado')}}
          {{Form::text('delegado', Input::old('delegado'), array('class'=>'form-control', 'placeholder'=>'delegado del equipo', 'autocomplete'=>'off'))}}
        </div>        
        <div class="form-group"><!-- Creamos un select para escoger cual vendedor es dueño del producto -->
          {{Form::label('torneo_id', 'Torneo')}}
          <select class="form-control" name="torneo_id">
            @foreach($torneos as $torneo)
              <option value="{{$torneo->id}}">{{$torneo->nombreTorneo}}</option>
            @endforeach 
          </select>
        </div>
        @if( $errors->has('torneo_id') )
              <div class="alert alert-danger">
              @foreach($errors->get('torneo_id') as $error )   
                  * {{ $error }}</br>
              @endforeach
              </div>
        @endif
        {{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
        {{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
    {{ Form::close() }}
</div>
<h3>Equipos</h3>
<div class="list-group">
    @foreach($equipos as $equipo)
      <a href="#" class="list-group-item">{{$equipo->nombreEquipo}}</a>
    @endforeach 
</div>
@stop