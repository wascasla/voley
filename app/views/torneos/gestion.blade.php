@extends('plantillaAdmin')


@section('title') 
	Torneos
@stop

@section('contenido')
	<h3>Gestion del Torneo</h3>
	<ul class="nav nav-pills">
  		<li role="presentation" class="active"><a href="#">Home</a></li>
  		<li role="presentation"><a href="#">Profile</a></li>
  		<li role="presentation"><a href="#">Messages</a></li>
	</ul>

	<h3>Fixture</h3>
		
			<table class="table table-bordered">
				<caption>table title and/or explanatory text</caption>
				<thead>
					<tr>
						<th>Fecha</th>
						<th>fechaPartido</th>
						<th>equipoLocal</th>
						<th>golLocal</th>
						<th>golVisitante</th>
						<th>equipoVisitante</th>
						<th>Jugado</th>
						
					</tr>
				</thead>
				<tbody>
					
						@foreach($fixture as $fix)
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