<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Convalidacion;

class ConvalidacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/convalidaciones';

    public function index()
    {
        $convalidaciones = Convalidacion::paginate(5);
        return view("convalidaciones.convalidaciones", compact("convalidaciones"));
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
        return view("convalidaciones.crear", compact('alumnos', 'asignaturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $convalidaciones = new Convalidacion;
        $convalidaciones->alumno()->associate($request->alumno_id);
        $convalidaciones->asignatura()->associate($request->asignatura_id);
        $convalidaciones->save();
        return redirect()-route('convalidaciones')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convalidaciones = Convalidacion::find($id);
        return view("convalidaciones.convalidaciones", compact('convalidaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $convalidaciones = Convalidacion::find($id);
        return view("convalidaciones.editar", compact("convalidaciones"));
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
        $convalidaciones = Convalidacion::find($id);
        $convalidaciones->update($request->all());
        $convalidaciones->save();
        return redirect("/convalidaciones")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $convalidaciones = Convalidacion::find($id);
        $convalidaciones->delete();
        return redirect("/convalidaciones")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Convalidacion::where('codigo','LIKE',"%$texto%")
            ->orWhere('alumno','LIKE',"%$texto%")
            ->orWhere('asignatura','LIKE',"%$texto%")
            ->paginate(2);
            return view('convalidaciones.convalidaciones',array('lista'=>$lista));
        } else {
            $lista = Convalidacion::paginate(3);
            return view('convalidaciones.convalidaciones',array('lista'=>$lista));
        }
    }
}
