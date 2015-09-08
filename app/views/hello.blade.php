<!doctype html>
<html>
<head>
	<title>@yield('title','.:UNION DE AMIGOS VETERANOS DE VOLEY:.')</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="device-width, initial-scale=1.0">


	{{ HTML::style('assets/css/bootstrap.css', array('media'=>'screen'))}}
	{{ HTML::style('assets/css/perso.css', array('media'=>'screen'))}}
	{{ HTML::style('assets/css/modern-business.css', array('media'=>'screen'))}}
	{{ HTML::style('assets/css/font-awesome.min.css', array('media'=>'screen'))}}


</head>
<body>
	
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-4 column">
                </div>
                <div class="col-md-4 column">
                    {{ HTML::image('assets/media/logos/logo5.png', 'Masculino',array('class' => 'img-responsive','width' => '400', 'height' => '200') )}}                    
                </div>
                <div class="col-md-4 column">
                </div>
            </div>
        </div>

        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-4 column">
                </div>
                <div class="col-md-4 column centro">
                                       <!-- Standard button -->
                    
                        <a class="btn btn-default centro" href="{{URL::to('torneo')}}">INGRESAR</a>
                    

                       
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    
                    <!-- <a class="btn btn-primary centro" href="#">Torneo Femenino</a> -->
                    
                </div>
                <div class="col-md-4 column">
                </div>
            </div>
        </div>
    </div>
</div>
	<script src="//code.jquery.com/jquery.js"></script>
	{{ HTML::script('assets/js/bootstrap.js')}}
</body>
</html>