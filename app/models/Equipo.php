<?php 
class Equipo extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    protected $table = 'equipo';

    protected $fillable = array("nombreEquipo","delegado","telefono","torneo_id");

    public function torneo()
    {
        return $this->belongsTo('Torneo');
    }


    public static function agregarEquipo($input){

        $respuesta = array();

        $reglas =  array(
            'torneo_id'  => 'required',
            'telefono'  => array('required', 'numeric'),  
            'nombreEquipo' => array('required', 'max:255'), 
        );

        $validator = Validator::make($input, $reglas);

        if ($validator->fails()){
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            $equipo = static::create($input);

            $respuesta['mensaje'] = 'Equipo creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $equipo;
        }

        return $respuesta; 
    }

    public $errors;
    
    public function isValid($data)
    {
        $rules = array(
            'nombreEquipo'=> 'required',
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
            // Guardamos el usuario
            $this->save();
            
            return true;
        }
        
        return false;
    }


}
?>