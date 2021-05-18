<?php

namespace pen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearAlumnoRequest extends FormRequest
{
    protected $redirect = "/alumnos";
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Validator::make([
             'nombre' => array('required, max:10, regex:/^[a-z]+$/i'),
             'apellido1' => array('required, max:10, regex:/^[a-z]+$/i'),
             'apellido2' => array('required, max:10, regex:/^[a-z]+$/i'),
             'dni' => array('required, max:9, regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i'),
             'fecha_nacimiento' => array('required, max:10, regex:^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$'),
             'telefono' => array('required, max:8, regex:(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}'),
             'correo' => array('required, max:100, regex:@"^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$"'),
             'ciudad' => array('required, max:20, regex:/^[a-z]+$/i'),
             'provincia' => array('required, max:15, regex:/^[a-z]+$/i'),
             'nacionalidad' => array('required, max:10, regex:/^[a-z]+$/i'),
             'codigo_postal' => array('required, max:5, regex:/^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$/'),
             'direccion' => array('required, max:15, regex:/^[a-z]+$/i'),
             'portal' => array('required, max:2, regex:/^[1-99]+$/i'),
             'piso' => array('required, max:2, regex:/^[1-99]+$/i'),
             'letra' => array('required, max:1, regex:/^[A-Z]+$/i'),
             'repite' => array('required, max:2, regex:/^[A-z]+$/i'),
             'foto' => array('required, image, max:1024*1024*1'),
        ]);
    }

    public function messages(){
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.max' => 'El máximo permitido son 10 caracteres',
            'nombre.regex' => 'Sólo se aceptan letras',
            'apellido1.required' => 'El campo apellido1 es obligatorio',
            'apellido1.max' => 'El máximo permitido son 10 caracteres',
            'apellido1.regex' => 'Sólo se aceptan letras',
            'apellido2.required' => 'El campo apellido2 es obligatorio',
            'apellido2.max' => 'El máximo permitido son 10 caracteres',
            'apellido2.regex' => 'Sólo se aceptan letras',
            'dni.required' => 'El campo dni es obligatorio',
            'dni.max' => 'El máximo permitido son 9 caracteres',
            'dni.regex' => 'Sólo se aceptan 9 caracteres numericos y una letra',
            'fecha_nacimiento.required' => 'El campo fecha_nacimiento es obligatorio',
            'fecha_nacimiento.max' => 'El máximo permitido son 10 caracteres',
            'fecha_nacimiento.regex' => 'Sólo se aceptan caracteres numericos separados por guiones',
            'telefono.required' => 'El campo telefono es obligatorio',
            'telefono.max' => 'El máximo permitido son 8 caracteres',
            'telefono.regex' => 'Sólo se aceptan caracteres numericos',
            'correo.required' => 'El campo correo es obligatorio',
            'correo.max' => 'El máximo permitido son 100 caracteres',
            'correo.regex' => 'Sólo se aceptan letras con una arroba y el nombre del dominio separado por un punto',
            'ciudad.required' => 'El campo ciudad es obligatorio',
            'ciudad.max' => 'El máximo permitido son 20 caracteres',
            'ciudad.regex' => 'Sólo se aceptan letras',
            'provincia.required' => 'El campo provincia es obligatorio',
            'provincia.max' => 'El máximo permitido son 15 caracteres',
            'provincia.regex' => 'Sólo se aceptan letras',
            'nacionalidad.required' => 'El campo nacionalidad es obligatorio',
            'nacionalidad.max' => 'El máximo permitido son 10 caracteres',
            'nacionalidad.regex' => 'Sólo se aceptan letras',
            'codigo_postal.required' => 'El campo codigo postal es obligatorio',
            'codigo_postal.max' => 'El máximo permitido son 5 caracteres',
            'codigo_postal.regex' => 'Sólo se aceptan caracteres numericos',
            'direccion.required' => 'El campo direccion es obligatorio',
            'direccion.max' => 'El máximo permitido son 15 caracteres',
            'direccion.regex' => 'Sólo se aceptan letras',
            'portal.required' => 'El campo portal es obligatorio',
            'portal.max' => 'El máximo permitido son 2 caracteres',
            'portal.regex' => 'Sólo se aceptan caracteres numericos',
            'piso.required' => 'El campo piso es obligatorio',
            'piso.max' => 'El máximo permitido son 2 caracteres',
            'piso.regex' => 'Sólo se aceptan caracteres numericos',
            'letra.required' => 'El campo letra es obligatorio',
            'letra.max' => 'El máximo permitido son 1 caracter',
            'letra.regex' => 'Sólo se aceptan letras',
            'foto.required' => 'El campo foto es obligatorio',
            'foto.image' => 'Formato no permitido',
            'foto.max' => 'El máximo permitido es 1 MB',

        ];
    }

    public function response(array $errors){
        return redirect($this->redirect)
                ->withErrors($errors, 'formulario')
                ->withInput();
    }
}
