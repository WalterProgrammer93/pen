<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;

use pen\Profesor;
use pen\Departamento;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/profesores';

    public function index()
    {
        $profesores = Profesor::paginate(5);
        return view("profesores.profesores", compact("profesores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::orderBy('id')->pluck('nombre','id')->toArray();
        return view("profesores.crear", ['departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesores = new Profesor;
        $profesores->nombre = $request->nombre;
        $profesores->apellido1 = $request->apellido1;
        $profesores->apellido2 = $request->apellido2;
        $profesores->dni = $request->dni;
        $profesores->email = $request->email;
        $profesores->telefono = $request->telefono;
        $profesores->disponibilidad = $request->disponibilidad;
        $profesores->departamento()->associate($request->departamento_id);
        $profesores->save();
        return redirect()->route('profesores')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesores = Profesor::find($id);
        return view("profesores.profesores", compact('profesores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesores = Profesor::find($id);
        $departamentos = Departamento::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view("profesores.editar", ['profesores' => $profesores], ['departamentos' => $departamentos]);
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
        $profesores = Profesor::find($id);
        $profesores->update($request->all());
        $profesores->save();
        return redirect()->route("profesores")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $profesores = Profesor::find($id);
        $profesores->delete();
        return redirect()->route("profesores")->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Profesor::where('codigo','LIKE',"%$texto%")
            ->orWhere('nombre','LIKE',"%$texto%")
            ->orWhere('apellido1','LIKE',"%$texto%")
            ->orWhere('apellido2','LIKE',"%$texto%")
            ->orWhere('disponibilidad','LIKE',"%$texto%")
            ->paginate(2);
            return view('profesores.profesores',array('lista'=>$lista));
        } else {
            $lista = Profesor::paginate(3);
            return view('profesores.profesores',array('lista'=>$lista));
        }
    }
}
