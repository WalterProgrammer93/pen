<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
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
        $cursos = Curso::pluck('nombre', 'id');
        return view('alumnos.crear', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemCreateRequest $request)
    {
        $alumnos = new Alumno;
        $alumnos->codigo = $request->codigo;
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
        $alumnos->foto = $request->file('foto')->storage('/');
        $alumnos->curso() = $request->cursos;
        $alumnos->save();
        return redirect("/alumnos")->with('message', 'Información almacenada con éxito');
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
		    return view('alumnos.actualizar', ['alumnos' => $alumnos]);
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
        return view("alumnos.edit", ['alumnos' => $alumnos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, $id)
    {
        $alumnos = Alumno::find($id);
        $cursos = Curso::find($id);
        $alumnos->codigo = $request->codigo;
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
        $alumnos->curso()->$request($cursos);
        $alumnos->save();
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('/alumnos');
        //return redirect("/alumnos")->with('message', 'Información actualizada con éxito');
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
        Session::flash('message', 'Eliminado Satisfactoriamente');
        return Redirect::to('/alumnos');
        //return redirect("/alumnos")->with('success','Información eliminada con éxito');
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
