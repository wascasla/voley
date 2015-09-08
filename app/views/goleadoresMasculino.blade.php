@extends('plantilla')


@section('title') 
	Goleadores
@stop


@section('imagen-titulo') 
{{ HTML::image('assets/media/titulos/img_tit_goleadores.jpg', 'Torneo',array('class' => 'img-responsive','width' => '178', 'height' => '75') )}}
@stop

@section('content') 

    <!-- 16:9 aspect ratio -->
<div class="embed-responsive embed-responsive-16by9">
   <iframe src="http://gestorligas.com/ligas/exportar.php?page=clasificacion&liga=9464" width="900" height="600" frameborder="0"></iframe>
</div>

<br>
<br>
@stop