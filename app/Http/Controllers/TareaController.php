<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Tarea;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/tareas';

    public function index()
    {
        $tareas = Tarea::all();
        return view("tareas.tareas", compact("tareas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tareas.añadirTarea");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = new Tarea;
        $tarea->codigo = $request->codigo;
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->autor = $request->autor;
        $tarea->fecha_envio = $request->fecha_envio;
        $tarea->fecha_entrega = $request->fecha_entrega;
        $tarea->hora_entrega = $request->hora_entrega;
        $tarea->archivo_tarea = $request->archivo_tarea;
        $tarea->calificacion = $request->calificacion;
        $tarea->asignatura = $request->asignatura;
        $tarea->tema = $request->tema;
        $tarea->save();
        return redirect("/tareas")->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tareas = Tarea::findOrFail($id);
        return view("tareas.tareas", compact('tareas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        return view("tarea.editarTarea", compact("tarea"));
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
        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->all());
        $tarea->save();
        return redirect("/tareas")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();
        return redirect("/tareas")->with('success', 'Información eliminada con éxito');
    }

    public function buscar(Request $request) {

        $texto = $request->input('buscar');

        if ($texto) {
            $lista = Tarea::where('codigo','LIKE',"%$texto%")
            ->orWhere('titulo','LIKE',"%$texto%")
            ->orWhere('autor','LIKE',"%$texto%")
            ->orWhere('fecha_envio','LIKE',"%$texto%")
            ->paginate(2);
            return view('tareas.tareas',array('lista'=>$lista));
            
        } else {
            $lista = Tarea::paginate(3);
            return view('tareas.tareas',array('lista'=>$lista));
        }
    }
}
