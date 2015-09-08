<?php

class Torneo1Controller extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$torneos =Torneo::All();
		return View::make('admin/torneo/list')->with('torneos', $torneos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 // Creamos un nuevo objeto User para ser usado por el helper Form::model
      $torneo = new Torneo;
      return View::make('admin/torneo/form')->with('torneo', $torneo);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 // Creamos un nuevo objeto para nuestro nuevo usuario
        $torneo = new Torneo;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($torneo->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $torneo->fill($data);
            // Guardamos el usuario
            $torneo->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.torneo.show', array($torneo->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('admin.torneo.create')->withInput()->withErrors($torneo->errors);
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$torneo = Torneo::find($id);
        
        if (is_null($torneo)) App::abort(404);

         $equipos = DB::table('equipo')->where('torneo_id','=', $id)->get();

         $fechas = DB::table('fecha')->where('torneo_id','=', $id)->get();
        
      	return View::make('admin/torneo/show', array('torneo' => $torneo, 'equipos'=>$equipos, 'fechas'=>$fechas));

      	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$torneo = Torneo::find($id);
		if (is_null ($torneo))
		{
			App::abort(404);
		}

		return View::make('admin/torneo/form')->with('torneo', $torneo);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        //$torneo = Torneo::find($id);
        if ($torneo->validAndSave($data))
        {
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.torneo.show', array($torneo->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('admin.torneo.edit', $torneo->id)->withInput()->withErrors($torneo->errors);
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$torneo = Torneo::find($id);
        
        if (is_null ($torneo))
        {
            App::abort(404);
        }
        
        $torneo->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Torneo ' . $torneo->nombreTorneo . ' eliminado',
                'id'      => $torneo->id
            ));
        }
        else
        {
            return Redirect::route('admin.torneo.index');
        }
	}


}
