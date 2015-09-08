<?php 
class EquiposController extends BaseController {

    /**
     * Mustra la lista con todos los usuarios
     */
    public function mostrarEquipos()
    {
        $equipos = Equipo::all(); 
        $torneos = Torneo::all();

        // Con el método all() le estamos pidiendo al modelo de Usuario
        // que busque todos los registros contenidos en esa tabla y los devuelva en un Array

        return View::make('equipos.lista', array('equipos' => $equipos,'torneos' => $torneos));

        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los usuarios
    }


    public function crearEquipo(){

        $respuesta = Equipo::agregarEquipo(Input::all());

        if ($respuesta['error'] == true){
            return Redirect::to('equipo')->withErrors($respuesta['mensaje'] )->withInput();
        }else{
            return Redirect::to('equipo')->with('mensaje', $respuesta['mensaje']);
        }
    }

}
?>