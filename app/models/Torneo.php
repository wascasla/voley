<?php 
class Torneo extends Eloquent { //Todos los modelos deben extender la clase Eloquent

    protected $table = 'torneo';

    protected $fillable = array("nombreTorneo","fechaRegistro","fechaInicio","direccion");

    public function equipos()
    {
        return $this->hasMany('Equipo');
    }

    public function fechas()
    {
        return $this->hasMany('Fecha');
    }

    public static function agregarTorneo($input){
        // función que recibe como parámetro la información del formulario para crear el Vendedor

        $respuesta = array();

        // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
        $reglas =  array(
            'nombreTorneo'  => array('required', 'max:100'),  
            //'apellido' => array('required', 'max:100'), 
        );

        $validator = Validator::make($input, $reglas);

        // verificamos que los datos cumplan la validación 
        if ($validator->fails()){

            // si no cumple las reglas se van a devolver los errores al controlador 
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            // en caso de cumplir las reglas se crea el objeto Vendedor
            $vendedor = static::create($input);        

            // se retorna un mensaje de éxito al controlador
            $respuesta['mensaje'] = 'Torneo creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $vendedor;
        }     

        return $respuesta; 
  }

    public $errors;
    
    public function isValid($data)
    {
        $rules = array(
            'nombreTorneo'=> 'required'
            
            
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