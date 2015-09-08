<!doctype html>
<html>
<head>
	<title>.:Liga Del Valle:.@yield('title','.:Liga Del Valle:.')</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="device-width, initial-scale=1.0">
    
	{{ HTML::style('assets/css/bootstrap.css', array('media'=>'screen'))}}
	{{ HTML::style('assets/css/perso.css', array('media'=>'screen'))}}
	{{ HTML::style('assets/css/modern-business.css', array('media'=>'screen'))}}
	{{ HTML::style('assets/css/font-awesome.min.css', array('media'=>'screen'))}}
        
</head>

<body>
<div class="container ">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="page-header">
                <h1 >
                	{{ HTML::image('assets/media/logos/header.png', 'Liga del Valle',array('class' => 'img-responsive','width' => '365', 'height' => '68') )}}
                    
                </h1>
            </div>
            <div class="row clearfix ">
                <div class="col-md-12 column fondo">
                    
                    <nav class="navbar navbar-default navbar-inverse" role="navigation">
                        
                        
                        <div class="navbar-header">
                             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand glyphicon glyphicon-home" href="{{URL::to('/')}}"></a>
                        </div>
                        

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                
                                <li>
                                    <a href="{{URL::to('torneo')}}">TORNEO</a>
                                </li>
                                <li>
                                    <a href="fixture.html">FIXTURE</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('posicionesMas')}}">POSICIONES</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('goleadoresMas')}}">GOLEADORES</a>
                                </li>
                                <li>
                                    <a href="#">SANCIONES</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('reglamento')}}">REGLAMENTO</a>
                                </li>
                                <li>
                                    <a href="fotos.html">FOTOS</a>
                                </li>
                                <li>
                                    <a href="contacto.html">CONTACTO</a>
                                </li>
                                
                            </ul>                            
                            
                        </div>
                        
                    </nav>
                    <div class="carousel slide " id="carousel-815257">
                        <ol class="carousel-indicators">
                            <li class="active" data-slide-to="0" data-target="#carousel-815257">
                            </li>
                            <li data-slide-to="1" data-target="#carousel-815257">
                            </li>
                            <li data-slide-to="2" data-target="#carousel-815257">
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="" src="http://lorempixel.com/1600/500/sports/1">
                                <div class="carousel-caption">
                                    <h4>
                                        First Thumbnail label
                                    </h4>
                                    <p>
                                        PRIMER CHIVO
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="" src="http://lorempixel.com/1600/500/sports/2">
                                <div class="carousel-caption">
                                    <h4>
                                        Second Thumbnail label
                                    </h4>
                                    <p>
                                        SEGUNDO
                                    </p>
                                </div>
                            </div>
                            <div class="item">
                                <img alt="" src="http://lorempixel.com/1600/500/sports/3">
                                <div class="carousel-caption">
                                    <h4>
                                        Third Thumbnail label
                                    </h4>
                                    <p>
                                        TERCERO
                                    </p>
                                </div>
                            </div>
                        </div> <a class="left carousel-control" href="#carousel-815257" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-815257" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    <div class="row clearfix borde">
                        <div class="col-md-2 column borde">
                            @yield('content-izq')
                        </div>
                        <div class="col-md-8 column borde">
                             <h1 class="lineaBlanca">
                                @yield('imagen-titulo')
                                
                             </h1>
                             @yield('content')
                            
                           
                        </div>
                        <div class="col-md-2 column borde">
                            @yield('content-der')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<footer>
        Creado por mi el 2011
</footer>

    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/bootstrap.js') }}
    
</body>

</html>
