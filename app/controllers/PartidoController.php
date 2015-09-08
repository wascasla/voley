<?php

class PartidoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$partidos = Partido::all();

		return View::make('partidos.index')
			->with('partidos',$partidos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$fechas = Fecha::all();
		$equipos = Equipo::all();

		return View::make('partidos.create', array('fechas' => $fechas,'equipos' => $equipos));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'fechaPartido'       => 'required',
            //'email'      => 'required|email',
            //'equipoLocal' => 'required|numeric',
            'fecha_id'       => 'required',
            'equipoLocal'       => 'required',
            'equipoVisitante'       => 'required'
            //'fechaPartido'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('nerds/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = new Partido;
            $nerd->fechaPartido       = Input::get('fechaPartido');
            $nerd->horaPartido      = Input::get('horaPartido');
            $nerd->datosPartido = Input::get('datosPartido');
            $nerd->fecha_id = Input::get('fecha_id');
            $nerd->equipoLocal = Input::get('equipoLocal');
            $nerd->equipoVisitante = Input::get('equipoVisitante');
            $nerd->golEquipoLocal = Input::get('golEquipoLocal');
            $nerd->golEquipoVisitante = Input::get('golEquipoVisitante');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully created Partido!');
            return Redirect::to('partidos');
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
		// get the nerd
        $partido = Partido::find($id);

        // show the edit form and pass the nerd
        return View::make('partidos.edit')
            ->with('partido', $partido);
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
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('partidos/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = Partido::find($id);
            $nerd->name       = Input::get('name');
            $nerd->email      = Input::get('email');
            $nerd->nerd_level = Input::get('nerd_level');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('partidos');
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
		//
	}


}
