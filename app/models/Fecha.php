<?php 
class Fecha extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    protected $table = 'fecha';

    protected $fillable = array("nombre","datosJornada","torneo_id","cargado");

    public function torneo()
    {
        return $this->belongsTo('Torneo');
    }

    public function partidos()
    {
        return $this->hasMany('Partido');
    }


    public static function agregarFecha($input){

        $respuesta = array();

        $reglas =  array(
            'torneo_id'  => 'required',              
            'nombre' => array('required', 'max:255'), 
        );

        $validator = Validator::make($input, $reglas);

        if ($validator->fails()){
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            $fecha = static::create($input);

            $respuesta['mensaje'] = 'Fecha creada!';
            $respuesta['error']   = false;
            $respuesta['data']    = $fecha;
        }

        return $respuesta; 
    }


     public $errors;
    
    public function isValid($data)
    {
        $rules = array(
            'nombre'=> 'required',
            'torneo_id' => 'required'
            
            
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    public function validAndSave($data)
    {
        // Revisamos si la data es válida
        if ($this->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $this->fill($data);
            // Guardamos la fecha
            $this->save();
            
            return true;
        }
        
        return false;
    }

}
?>