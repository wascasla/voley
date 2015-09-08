<?php

class Partido1Controller extends \BaseController {


	protected $id_fecha;
	protected $id_torneo;
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
		//$id_fecha1=this->id_fecha;
		//aqui quede
		$partido = new Partido;
		$equipos = Equipo::lists('nombreEquipo','id');
		//$equipos = Equipo::where('torneo_id','=',$this->id_torneo)//->lists('nombreEquipo','id');
		//->get();

		return View::make('admin.partido.form', array('partido' => $partido,'equipos' => $equipos
			,'fecha_id'=>$this->id_fecha));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
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


	public function crearPartido($idFecha,$idTorneo)
	{
		//$this->variable = $whatever;
		$this->id_torneo = $idTorneo;
		$this->id_fecha = $idFecha;
		return $this->create();
	}




}
