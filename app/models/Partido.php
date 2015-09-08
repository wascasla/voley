<?php 
class Partido extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    protected $table = 'partido';

    protected $fillable = array("fechaPartido","horaPartido","datosPartido","fecha_id","equipoLocal","equipoVisitante","golEquipoLocal","golEquipoVisitante","cargado");

    //un partido pertenece a una fecha
    public function fecha()
    {
        return $this->belongsTo('Fecha');
    }

    public function equipoLocal()
    {
        return $this->belongsTo('equipo','equipoLocal');//c_id - customer id
    }
    public function equipoVisitante()
    {
        return $this->belongsTo('equipo','equipoVisitante');//s_id - staff id
    }


    public static function agregarPartido($input){

        $respuesta = array();

        $reglas =  array(
            'fecha_id'  => 'required',              
            //'nombre' => array('required', 'max:255'),
            'equipoLocal'  => 'required',
            'equipoVisitante'  => 'required',
        );

        $validator = Validator::make($input, $reglas);

        if ($validator->fails()){
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            $partido = static::create($input);

            $respuesta['mensaje'] = 'Partido creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $partido;
        }

        return $respuesta; 
    }
}
?>