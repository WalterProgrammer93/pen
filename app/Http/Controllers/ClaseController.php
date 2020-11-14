<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Asignatura;
use pen\Profesor;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = Clase::all();
        return view('clases.clases', compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignatura::pluck('nombre','id');
        $profesor = Profesor::pluck('nombre','id');
        return view("clases.añadirClase");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clase = new Clase;
        $clase->codigo = $request->codigo;
        $clase->asignatura = $request->asignatura;
        $clase->profesor = $request->profesor;
        $clase->horario = $request->horario;
        $clase->save();
        return redirect("/clases")->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clases = Clase::findOrFail($id);
        return view("clases.clases", compact('clases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clase = Clase::findOrFail($id);
        return view("clases.editarClase", compact('clase', 'id'));
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
        $clase = Clase::findOrFail($id);
        $clase->update($request->all());
        return redirect("/clases")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clase = Clase::findOrFail($id);
        $clase->delete();
        return redirect("/clases")->with('success', 'La información eliminada con éxito');
    }

    public function buscar(Request $request) {

        $texto = $request->input('buscar');

        if ($texto) {
            $lista = Clase::where('codigo','LIKE',"%$texto%")
            ->orWhere('profesor','LIKE',"%$texto%")
            ->orWhere('asignatura','LIKE',"%$texto%")
            ->paginate(2);
            return view('clases.clases',array('lista'=>$lista));
        } else {
            $lista = Clase::paginate(3);
            return view('clases.clases',array('lista'=>$lista));
        }
    }
}
