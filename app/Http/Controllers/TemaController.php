<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Tema;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/temas';

    public function index()
    {
        $temas = Tema::all();
        return view("temas.temas", compact("temas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("temas.añadirTema");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tema = new Tema;
        $tema->codigo = $request->codigo;
        $tema->nombre = $request->nombre;
        $tema->contenido = $request->contenido;
        $tema->documento = $request->documento;
        $tema->asignatura_id = $request->asignatura_id;
        $tema->save();
        return redirect("/temas")->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temas = Tema::findOrFail($id);
        return view("temas.temas", compact('temas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tema = Tema::findOrFail($id);
        return view("temas.editarTema", compact("temas"));
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
        $tema = Tema::findOrFail($id);
        $tema->update($request->all());
        $tema->save();
        return redirect("/temas")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tema = Tema::findOrFail($id);
        $tema->delete();
        return redirect("/temas")->with('success', 'Información eliminada con éxito');
    }

    public function buscar(Request $request) {

        $texto = $request->input('buscar');

        if($texto){
            $lista = Tarea::where('codigo','LIKE',"%$texto%")
            ->orWhere('titulo','LIKE',"%$texto%")
            ->orWhere('autor','LIKE',"%$texto%")
            ->paginate(2);
            return view('tareas.tareas',array('lista'=>$lista));
        } else {
            $lista = Tarea::paginate(3);
            return view('tareas.tareas',array('lista'=>$lista));
        }
    }
}
