<?php 
class TorneosController extends BaseController {


    



    /**
     * Mustra la lista con todos los usuarios
     */
    public function mostrarTorneos()
    {
        $torneos = Torneo::all(); 

        // Con el método all() le estamos pidiendo al modelo de Usuario
        // que busque todos los registros contenidos en esa tabla y los devuelva en un Array

        return View::make('torneos.lista', array('torneos' => $torneos));

        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los usuarios
    }



    public function crearTorneo(){

        // llamamos a la función de agregar vendedor en el modelo y le pasamos los datos del formulario 
        $respuesta = Torneo::agregarTorneo(Input::all());

        // Dependiendo de la respuesta del modelo 
        // retornamos los mensajes de error con los datos viejos del formulario 
        // o un mensaje de éxito de la operación 
        if ($respuesta['error'] == true){
            return Redirect::to('torneos')->withErrors($respuesta['mensaje'] )->withInput();
        }else{
            return Redirect::to('torneos')->with('mensaje', $respuesta['mensaje']);
        }
    }

    /**
     * Mustra la lista con todos los usuarios
     */
    public function gestionarTorneo($id){


        $equipos = DB::table('equipo')->where('torneo_id','=', $id)->get();//->where('id', 1)
        //$equipos = Equipo::all()->where('torneo_id','=', '5'); 

        // Con el método all() le estamos pidiendo al modelo de Usuario
        // que busque todos los registros contenidos en esa tabla y los devuelva en un Array

         $fechas = DB::table('fecha')->where('torneo_id','=', $id)->get();



        $fixture = DB::table('partido')->join('fecha', 'partido.fecha_id', '=', 'fecha.id')
        //->where('fecha.torneo_id','=', $id)
        ->leftjoin('equipo as equipoLocal', 'partido.equipoLocal', '=', 'equipoLocal.id')
        ->leftjoin('equipo as equipoVisitante', 'partido.equipoVisitante', '=', 'equipoVisitante.id')
        ->select('equipoLocal.nombreEquipo as nombreLocal', 'equipoVisitante.nombreEquipo as nombreVisitante', 
            'fecha.nombre', 'partido.fechaPartido','partido.golEquipoLocal','partido.golEquipoVisitante','partido.cargado')
        //->selectRaw("nombreEquipo as local")
        //->join('equipo as equipoVisitante', 'partido.equipoVisitante', '=', 'equipoVisitante.id')->selectRaw("nombreEquipo as visitante")
        ->where('fecha.torneo_id','=', $id)
        ->get();

        return View::make('torneos.gestion', array('equipos' => $equipos,'fixture'=>$fixture, 'fechas'=>$fechas));

        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los usuarios
    }


    public function mostrarPosiciones($id){

        $fechas = DB::table('fecha')->where('torneo_id','=', $id)->get();

        $fixture = DB::table('partido')->join('fecha', 'partido.fecha_id', '=', 'fecha.id')
        ->where('fecha.torneo_id','=', $id)
        ->get();

        $equipos = DB::table('equipo')->where('torneo_id','=', $id)->get();

        return View::make('posiciones', array('equipos' => $equipos,'fixture'=>$fixture, 'fechas'=>$fechas));

        $pj = DB::table('partido')->count()
                                    ->where('equipoLocal', '=', '2')
                                    ->or_where('equipoVisitante', '=', '2')
                                    ->get();

        //SELECT count(id) FROM `partido` WHERE `equipoLocal` = 2 or `equipoVisitante` = 2

    }


}
?>