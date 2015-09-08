<!DOCTYPE html>
<html>
  <head>
    <title>Torneo Liga del Valle - ADMIN</title>
    <!--Incluimos el CSS de bootstrap y el CSS de la plantilla
    que usamos con los helpers de Laravel
    
    assets/css/bootstrap.css
    {{ HTML::style('assets/css/perso.css', array('media'=>'screen'))}}
    {{ HTML::style('assets/css/modern-business.css', array('media'=>'screen'))}}
    {{ HTML::style('assets/css/font-awesome.min.css', array('media'=>'screen'))}}

  -->
    
    {{HTML::style('css/jumbotron-narrow.css')}}

    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', array('media'=>'screen'))}}
    
    
    
    </head>
    <body>

    <div class="container">
      <div class="header">

        <ul class="nav nav-pills pull-right">
          <li>{{HTML::link('admin', 'Inicio')}}</li>
          <li>{{HTML::link('torneos', 'Torneos')}}</li>
          <li>{{HTML::link('equipo', 'Equipos')}}</li>
        </ul>

        <h3 class="text-muted">Liga del Valle</h3>
      </div>

      <div>
        @yield('contenido')
      <!-- Aqui se incluiran los codigos de las vistas que 
      use cada metodo de los controladores -->  
      </div>
       

     

    </div> 

    <!--
     <div class="footer">
        <p>&copy; Liga 2015</p>
      </div>
    -->
    <!-- Incluimos la libreria jQuery  -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Incluimos el JS de bootstrap con el Helper de Laravel -->
    {{HTML::script('js/bootstrap.min.js')}}
  </body>
</html>