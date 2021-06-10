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
        ]);

        /*if ($alumnos->fails())
        {
            return redirect()->back()->withInput()->withErrors($alumnos->errors());
        } else {*/
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
              $archivo->move("imagenes", $nombre);
              $alumnos->foto = $archivo;
          }
          $alumnos->curso()->associate($request->curso_id);
          $alumnos->save();
          return redirect('alumnos')->with('message', 'Información del alumno almacenada con éxito');
        //}


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
        $array = array('curso_id' => $id);
        $alumnos = implode(',', $array);
        //$alumnos->curso()->associate($request->curso_id);
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
        return redirect('alumnos')->with('message','Información alumno eliminada con éxito');
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
            return redirect('alumnos')->with('message', 'Alumno/a no encontrado');
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
