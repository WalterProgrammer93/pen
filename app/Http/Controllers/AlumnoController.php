<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Storage;
use pen\Alumno;
use pen\Curso;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/alumnos';

    public function index()
    {
        $alumnos = Alumno::paginate(5);
        return view("alumnos.alumnos", compact("alumnos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('alumnos.crear', ['cursos' => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumnos = Validator::make([
            'nombre' => 'required', 'max:10', 'regex:/^[a-z]+$/i',
            'apellido1' => 'required', 'max:10', 'regex:/^[a-z]+$/i',
            'apellido2' => 'required', 'max:10', 'regex:/^[a-z]+$/i',
            'dni' => 'required', 'max:9', 'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i',
            'fecha_nacimiento' => 'required', 'max:10', 'regex:^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$',
            'telefono' => 'required', 'max:9', 'regex:(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){9}',
            'correo' => 'required', 'max:100', 'regex:@"^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$"', 'unique:users,email',
            'sexo' => 'required', 'max:1',
            'ciudad' => 'required', 'max:20', 'regex:/^[a-z]+$/i',
            'provincia' => 'required', 'max:15', 'regex:/^[a-z]+$/i',
            'nacionalidad' => 'required', 'max:10', 'regex:/^[a-z]+$/i',
            'codigo_postal' => 'required', 'max:5', 'regex:/^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$/',
            'direccion' => 'required', 'max:15', 'regex:/^[a-z]+$/i',
            'portal' => 'required', 'max:2', 'regex:/^[1-99]+$/i',
            'piso' => 'required', 'max:2', 'regex:/^[1-99]+$/i',
            'letra' => 'required', 'max:1', 'regex:/^[A-Z]+$/i',
            'repite' => 'required', 'max:2', 'regex:/^[A-z]+$/i',
            'foto' => 'required', 'image', 'max:1024*1024*1',
        ], [
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
            'telefono.max' => 'El máximo permitido son 9 caracteres',
            'telefono.regex' => 'Sólo se aceptan caracteres numericos',
            'correo.required' => 'El campo correo es obligatorio',
            'correo.max' => 'El máximo permitido son 100 caracteres',
            'correo.regex' => 'Sólo se aceptan letras con una arroba y el nombre del dominio separado por un punto',
            'correo.unique' => 'Ya existe un usuario con ese email',
            'sexo.required' => 'El campo sexo es obligatorio',
            'sexo.max' => 'El máximo permitido es 1 caracter',
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
        ]);

        if ($alumnos->fails())
        {
            return redirect()->back()->withInput()->withErrors($alumnos->errors());
        } else {
          $alumnos = new Alumno;
          $alumnos->nombre = $request->nombre;
          $alumnos->apellido1 = $request->apellido1;
          $alumnos->apellido2 = $request->apellido2;
          $alumnos->dni = $request->dni;
          $alumnos->fecha_nacimiento = $request->fecha_nacimiento;
          $alumnos->telefono = $request->telefono;
          $alumnos->correo = $request->correo;
          $alumnos->sexo = $request->sexo;
          $alumnos->ciudad = $request->ciudad;
          $alumnos->provincia = $request->provincia;
          $alumnos->nacionalidad = $request->nacionalidad;
          $alumnos->codigo_postal = $request->codigo_postal;
          $alumnos->direccion = $request->direccion;
          $alumnos->portal = $request->portal;
          $alumnos->piso = $request->piso;
          $alumnos->letra = $request->letra;
          $alumnos->repite = $request->repite;
          if ($archivo = $request->file('foto')) {
              $nombre  = $archivo->getClientOriginalName();
              $archivo->move("fotos", $nombre);
              $alumnos->foto = $archivo;
          }
            $alumnos->curso()->associate($request->curso_id);
            $alumnos->save();
            return redirect('alumnos')->with('message', 'Información del alumno almacenada con éxito');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnos = Alumno::find($id);
        return view("alumnos.alumnos", compact('alumnos'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumnos = Alumno::find($id);
        $cursos = Curso::find($id);
        $cursos = Curso::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view("alumnos.editar", ['alumnos' => $alumnos], ['cursos' => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alumnos = Alumno::find($id);
        $alumnos->update($request->all());
        /*$arrayCurso = array('curso_id' => $id);
        $curso = implode(',', $arrayCurso);
        $alumnos->curso()->associate($arrayCurso);*/
        $alumnos->save();
        return redirect('alumnos')->with('message', 'Información de alumno actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $alumnos = Alumno::find($id);
        $imagen = explode(",", $alumnos->foto);
        $alumnos->delete();
        Storage::delete('$imagen');
        return redirect('alumnos')->with('success','Información alumno eliminada con éxito');
    }

    public function search(Request $request)
    {
        $texto = $request->input('buscar');
        $alumnos = Alumno::where('nombre','like','%'.$texto.'%')
        ->orWhere('apellido1','like','%'.$texto.'%')
        ->orWhere('repite','like','%'.$texto.'%')->paginate(5);

        if (!empty($alumnos)) {
            return view('alumnos.alumnos', compact('texto', 'alumnos'));
        } else {
            return redirect('alumnos')->with('message', 'Alumno no encontrado');
        }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('alumnos.alumnos');
        } else if ($request->filtro == 'Ascendente') {
            $alumnos = Alumno::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('alumnos.alumnos', compact('alumnos'));
        } else if ($request->filtro == 'Descendente') {
            $alumnos = Alumno::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('alumnos.alumnos', compact('alumnos'));
        } else {
            return redirect('alumnos')->with('message', 'No funciona');
        }
    }
}
