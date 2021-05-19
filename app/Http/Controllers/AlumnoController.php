<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
//use pen\Http\Requests\CrearAlumnoRequest;
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
        /*$validator = Validator::make(
                $request->rules(),
                $request->messages()
                );
        if ($validator->fails()){
              return redirect('alumnos.crear')
                  ->withErrors($validator)
                  ->withInput();
        }*/
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
            $alumnos->foto = $nombrearchivo;
        }
          $alumnos->curso()->associate($request->curso_id);
          $alumnos->save();
          return redirect('alumnos')->with('message', 'Información del alumno almacenada con éxito');

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
        $arrayCurso = array('curso_id' => $id);
        $curso = implode(',', $arrayCurso);
        $alumnos->curso()->associate($curso);
        $alumnos->save();
        return redirect()->route('alumnos')->with('message', 'Información de alumno actualizada con éxito');
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

        //$alumnos->appends(['buscar' => $texto]);

        if (!empty($alumnos[0])) {
            return view('alumnos.alumnos', ['texto' => $texto, 'alumnos' => $alumnos]);
        } else {
            return redirect('alumnos')->with(['message' => 'Alumno ' . $texto . ' no encontrado']);
        }
    }
}
