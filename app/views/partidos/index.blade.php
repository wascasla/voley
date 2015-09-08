<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('partidos') }}">Partido Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('partidos') }}">View All partidos</a></li>
        <li><a href="{{ URL::to('partidos/create') }}">Create a partido</a>
    </ul>
</nav>

<h1>All the partidos</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>fechaPartido</td>
            <td>horaPartido</td>
            <td>datosPartido</td>            
            <td>fecha_id</td>
            <td>equipoLocal</td>
            <td>golEquipoLocal</td>
            <td>golEquipoVisitante</td>
            <td>equipoVisitante</td>              
            <td>cargado</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($partidos as $key => $value)
        <tr>
            <td>{{ $value->fechaPartido }}</td>
            <td>{{ $value->horaPartido }}</td>
            <td>{{ $value->datosPartido }}</td>
            <td>{{ $value->fecha_id }}</td>
            <td>{{ $value->equipoLocal }}</td>
            <td>{{ $value->golEquipoLocal }}</td>
            <td>{{ $value->golEquipoVisitante }}</td>
            <td>{{ $value->equipoVisitante }}</td>              
            <td>{{ $value->cargado }}</td>





            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('partidos/' . $value->id) }}">Show this partido</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('partidos/' . $value->id . '/edit') }}">Edit this partido</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>