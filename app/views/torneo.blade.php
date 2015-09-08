@extends('plantilla')


@section('title') 
	Torneo
@stop


@section('imagen-titulo') 
{{ HTML::image('assets/media/titulos/img_tit_torneo.jpg', 'Torneo',array('class' => 'img-responsive','width' => '178', 'height' => '75') )}}
@stop

@section('content') 
<h2 >
                                Bienvenidos a Liga del Valle
                            </h2>
                                </hr>
                                <p class="letraBlanca">Un Torneo de Fútbol 8, ubicado en Catamarca Capital - Argentina. Donde la competencia, la disciplina, el respeto y el orden se entrelazan en un entorno agradable. </p>
                                <p class="letraBlanca">
                                Quienes organizamos Torneo Liga del Valle buscamos a través de las jornadas el compromiso de los Equipos bajo un marco disciplinario, con el fin de lograr un espacio donde este deporte tan apasionante se pueda competir ordenada y sanamente. </p>
                                <p class="letraBlanca">
                                Saludos, 
                                </p>
                                <p class="letraBlanca">
                                Organización LdV.</p>
@stop