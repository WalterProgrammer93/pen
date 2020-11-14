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
        $convalidaciones = Convalidacion::all();
        return view("convalidaciones.convalidaciones", compact("convalidaciones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = Alumno::pluck('nombre', 'id');
        $asignaturas = Asignatura::pluck('nombre', 'id');
        return view("convalidaciones.añadirConvalidacion", compact('alumnos', 'asignaturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $convalidacion = new Convalidacion;
        $convalidacion->codigo = $request->codigo;
        $convalidacion->alumno = $request->alumno;
        $convalidacion->asignatura = $request->asignatura;
        $convalidacion->save();
        return redirect("/convalidaciones")->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convalidaciones = Convalidacion::findOrFail($id);
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
        $convalidacion = Convalidacion::findOrFail($id);
        return view("convalidaciones.editarConvalidacion", compact("convalidacion"));
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
        $convalidacion = Convalidacion::findOrFail($id);
        $convalidacion->update($request->all());
        $convalidacion->save();
        return redirect("/convalidaciones")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $convalidacion = Convalidacion::findOrFail($id);
        $convalidacion->delete();
        return redirect("/convalidaciones")->with('success', 'Información eliminada con éxito');
    }

    public function buscar(Request $request) {

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
