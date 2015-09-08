@extends('plantillaAdmin')


@section('title') 
	Torneos
@stop

@section('contenido') 

	

<div class="row marketing">
    <h3>Crear Torneo</h3>
<div class="panel panel-default">
    {{ Form::open(array('url' => 'torneos')) }}    
    <!-- El mensaje que se envía por el redirect en el controlador lo podemos obtener
    con la función get de la clase Session -->
        @if (Session::get('mensaje') )
          <!-- Si hay un mensaje, entonces lo imprimimos y le damos estilo con bootstrap -->
          <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
        <div class="form-group">
          {{Form::label('nombreTorneo', 'Nombre del Torneo')}}
          {{Form::text('nombreTorneo', Input::old('nombreTorneo'), array('class'=>'form-control', 'placeholder'=>'nombre torneo', 'autocomplete'=>'off'))}}
        </div>
          <!-- Verificamos si hubo algún error en el campo --> 
          @if( $errors->has('nombreTorneo') )          
              <!-- En caso de que haya un error, entonces los imprimos y utilizamos algún estilo de bootstrap -->
              <div class="alert alert-danger">
              @foreach($errors->get('nombreTorneo') as $error )   
                  * {{ $error }}</br>
              @endforeach
              </div>
          @endif
        <div class="form-group">
          {{Form::label('fechaRegistro', 'Fecha de Registro')}}
          {{Form::text('fechaRegistro', Input::old('fechaRegistro'), array('class'=>'form-control', 'placeholder'=>'fecha de Registro', 'autocomplete'=>'off'))}}
        </div>
        <div class="form-group">
          {{Form::label('fechaInicio', 'Fecha de Registro')}}
          {{Form::text('fechaInicio', Input::old('fechaInicio'), array('class'=>'form-control', 'placeholder'=>'fecha de fechaInicio', 'autocomplete'=>'off'))}}
        </div>
        <div class="form-group">
          {{Form::label('direccion', 'Direccion')}}
          {{Form::text('direccion', Input::old('direccion'), array('class'=>'form-control', 'placeholder'=>'direccion', 'autocomplete'=>'off'))}}
        </div>
          
        {{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
        {{Form::reset('Resetear', array('class'=>'btn btn-default'))}}

    {{ Form::close() }}
</div>

	<h3>Torneos</h3>
		<div class="panel panel-default">
			
		
			<div class="list-group">
				<ul>
			  @foreach($torneos as $torneo)
			  

			     <li> {{ $torneo->nombreTorneo }} </li>
			     
           
          

          <li><a href="gestionTorneo/{{$torneo->id}}" title="Gestinar">Gestionar</a></li>
			  @endforeach 
			</ul>

			{{HTML::link('torneos', 'Torneos')}}
			@stop
			</div>
		</div>
</div>
