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
        $profesores = Profesor::all();
        return view("profesores.profesores", compact("profesores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento = Departamento::pluck('nombre', 'id');
        return view("profesores.añadirprofesor", compact("departamento"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesor = new Profesor;
        $profesor->codigo = $request->codigo;
        $profesor->nombre = $request->nombre;
        $profesor->apellido1 = $request->apellido1;
        $profesor->apellido2 = $request->apellido2;
        $profesor->dni = $request->dni;
        $profesor->email = $request->email;
        $profesor->telefono = $request->telefono;
        $profesor->disponibilidad = $request->disponibilidad;
        $profesor->departamento_id = $request->departamento_id;
        $profesor->save();
        return redirect("/profesores")->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesores = Profesor::findOrFail($id);
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
        $profesor = Profesor::findOrFail($id);
        return view("profesores.editarProfesor", compact("profesor"));
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
        $profesor = Profesor::findOrFail($id);
        $profesor->update($request->all());
        $profesor->save();
        return redirect("/profesores")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->delete();
        return redirect("/profesores")->with('success', 'Información eliminada con éxito');
    }

    public function buscar(Request $request) {

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
