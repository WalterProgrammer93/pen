<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $alumnos = Alumno::all();
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
        return view('alumnos.crear', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        if($request->hasFile('foto')){
          $path = Storage::disk('local')->put('fotos', $request->file('foto'));
          $alumnos->foto = $path;
        }
         $alumnos->curso()->associate($request->curso_id);
        $alumnos->save();
        return redirect()->route('alumnos')->with('message', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnos = Alumno::findOrFail($id);
        return view("alumnos.alumnos", compact('alumnos'));
    }

    // Actualizar un registro (Update)
	   public function actualizar($id) {
		    $alumnos = Alumno::find($id);
		    return view('alumnos.editar', ['alumnos' => $alumnos]);
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
        return view("alumnos.editar", ['alumnos' => $alumnos]);
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
        if ($request->hasFile('foto')) {
          $alumnos->foto = $request->file('foto')->storage('/');
        }
        $alumnos->curso()->associate($alumnos);
        $alumnos->save();
        return redirect("alumnos")->with('message', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $alumnos = Alumno::find($id);
        $imagen = explode(",", $alumnos->foto);
        $alumnos->delete();
        Storage::delete('$imagen');
        return redirect("alumnos")->with('success','Información eliminada con éxito');
    }

    public function buscar(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Alumno::where('codigo','LIKE',"%$texto%")
            ->orWhere('nombre','LIKE',"%$texto%")
            ->orWhere('apellido1','LIKE',"%$texto%")
            ->orWhere('apellido2','LIKE',"%$texto%")
            ->orWhere('dni','LIKE',"%$texto%")
            ->orWhere('sexo','LIKE',"%$texto%")
            ->orWhere('ciudad','LIKE',"%$texto%")
            ->orWhere('provincia','LIKE',"%$texto%")
            ->orWhere('nacionalidad','LIKE',"%$texto%")
            ->orWhere('codigo_potal','LIKE',"%$texto%")
            ->orWhere('repite','LIKE',"%$texto%")
            ->paginate(2);
            return view('alumnos.alumnos',array('lista'=>$lista));
        } else {
            $lista = Alumno::paginate(3);
            return view('alumnos.alumnos',array('lista'=>$lista));
        }
    }

    /*public function ordenar() {

    }*/
}
