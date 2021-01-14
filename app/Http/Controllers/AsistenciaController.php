<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Asistencia;
use pen\Alumno;
use pen\Curso;
use pen\Asignatura;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/asistencias';

    public function index()
    {
        $asistencias = Asistencia::all();
        return view("asistencias.asistencias", compact("asistencias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = Alumno::orderBy('id')->pluck('nombre', 'id')->toArray();
        $asignaturas = Asignatura::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('asistencias.crear', compact('alumnos', 'asignaturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asistencia = new Asistencia;
        $asistencia->numero_horas = $request->numero_horas;
        $asistencia->alumno()->associate($request->alumno_id);
        $asistencia->asignatura()->associate($request->asignatura_id);
        $asistencia->save();
        return redirect()->route('asistencias')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistencias = Asistencia::findOrFail($id);
        return view("asistencias.asistencias", compact('asistencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        return view("asistencias.editarAsistencia", compact("asistencia"));
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
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->update($request->all());
        $asistencia->save();
        return redirect("/asistencias")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();
        return redirect("/asistencias")->with('success','Información eliminada con éxito');
    }

    public function buscar(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Asistencia::where('codigo','LIKE',"%$texto%")
            ->orWhere('nombre_alumno','LIKE',"%$texto%")
            ->orWhere('numero_horas','LIKE',"%$texto%")
            ->paginate(2);
            return view('asistencias.asistencias',array('lista'=>$lista));
        } else {
            $lista = Asistencia::paginate(3);
            return view('asistencias.asistencias',array('lista'=>$lista));
        }
    }
}
