<?php

class FechaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$fecha = new Fecha;
		$torneos = Torneo::All();
      	return View::make('admin/fecha/form',array('torneos'=>$torneos,'fecha'=>$fecha));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 // Creamos un nuevo objeto para nuestro nuevo usuario
        $fecha = new Fecha;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($fecha->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $fecha->fill($data);
            // Guardamos el usuario
            $fecha->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.torneo.show', array($fecha->torneo_id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('admin.fecha.create')->withInput()->withErrors($fecha->errors);
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
		$fecha = Fecha::find($id);
        
        if (is_null($fecha)) App::abort(404);

         $partidos = DB::table('partido')->where('fecha_id','=', $id)->get();

         //$fechas = DB::table('fecha')->where('torneo_id','=', $id)->get();
        
      	return View::make('admin/fecha/show', array('fecha' => $fecha, 'partidos'=>$partidos));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
