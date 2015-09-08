<!doctype html>
<html>
<head>
	<title>@yield('title','.:Liga Del Valle:.')</title>
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
                    <img src="media/logos/logo5.png" class="img-responsive" alt="Masculino" width="400" height="200">
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
                    <button type="button" class="btn btn-primary centro">
                        <a href="torneo.html">Torneo Maculino</a>
                    </button>

                       
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn btn-primary centro">Torneo este Femenino</button>
                    
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